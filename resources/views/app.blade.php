<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  @class(['dark' => ($appearance ?? 'system') == 'dark'])>
    <body class="font-sans antialiased">
            <h1>laravel 12 with shopify auth</h1>
            <p>Access Token</p>
            @if (session()->has('access_token'))
                <div class="alert alert-success">
                    {{ session('access_token') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @vite(['resources/js/app.ts','resources/css/app.css'])
            
    </body>
</html>
