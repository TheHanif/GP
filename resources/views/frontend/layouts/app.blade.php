<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') - {{ config('app.name') }}</title>

        @stack('pagemeta')
        
        <link rel="stylesheet" href="{{mix('css/app.css')}}">

        @stack('styles')

        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([ 'csrfToken' => csrf_token(), ]) !!};
        </script>

    </head>
    <body>

        <div id="wrapper">
            
            {{-- Header --}}
            @include('frontend.layouts.header')
            
            <div class="container">
                @yield('content')
            </div>{{-- / .container --}}

            <div class="container">
                @cache('brand::widgets.carousel', null, config('partialcache.expiry'))
            </div>{{-- / .container for brands widget --}}

            <div class="container">
                @cache('manufacturer::widgets.carousel', null, config('partialcache.expiry'))
            </div>{{-- / .container for manufacturers widget --}}

            {{-- Footer --}}
            @include('frontend.layouts.footer')

            <div id="ajax-loading" v-if="is_loading" class="ajax-loading">
                {{ Html::image('images/loading.gif', 'Please wait...') }}
            </div> {{-- / #ajax-loading --}}

        </div>{{-- / #wrapper --}}
        
        <script src="{{mix('js/app.js')}}"></script>

        @stack('scripts')

    </body>
</html>
