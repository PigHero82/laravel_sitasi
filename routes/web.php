<?php

use App\Models\Dosen;
use App\Models\ListRole;
use App\Models\User;
use App\Models\UsulanAnggota;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

View::composer(['*'], function ($view) {
    if (Auth::user() !== NULL) {
        $role = ListRole::getRole(Auth::user()->id);
        $user = Dosen::firstDosen(Auth::user()->id);
        $invitation = UsulanAnggota::getUnconfirmedPersonal(Auth::user()->id);

        View::share('composerRole', $role);
        View::share('composerUser', $user);
        View::share('composerInvitation', count($invitation));
    }
});

Route::get('', 'HomeController@index');
Route::view('author', 'front.author')->name('author');
Route::get('pengumuman/{id}', 'HomeController@pengumuman')->name('pengumuman');
Route::post('role/{id}', 'HomeController@update')->name('role.update');
Route::get('skema/{id}', 'Admin\SkemaUsulanController@usulan');
Route::get('skema-usulan/{id}', 'Admin\SkemaUsulanController@skema');
Route::get('usulan/{id}', 'HomeController@usulan');
Route::get('luaran-target/{id}', 'HomeController@luaranTarget');
Route::resource('luaran', 'LuaranController');

Route::get('kabkota/{id}', 'HomeController@kabkota')->name('kabkota');
Route::get('kecamatan/{id}', 'HomeController@kecamatan')->name('kecamatan');
// Route::group(['prefix' => 'migration'], function () {
//     Route::group(['prefix' => 'dosen'], function () {
//         Route::get('', 'MigrationController@dosen');    
//         Route::get('detail', 'MigrationController@dosenDetail');
//     });
//     Route::get('skema-usulan', 'MigrationController@skemaUsulan');
//     Route::get('usulan', 'MigrationController@usulan');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::resource('profil', 'ProfileController');

Route::namespace('Admin')->name('admin.')->prefix('admin')->middleware('auth', 'role:admin')->group(function() {
    Route::get('', 'HomeController@index')->name('index');
    Route::get('usulan/', 'HomeController@usulan')->name('usulan');
    Route::get('usulan/{skema}', 'HomeController@usulanBySkema')->name('usulanBySkema');
    Route::namespace('Master')->name('master.')->prefix('master')->group(function() {
        Route::resource('dosen', 'DosenController');
        Route::post('indikator', 'PenilaianController@storeIndikator')->name('indikator.store');
        Route::patch('indikator/{id}', 'PenilaianController@updateIndikator');
        Route::resource('jabatan', 'JabatanController');
        Route::resource('penilaian', 'PenilaianController');
        Route::resource('prodi', 'ProdiController');
        Route::name('rumpun-ilmu.')->prefix('rumpun-ilmu')->group(function() {
            Route::resource('', 'RumpunIlmuController')->except(['edit', 'show']);
            Route::get('{id}', 'RumpunIlmuController@show')->name('show');
            Route::get('{id}/{id2}', 'RumpunIlmuController@more')->name('more');
        });
        Route::resource('skema', 'SkemaController');
        Route::resource('user', 'UserController');
    });
    
    Route::name('review.')->prefix('review')->group(function() {
        Route::get('pembagian-reviewer', 'ReviewController@pembagian')->name('pembagian-reviewer');
        Route::patch('store/{id}', 'ReviewController@storeReviewer')->name('store');
        Route::get('random/{id}', 'ReviewController@randomReviewer')->name('random-reviewer');
        Route::name('penilaian.')->prefix('penilaian')->group(function() {
            // Route::view('penilaian', 'review.penilaian')->name('penilaian');
            Route::get('', 'PenilaianController@index')->name('index');
            Route::patch('{id}', 'PenilaianController@update')->name('update');
        });
    });
    Route::view('pimpinan', 'master.pimpinan')->name('pimpinan');
    Route::name('skema.')->prefix('skema')->group(function() {
        Route::patch('{id}', 'SkemaUsulanController@update')->name('update');
        Route::resource('', 'SkemaUsulanController')->except(['show', 'update']);
        Route::get('{id}', 'SkemaUsulanController@show')->name('show');
        Route::patch('status/{skemaUsulan}', 'SkemaUsulanController@status')->name('status');
    });
});

