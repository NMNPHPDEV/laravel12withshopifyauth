<?php

namespace App\Services;

use PHPShopify\ShopifySDK;

class ShopifyService
{
    public static function make($shop, $accessToken)
    {
        $config = [
            'ShopUrl' => $shop,
            'AccessToken' => $accessToken,
            'ApiVersion' => env('SHOPIFY_API_VERSION'),
        ];
        ShopifySDK::config($config);
        return new ShopifySDK;
    }
}
