<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ \Osiset\ShopifyApp\getShopifyConfig('app_name') }}</title>
        @yield('styles')
        @include('layouts.css')
        

    </head>

    <body>
        <div class="app-wrapper">
            <div class="app-content">
                <main role="main">
                    @include('layouts.header')
                    
                </main>
                @yield('content')
         
         
            </div>
        </div>
        

    


        

        @if(\Osiset\ShopifyApp\getShopifyConfig('appbridge_enabled'))
            <script src="https://unpkg.com/@shopify/app-bridge{{ \Osiset\ShopifyApp\getShopifyConfig('appbridge_version') ? '@'.config('shopify-app.appbridge_version') : '' }}"></script>
            <script>
                var AppBridge = window['app-bridge'];
                var createApp = AppBridge.default;
                var app = createApp({
                    apiKey: '{{ \Osiset\ShopifyApp\getShopifyConfig('api_key', Auth::user()->name ) }}',
                    shopOrigin: '{{ Auth::user()->name }}',
                    forceRedirect: false,
                });
            </script>

            @include('shopify-app::partials.flash_messages')
        @endif

        @yield('scripts')
        @include('layouts.js')
        <script scr="https://unpkg.com/turbolinks"></script>


    </body>
</html>
