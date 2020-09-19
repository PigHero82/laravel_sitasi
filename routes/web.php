<?php

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
Route::redirect('', 'dosen', 301);

Route::view('profil', 'index')->name('profil');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::namespace('admin')->name('admin.')->prefix('admin')->group(function() {
    Route::view('', 'index')->name('index');
    Route::namespace('master')->name('master.')->prefix('master')->group(function() {
        Route::view('dosen', 'master.dosen')->name('dosen');
        Route::view('pimpinan', 'master.pimpinan')->name('pimpinan');
        Route::view('prodi', 'master.prodi')->name('prodi');
        Route::view('skema', 'master.skema')->name('skema');
        Route::view('user', 'master.user')->name('user');
    });
    Route::view('skema', 'skema')->name('skema');
});

Route::namespace('dosen')->name('dosen.')->prefix('dosen')->group(function() {
    Route::view('', 'index')->name('index');
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
        Route::view('1', 'usulan.1')->name('1');
        Route::view('2', 'usulan.2')->name('2');
        Route::view('3', 'usulan.3')->name('3');
        Route::view('4', 'usulan.4')->name('4');
        Route::view('5', 'usulan.5')->name('5');
        Route::view('6', 'usulan.6')->name('6');
        Route::view('7', 'usulan.7')->name('7');
        Route::view('8', 'usulan.8')->name('8');
    });
});