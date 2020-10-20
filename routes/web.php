<?php

use App\Models\Dosen;
use App\Models\ListRole;
use App\Models\User;
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

        View::share('composerRole', $role);
        View::share('composerUser', $user);
    }
});

Route::get('', 'HomeController@index');
Route::post('role/{id}', 'HomeController@update')->name('role.update');
Route::view('profil', 'profil')->name('profil');

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

Route::namespace('Admin')->name('admin.')->prefix('admin')->middleware('auth', 'role:admin')->group(function() {
    Route::get('', 'HomeController@index')->name('index');
    Route::namespace('Master')->name('master.')->prefix('master')->group(function() {
        Route::resource('dosen', 'DosenController');
        Route::resource('jabatan', 'JabatanController');
        Route::resource('prodi', 'ProdiController');
        Route::name('rumpun-ilmu.')->prefix('rumpun-ilmu')->group(function() {
            Route::resource('', 'RumpunIlmuController')->except(['edit', 'show']);
            Route::get('{id}', 'RumpunIlmuController@show')->name('show');
            Route::get('{id}/{id2}', 'RumpunIlmuController@more')->name('more');
        });
        Route::resource('skema', 'SkemaController');
        Route::resource('user', 'UserController');
    });
    Route::namespace('Review')->name('review.')->prefix('review')->group(function() {
        Route::view('pembagian-reviewer', 'review.pembagian-reviewer')->name('pembagian-reviewer');
        Route::view('penilaian', 'review.penilaian')->name('penilaian');
    });
    Route::view('pimpinan', 'master.pimpinan')->name('pimpinan');
    Route::name('skema.')->prefix('skema')->group(function() {
        Route::resource('', 'SkemaUsulanController')->except(['show']);
        Route::get('{id}', 'SkemaUsulanController@show')->name('show');
    });
});

Route::namespace('Pimpinan')->name('pimpinan.')->prefix('pimpinan')->middleware('auth', 'role:pimpinan')->group(function() {
    Route::view('', 'index.pimpinan')->name('index');
});

Route::namespace('Dosen')->name('dosen.')->prefix('dosen')->middleware('auth', 'role:dosen')->group(function() {
    Route::get('', 'HomeController@index')->name('index');
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
        Route::view('', 'buku.index')->name('index');
        Route::view('create', 'buku.create')->name('create');
    });
    Route::name('usulan.')->prefix('usulan')->group(function() {
        Route::resource('', 'UsulanController')->except(['update']);
        Route::post('/anggota', 'UsulanController@anggota')->name('anggota');
        Route::post('/backward', 'UsulanController@backward')->name('backward');
        Route::patch('{id}', 'UsulanController@update')->name('update');
        Route::get('riwayat', 'UsulanController@riwayat')->name('riwayat');
    });
});

Route::namespace('Penelitian')->name('penelitian.')->prefix('penelitian')->middleware('auth', 'role:penelitian')->group(function() {
    Route::view('', 'index.penelitian')->name('index');
});

Route::namespace('Pengabdian')->name('pengabdian.')->prefix('pengabdian')->middleware('auth', 'role:pengabdian')->group(function() {
    Route::view('', 'index.pengabdian')->name('index');
});

Route::name('reviewer.')->prefix('reviewer')->middleware('auth', 'role:reviewer')->group(function() {
    Route::view('', 'index.reviewer')->name('index');
    Route::view('review', 'review')->name('review');
});