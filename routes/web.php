<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Order;
use App\Models\Product;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/materials', MaterialController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/users', UserController::class);
    Route::post('/update-user-type', [UserController::class, 'updateUserType']);

    Route::controller(ProductController::class)->group(function() {
        // Route::post('/products/{product}', 'archive')->name('products.archive');
        Route::post('/import-products', 'import')->name('products.import');
        Route::get('/export-products', 'export')->name('products.export');
    });

});

Route::controller(OrderController::class)->group(function() {
    Route::resource('/orders', OrderController::class);

});

Route::get('/test', function() {
    $products = Product::all();
    return view('frontend.shop', compact('products'));
});
