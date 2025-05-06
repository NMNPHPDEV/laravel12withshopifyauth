<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ShopifyController;
use App\Http\Controllers\AuthController;

/* require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
 */
Route::get('/orders', [ShopifyController::class, 'getOrders']);

Route::get('/auth', [AuthController::class, 'redirect']);
Route::get('/auth/callback', [AuthController::class, 'callback']);

Route::get('/dashboard', function () {
    $shop = session('shop');
    $token = session('access_token');

    $shopify = \App\Services\ShopifyService::make($shop, $token);
    $products = $shopify->Product->get();

    return Inertia::render('Dashboard', [
        'products' => $products,
    ]);
});
