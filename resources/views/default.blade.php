<!doctype html>
<html>
    <head>
        <!-- META Tags -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>{{ isset($title) ? $title . ' | ' : null }}{{ config('app.name') }}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- SEO -->
        <meta name="author" content="{{ config('larecipe.seo.author') }}">
        <meta name="description" content="{{ config('larecipe.seo.description') }}">
        <meta name="keywords" content="{{ config('larecipe.seo.keywords') }}">
        <meta name="twitter:card" value="summary">
        @if (isset($canonical) && $canonical)
            <link rel="canonical" href="{{ url($canonical) }}" />
        @endif
        @if($openGraph = config('larecipe.seo.og'))
            @foreach($openGraph as $key => $value)
                @if($value)
                    <meta property="og:{{ $key }}" content="{{ $value }}" />
                @endif
            @endforeach
        @endif

        <!-- CSS -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @if (config('larecipe.ui.fav'))
            <!-- Favicon -->
            <link rel="apple-touch-icon" href="{{ asset(config('larecipe.ui.fav')) }}">
            <link rel="shortcut icon" type="image/png" href="{{ asset(config('larecipe.ui.fav')) }}"/>
        @endif

        <!-- FontAwesome -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
        @if (config('larecipe.ui.fa_v4_shims', true))
            <link rel="stylesheet" href="{{ asset('css/font-awesome-v4-shims.css') }}">
        @endif

        <!-- Dynamic Colors -->
        @include('style')
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

    </head>
    <body>
        <div id="app" v-cloak>
            @include('partials.nav')

            @yield('content')

            <larecipe-back-to-top></larecipe-back-to-top>
        </div>


        <script>
            window.config = @json([]);
        </script>

        <script type="text/javascript">
            if(localStorage.getItem('larecipeSidebar') == null) {
                localStorage.setItem('larecipeSidebar', !! {{ config('larecipe.ui.show_side_bar') ?: 0 }});
            }
        </script>

        <script src="{{ asset('js/app.js') }}"></script>

        <script>
            window.LaRecipe = new CreateLarecipe(config)
        </script>

        <!-- Google Analytics -->
        @if(config('larecipe.settings.ga_id'))
            <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('larecipe.settings.ga_id') }}"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', "{{ config('larecipe.settings.ga_id') }}");
            </script>
        @endif
        <!-- /Google Analytics -->

        <script>
            LaRecipe.run()
            console.log('UI powered by LaRecipe');
            console.log('Copyright (c) 2018 Saleem Hadad');
            console.log('https://larecipe.binarytorch.com.my/');
        </script>
    </body>
</html>
