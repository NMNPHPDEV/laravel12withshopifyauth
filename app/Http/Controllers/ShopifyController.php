<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPShopify\ShopifySDK;

class ShopifyController extends Controller
{
    public function getOrders()
    {
        // Shopify API yapılandırması
        $config = [
            'ShopUrl' => config('services.shopify.shop_url'),
            'ApiKey' => config('services.shopify.api_key'),
            'Password' => config('services.shopify.api_secret'),
        ];

        // Shopify SDK'yı başlat
        $shopify = new ShopifySDK($config);

        // Tüm siparişleri al
        $orders = $shopify->Order()->get();

        return response()->json($orders);
    }
}