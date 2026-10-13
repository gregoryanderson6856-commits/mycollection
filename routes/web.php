<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\PaintingController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\ComicbookController;
use App\Http\Controllers\TabletalkController;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/test', function () {
    return view('test');
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::resource('paintings', PaintingController::class);

Route::resource('albums', AlbumController::class);
Route::resource('songs', SongController::class)->middleware('can:access-admin');

Route::get('/music/', [MusicController::class, 'index'])->name('music/index');
Route::get('/music/show/{album}', [MusicController::class, 'show'])->name('music/show');

Route::get('/comicbooks/', [ComicbookController::class, 'index'])->name('comicbooks/index');

Route::get('/tabletalks/', [TabletalkController::class, 'index'])->name('tabletalks/index');

require __DIR__.'/registration/register.php';
