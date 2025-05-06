<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function redirect(Request $request)
    {
        $shop = $request->get('shop');

        $redirectUri = urlencode(env('SHOPIFY_REDIRECT_URI'));
        $scopes = env('SHOPIFY_API_SCOPES');
        $apiKey = env('SHOPIFY_API_KEY');

        return redirect("https://{$shop}/admin/oauth/authorize?client_id={$apiKey}&scope={$scopes}&redirect_uri={$redirectUri}");
    }

    public function callback(Request $request)
    {
        $shop = $request->get('shop');
        $code = $request->get('code');

        $response = Http::asForm()->post("https://{$shop}/admin/oauth/access_token", [
            'client_id' => env('SHOPIFY_API_KEY'),
            'client_secret' => env('SHOPIFY_API_SECRET'),
            'code' => $code,
        ]);

        $accessToken = $response['access_token'];

        // ACCESS TOKEN'ı veritabanına kaydet
        session(['shop' => $shop, 'access_token' => $accessToken]);

        return redirect('/dashboard');
    }
}
