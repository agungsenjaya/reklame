<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js" integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-light">
        <div class="row g-0">
            <div class="col-md-2 sticky-top">
                <div class="bg-dark min-vh-100 shadow sticky-top">

                <div class="list-group list-group-flush">
  <!-- <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
    The current link item
  </a> -->
  <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action"><i class="fas fa-window-maximize me-3"></i>Dashboard</a>
  <a href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#nav-1" class="list-group-item d-flex justify-content-between"><i class="fas fa-images me-3"></i>Reklame<i class="bi bi-chevron-down ms-auto"></i></a>
  <div class="bg-lab-2 collapse" id="nav-1" style="">

                <div class="list-group list-group-flush nav-res">
                  <a href="#" class="list-group-item list-group-item-action "><i class="bi bi-dot me-3"></i>Table Reklame</a>
                  <a href="#" class="list-group-item list-group-item-action "><i class="bi bi-dot me-3"></i>Tambah Reklame</a>
                </div>
                
              </div>
  <a href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#nav-2" class="list-group-item d-flex justify-content-between"><i class="fas fa-images me-3"></i>Order<i class="bi bi-chevron-down ms-auto"></i></a>
  <div class="bg-lab-2 collapse" id="nav-2" style="">

                <div class="list-group list-group-flush nav-res">
                  <a href="#" class="list-group-item list-group-item-action "><i class="bi bi-dot me-3"></i>Table Order</a>
                  <a href="#" class="list-group-item list-group-item-action "><i class="bi bi-dot me-3"></i>Tambah Order</a>
                </div>
                
              </div>
  <a href="#" class="list-group-item list-group-item-action"><i class="fas fa-images me-3"></i>Contact List</a>
  <a class="list-group-item list-group-item-action disabled"><i class="fas fa-images me-3"></i>Account</a>
</div>

                </div>
            </div>
        <div class="col-md">
            @livewire('navigation-menu')
            <!-- Page Heading -->
            <!-- <header class="d-flex py-3 bg-white shadow-sm border-bottom">
                <div class="container">
                    {{ $header }}
                </div>
            </header> -->
            <x-jet-banner />
            <!-- Page Content -->
            <main class="container px-3">
                {{ $slot }}
            </main>
            </div>
        </div>
        @stack('modals')

        @livewireScripts

        @stack('scripts')
    </body>
</html>
