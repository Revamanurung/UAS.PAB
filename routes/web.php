<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Models\Barang;

// Authentication Routes
Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::controller(BarangController::class)->name('barang.')->group(function () {
    Route::get('/barang', 'index')->name('index');
    Route::get('/barang/create', 'create')->name('create');
    Route::post('/barang', 'store')->name('store');
    Route::get('/barang/{id}', 'show')->name('show');
    Route::get('/barang/{id}/destroy', 'destroy')->name('destroy');
    Route::get('/barang/{id}/edit', 'edit')->name('edit');
    Route::post('barang/{id}', 'update')->name('update');
});
    
/*Route::get('/', function () {
    return view('welcome');
});*/
