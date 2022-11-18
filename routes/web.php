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
Route::get('/getPlaylist/{id}', [App\Http\Controllers\PlaylistController::class, 'getPlaylist'])->name('getPlaylist');
Route::get('/test/{id}', [App\Http\Controllers\PlaylistController::class, 'test'])->name('test');
Route::post('/editPlaylist', [App\Http\Controllers\PlaylistController::class, 'editPlaylist']);
Route::post('/deletePlaylist', [App\Http\Controllers\PlaylistController::class, 'deletePlaylist']);
Route::post('/deleteMediaFromPlaylist', [App\Http\Controllers\PlaylistController::class, 'deleteMediaFromPlaylist']);
Route::post('/createNewPlaylist', [App\Http\Controllers\PlaylistController::class, 'createNewPlaylist']);

Route::post('/upload', [App\Http\Controllers\MediaController::class, 'upload']);
Route::post('/deleteMediaFromPlaylist/{id}', [App\Http\Controllers\MediaController::class, 'deleteMediaFromPlaylist']);
Route::get('/getAllMediaBelongingToPlaylist/{id}', [App\Http\Controllers\MediaController::class, 'getAllMediaBelongingToPlaylist']);
Route::get('/getSelectedMedia/{id}', [App\Http\Controllers\MediaController::class, 'getSelectedMedia']);


