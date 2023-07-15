<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group([
    'prefix' => '/'
], function ($router) {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/dashboard', [ProductController::class, 'dashboard'])->name('product.dashboard')->middleware('auth');
    Route::get('/create', [ProductController::class, 'create'])->name('product.create')->middleware('auth');
    Route::post('/', [ProductController::class, 'store'])->name('product.store')->middleware('auth');
    Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::patch('/{product}', [ProductController::class, 'update'])->name('product.update')->middleware('auth');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware('auth');
});

require __DIR__ . '/auth.php';
