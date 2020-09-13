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

Route::group(['prefix' => 'dosen'], function () {
    Route::view('', 'index')->name('index');
    Route::view('tanggungan', 'tanggungan')->name('tanggungan');
    Route::view('publikasi', 'publikasi.index')->name('publikasi.index');
    Route::view('publikasi/create', 'publikasi.create')->name('publikasi.create');
    Route::view('hki', 'hki.index')->name('hki.index');
    Route::view('hki/create', 'hki.create')->name('hki-create');
    Route::view('prosiding', 'prosiding.index')->name('prosiding.index');
    Route::view('prosiding/create', 'prosiding.create')->name('prosiding.creae');
    Route::view('buku', 'buku.index')->name('buku.index');
    Route::view('buku/create', 'buku.create')->name('buku.create');
    Route::view('usulan', 'usulan.index')->name('usulan.index');
    Route::view('profil', 'index')->name('profil');
    Route::view('usulan/1', 'usulan.1')->name('usulan.1');
    Route::view('usulan/2', 'usulan.2')->name('usulan.2');
    Route::view('usulan/3', 'usulan.3')->name('usulan.3');
    Route::view('usulan/4', 'usulan.4')->name('usulan.4');
    Route::view('usulan/5', 'usulan.5')->name('usulan.5');
    Route::view('usulan/6', 'usulan.6')->name('usulan.6');
    Route::view('usulan/7', 'usulan.7')->name('usulan.7');
    Route::view('usulan/8', 'usulan.8')->name('usulan.8');
});