Route::namespace('Pimpinan')->name('pimpinan.')->prefix('pimpinan')->middleware('auth', 'role:pimpinan')->group(function() {
    Route::view('', 'index.pimpinan')->name('index');
});

Route::namespace('Dosen')->name('dosen.')->prefix('dosen')->middleware('auth', 'role:dosen')->group(function() {
    Route::get('', 'HomeController@index')->name('index');
    Route::resource('persetujuan', 'PersetujuanController');
    Route::view('persetujuan-personil', 'persetujuan-personil')->name('persetujuan-personil');
    Route::resource('rumpun-ilmu', 'RumpunIlmuController')->only(['index', 'show']);
    Route::view('tanggungan', 'tanggungan')->name('tanggungan');
    Route::namespace('Publikasi')->name('publikasi.')->prefix('publikasi')->group(function() {
        Route::view('', 'publikasi.index')->name('index');
        Route::view('create', 'publikasi.create')->name('create');
    });
    Route::namespace('Hki')->name('hki.')->prefix('hki')->group(function() {
        Route::view('', 'hki.index')->name('index');
        Route::view('create', 'hki.create')->name('create');
    });
    Route::namespace('Prosiding')->name('prosiding.')->prefix('prosiding')->group(function() {
        Route::view('', 'prosiding.index')->name('index');
        Route::view('create', 'prosiding.create')->name('create');
    });
    Route::namespace('Buku')->name('buku.')->prefix('buku')->group(function() {
        Route::view('', 'buku.index ')->name('index');
        Route::view('create', 'buku.create')->name('create');
    });
    Route::name('usulan.')->prefix('usulan')->group(function() {
        Route::resource('', 'UsulanController')->except(['update']);
        Route::patch('{id}', 'UsulanController@update')->name('update');
        Route::post('anggota', 'UsulanController@anggota')->name('anggota');
        Route::delete('anggota/{usulanAnggota}', 'UsulanController@destroyAnggota')->name('anggota.destroy');
        Route::post('backward', 'UsulanController@backward')->name('backward');
        Route::post('dana', 'UsulanController@usulanDanaUpdate')->name('dana');
        Route::name('kegiatan.')->prefix('kegiatan')->group(function() {
            Route::delete('{id}', 'UsulanController@kegiatanDestroy')->name('destroy');
            Route::post('', 'UsulanController@kegiatanStore')->name('store');
        });
        Route::resource('luaran', 'LuaranController');
        Route::name('mitra.')->prefix('mitra')->group(function() {
            Route::delete('{id}', 'UsulanController@mitraDestroy')->name('destroy');
            Route::patch('{id}', 'UsulanController@mitraUpdate')->name('update');
            Route::post('', 'UsulanController@mitraStore')->name('store');
            Route::get('{id}', 'UsulanController@mitraShow')->name('show');
        });
        Route::patch('proposal/{id}', 'UsulanController@proposal')->name('proposal');
        Route::patch('revisi/proposal/{id}', 'UsulanController@updateProposal');
        Route::get('riwayat', 'UsulanController@riwayat')->name('riwayat');
        Route::resource('rab', 'RabController');
        Route::get('rab/detail/{id}', 'RabController@getDetail');
    });
});

Route::namespace('Penelitian')->name('penelitian.')->prefix('penelitian')->middleware('auth', 'role:penelitian')->group(function() {
    Route::view('', 'index.penelitian')->name('index');
});

Route::namespace('Pengabdian')->name('pengabdian.')->prefix('pengabdian')->middleware('auth', 'role:pengabdian')->group(function() {
    Route::view('', 'index.pengabdian')->name('index');
});

Route::namespace('Reviewer')->name('reviewer.')->prefix('reviewer')->middleware('auth', 'role:reviewer')->group(function() {
    Route::get('', 'HomeController@index')->name('index');
    Route::get('rab/{usulanID}','HomeController@rabShow');
    Route::name('review.')->prefix('review')->group(function() {
        Route::get('', 'HomeController@review')->name('index');
        Route::patch('{id}', 'HomeController@storeNilai')->name('store');
        Route::get('indikator/{jenis}', 'HomeController@getIndikator')->name('indikator');
    });
    Route::resource('revisi', 'RevisiController');
    Route::name('revisi.')->prefix('revisi')->group(function() {
    });
});

Route::view('lihat-rab', 'usulan.lihat-rab');
Route::view('ubah-rab', 'usulan.ubah-rab');