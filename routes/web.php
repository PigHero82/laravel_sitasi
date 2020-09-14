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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::namespace('admin')->name('admin.')->group(function() {
    Route::group(['prefix' => 'admin'], function () {
        Route::view('', 'index')->name('index');
        Route::namespace('master')->name('master.')->group(function() {
            Route::group(['prefix' => 'master'], function () {
                Route::view('dosen', 'master.dosen')->name('dosen');
            });
        });
    });
});


Route::namespace('dosen')->name('dosen.')->group(function() {
    Route::group(['prefix' => 'dosen'], function () {
        Route::view('', 'index')->name('index');
        Route::view('tanggungan', 'tanggungan')->name('tanggungan');
        Route::view('profil', 'index')->name('profil');
        Route::group(['prefix' => 'publikasi'], function () {
            Route::view('', 'publikasi.index')->name('publikasi.index');
            Route::view('create', 'publikasi.create')->name('publikasi.create');
        });
        Route::group(['prefix' => 'hki'], function () {
            Route::view('', 'hki.index')->name('hki.index');
            Route::view('create', 'hki.create')->name('hki-create');
        });
        Route::group(['prefix' => 'prosiding'], function () {
            Route::view('', 'prosiding.index')->name('prosiding.index');
            Route::view('create', 'prosiding.create')->name('prosiding.create');
        });
        Route::group(['prefix' => 'buku'], function () {
            Route::view('', 'buku.index')->name('buku.index');
            Route::view('create', 'buku.create')->name('buku.create');
        });
        Route::group(['prefix' => 'usulan'], function () {
            Route::view('', 'usulan.index')->name('usulan.index');
            Route::view('1', 'usulan.1')->name('usulan.1');
            Route::view('2', 'usulan.2')->name('usulan.2');
            Route::view('3', 'usulan.3')->name('usulan.3');
            Route::view('4', 'usulan.4')->name('usulan.4');
            Route::view('5', 'usulan.5')->name('usulan.5');
            Route::view('6', 'usulan.6')->name('usulan.6');
            Route::view('7', 'usulan.7')->name('usulan.7');
            Route::view('8', 'usulan.8')->name('usulan.8');
        });
    });
});