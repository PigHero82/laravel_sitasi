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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::namespace('admin')->name('admin.')->prefix('admin')->middleware('auth', 'role:admin')->group(function() {
    Route::get('', 'HomeController@index')->name('index');
    Route::namespace('master')->name('master.')->prefix('master')->group(function() {
        Route::resource('dosen', 'DosenController');
        Route::resource('jabatan', 'JabatanController');
        Route::resource('prodi', 'ProdiController');
        Route::view('rumpun-ilmu', 'master.rumpun-ilmu')->name('rumpun-ilmu');
        Route::resource('skema', 'SkemaController');
        Route::resource('user', 'UserController');
    });
    Route::namespace('review')->name('review.')->prefix('review')->group(function() {
        Route::view('pembagian-reviewer', 'review.pembagian-reviewer')->name('pembagian-reviewer');
        Route::view('penilaian', 'review.penilaian')->name('penilaian');
    });
    Route::view('pimpinan', 'master.pimpinan')->name('pimpinan');
    Route::view('skema', 'skema')->name('skema');
});

Route::namespace('pimpinan')->name('pimpinan.')->prefix('pimpinan')->middleware('auth', 'role:pimpinan')->group(function() {
    Route::view('', 'index.pimpinan')->name('index');
});

Route::name('dosen.')->prefix('dosen')->middleware('auth', 'role:dosen')->group(function() {
    Route::view('', 'index.dosen')->name('index');
    Route::view('persetujuan-personil', 'persetujuan-personil')->name('persetujuan-personil');
    Route::view('tanggungan', 'tanggungan')->name('tanggungan');
    Route::namespace('publikasi')->name('publikasi.')->prefix('publikasi')->group(function() {
        Route::view('', 'publikasi.index')->name('index');
        Route::view('create', 'publikasi.create')->name('create');
    });
    Route::namespace('hki')->name('hki.')->prefix('hki')->group(function() {
        Route::view('', 'hki.index')->name('index');
        Route::view('create', 'hki.create')->name('create');
    });
    Route::namespace('prosiding')->name('prosiding.')->prefix('prosiding')->group(function() {
        Route::view('', 'prosiding.index')->name('index');
        Route::view('create', 'prosiding.create')->name('create');
    });
    Route::namespace('buku')->name('buku.')->prefix('buku')->group(function() {
        Route::view('', 'buku.index')->name('index');
        Route::view('create', 'buku.create')->name('create');
    });
    Route::namespace('usulan')->name('usulan.')->prefix('usulan')->group(function() {
        Route::view('', 'usulan.index')->name('index');
        Route::view('create/1', 'usulan.1')->name('1');
        Route::view('create/2', 'usulan.2')->name('2');
        Route::view('create/3', 'usulan.3')->name('3');
        Route::view('create/4', 'usulan.4')->name('4');
        Route::view('create/5', 'usulan.5')->name('5');
        Route::view('create/6', 'usulan.6')->name('6');
        Route::view('create/7', 'usulan.7')->name('7');
        Route::view('create/8', 'usulan.8')->name('8');
        Route::view('riwayat', 'usulan.riwayat')->name('riwayat');
    });
});

Route::namespace('penelitian')->name('penelitian.')->prefix('penelitian')->middleware('auth', 'role:penelitian')->group(function() {
    Route::view('', 'index.penelitian')->name('index');
});

Route::namespace('pengabdian')->name('pengabdian.')->prefix('pengabdian')->middleware('auth', 'role:pengabdian')->group(function() {
    Route::view('', 'index.pengabdian')->name('index');
});

Route::name('reviewer.')->prefix('reviewer')->middleware('auth', 'role:reviewer')->group(function() {
    Route::view('', 'index.reviewer')->name('index');
    Route::view('review', 'review')->name('review');
});