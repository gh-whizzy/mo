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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/getAllPlaylists', [App\Http\Controllers\PlaylistController::class, 'getAllPlaylists'])->name('getAllPlaylists');
Route::get('/playlist/{id}', [App\Http\Controllers\PlaylistController::class, 'playlist'])->name('playlist');
Route::get('/test/{id}', [App\Http\Controllers\PlaylistController::class, 'test'])->name('test');
Route::post('/editPlaylist', [App\Http\Controllers\PlaylistController::class, 'editPlaylist']);