<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ComicbookController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\PaintingController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\TabletalkController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WaterColorController;
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

Route::get('/watercolor/', [WaterColorController::class, 'index'])->name('watercolor/index');
Route::get('/watercolor/show/{watercolor}', [WaterColorController::class, 'show'])->name('watercolor/show');

// Accessing GET http://your-domain.test runs the query logicRoute::get('/category/items', [CategoryItemController::class, 'index'])->name('category.items.index');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});

require __DIR__.'/registration/register.php';
