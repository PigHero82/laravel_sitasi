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

Route::view('', 'index');
Route::view('tanggungan', 'tanggungan');
Route::view('publikasi', 'publikasi.index');
Route::view('publikasi/create', 'publikasi.create');
Route::view('hki', 'hki.index');
Route::view('hki/create', 'hki.create');
Route::view('prosiding', 'prosiding.index');
Route::view('prosiding/create', 'prosiding.create');
Route::view('buku', 'buku.index');
Route::view('buku/create', 'buku.create');
Route::view('usulan', 'usulan.index');
Route::view('profil', 'index');