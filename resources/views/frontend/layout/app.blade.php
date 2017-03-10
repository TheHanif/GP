<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') - {{ config('app.name') }}</title>
        
        <link rel="stylesheet" href="{{mix('css/app.css')}}">

        @stack('styles')

    </head>
    <body>

        <div id="wrapper">
            
            {{-- Header --}}
            @include('frontend.layout.header')
            
            <div class="container">
                @yield('contens')
            </div>{{-- / .container --}}

            <div class="container">
                @cache('brand::widgets.carousel', null, config('partialcache.expiry'))
            </div>{{-- / .container for brands widget --}}

            {{-- Footer --}}
            @include('frontend.layout.footer')

        </div>{{-- / #wrapper --}}

        
        <script src="{{mix('js/app.js')}}"></script>

        @stack('scripts')

    </body>
</html>
