<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Support\Storage\Contracts\StorageInterface;
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
})->name('home');

Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/basket/add/{product}', [BasketController::class, 'add'])->name('basket.add');
Route::get('/basket/clear', function () {
    resolve(StorageInterface::class)->clear();
});
Route::get('/basket', [BasketController::class, 'index'])->name('basket.index');
Route::post('/basket/update/{product}', [BasketController::class, 'update'])->name('basket.update');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
