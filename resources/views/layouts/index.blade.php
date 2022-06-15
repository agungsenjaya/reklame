<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta property="og:type" content="advertising_sukabumi.reklame_sukabumi.daerah_sukabumi.jasa_advertising_sukabumi.media_adhi_persada" />
        @yield('meta')

        <title>@yield('title') | {{ config('app.name') }}</title>

        <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Saira:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        @livewireStyles
        @yield('css')
        {!! ReCaptcha::htmlScriptTagJsApi() !!}
    </head>
    <body class="antialiased">
        <div class="fixed-bottom text-end">
            <div class="m-3">
                <a href="https://api.whatsapp.com/send?phone=6281288874567&text=Halo%20saya%2C%20ingin%20menanyakan%20lebih%20lanjut%20tentang%20beriklan" target="_blank">
                    <img src="{{ asset('icon/whatsapp.svg') }}" alt="" width="50">
                </a>
            </div>
        </div>
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')

        
        @stack('modals')

        @livewireScripts

        @stack('scripts')
        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script>
          $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        </script>
        @yield('js')

    </body>
</html>
