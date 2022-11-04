<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Cart\PaymentController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WishListController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/dashboard', function () {
    return Inertia::render('Tailwind/Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->middleware('admin', 'verified')->group(function () {
    Route::get('/home', [AdminDashboardController::class, 'index'])->name('admin.home');

    Route::get('/categories/export', [AdminCategoryController::class, 'export'])->name('admin.categories.export');
    Route::resource('/categories', AdminCategoryController::class)->names('admin.categories');

    Route::get('/orders/export', [AdminOrderController::class, 'export'])->name('admin.orders.export');
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('admin.orders');
    Route::get('orders/{order}', [AdminOrderController::class, 'show'])->name('admin.orders.show');

    Route::get('/products/export', [AdminProductController::class, 'export'])->name('admin.products.export');
    Route::resource('/products', AdminProductController::class)->names('admin.products');
});

Route::get('/', [ClientController::class, 'home'])->name('market.home');

Route::get('/shop/{category?}', [ClientController::class, 'shop'])->name('market.shop');
Route::get('product/{product}', [ClientController::class, 'product_detail'])->name('market.product.detail');

Route::post('/review/{product}', [ReviewController::class, 'store'])->name('review.store');


Route::resource('/wishlist', WishListController::class);
Route::resource('/cart', CartController::class);



// Payment
Route::post('/cart/checkout', [PaymentController::class, 'checkout'])->name('cart.checkout');
Route::get('/payment-success', [PaymentController::class, 'success'])->name('payment.success');




Route::fallback(function () {
    abort(404, 'Something went wrong');
});


Route::get('/404', [ClientController::class, 'error404'])->name('error.404');


require __DIR__ . '/auth.php';
