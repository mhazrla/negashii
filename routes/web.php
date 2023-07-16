<?php

use App\Http\Controllers\LoanController;
use App\Http\Controllers\OrderController;
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
    Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('product.edit')->middleware('auth');
    Route::patch('/{product}', [ProductController::class, 'update'])->name('product.update')->middleware('auth');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('product.destroy')->middleware('auth');
});

Route::group([
    'prefix' => '/order'
], function ($router) {
    Route::get('/', [OrderController::class, 'index'])->name('order.index')->middleware('auth');
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('order.checkout')->middleware('auth');
    Route::get('/dashboard', [OrderController::class, 'dashboard'])->name('order.dashboard')->middleware('auth');
    Route::get('/create', [OrderController::class, 'create'])->name('order.create')->middleware('auth');
    Route::post('/', [OrderController::class, 'store'])->name('order.store')->middleware('auth');
    Route::get('/order/{order}', [OrderController::class, 'show'])->name('order.show');
    Route::get('/edit/{order}', [OrderController::class, 'edit'])->name('order.edit');
    Route::patch('/{order}', [OrderController::class, 'update'])->name('order.update')->middleware('auth');
    Route::delete('/{order}', [OrderController::class, 'destroy'])->name('order.destroy')->middleware('auth');
});


Route::group([
    'prefix' => '/item'
], function ($router) {
    Route::get('/', [LoanController::class, 'index'])->name('loan.index')->middleware('auth');
    Route::get('/dashboard', [LoanController::class, 'dashboard'])->name('loan.dashboard')->middleware('auth');
    // Route::post('/checkout', [OrderController::class, 'checkout'])->name('loan.checkout')->middleware('auth');
    // Route::get('/create', [OrderController::class, 'create'])->name('loan.create')->middleware('auth');
    // Route::post('/', [OrderController::class, 'store'])->name('loan.store')->middleware('auth');
    // Route::get('/order/{order}', [OrderController::class, 'show'])->name('loan.show');
    // Route::get('/edit/{order}', [OrderController::class, 'edit'])->name('loan.edit');
    // Route::patch('/{order}', [OrderController::class, 'update'])->name('loan.update')->middleware('auth');
    // Route::delete('/{order}', [OrderController::class, 'destroy'])->name('loan.destroy')->middleware('auth');
});

require __DIR__ . '/auth.php';
