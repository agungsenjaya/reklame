<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Saira:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        @livewireStyles
        @yield('css')
    </head>
    <body class="font-sans antialiased bg-light" onload="startTime()">
        <div class="row g-0">
            <div class="col-md-2 sticky-top">
                <div class="bg-primary min-vh-100 shadow sticky-top">

                <nav class="navbar bg-primary-2">
  <div class="container text-center">
    <a class="navbar-brand mx-auto text-white title-2 fw-bold" href="#">Admin Panel</a>
  </div>
</nav>

                <!-- <a class="navbar-brand me-4" href="/">
            <img src="https://dummyimage.com/800x200" alt="" width="100%"> 
        </a> -->

                <div class="list-group list-group-flush list-admin">
  <!-- <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
    The current link item
  </a> -->
  <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action {{ ($header == 'Dashboard') ? 'list-active' : '' }}"><i class="bi-ui-radios-grid me-3"></i>Dashboard</a>
  <a href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#nav-1" class="list-group-item d-flex justify-content-between"><i class="bi-stack me-3"></i>Reklame<i class="bi-chevron-down ms-auto"></i></a>
  <div class="bg-lab-2 collapse {{ ($header == 'Reklame' || $header == 'Tambah Reklame' || $header == 'Edit Reklame') ? 'show' : '' }}" id="nav-1" style="">

                <div class="list-group list-group-flush drop-admin">
                  <a href="{{ route('reklame.index') }}" class="list-group-item list-group-item-action {{ ($header == 'Reklame' || $header == 'Edit Reklame' ) ? 'list-active' : '' }}"><i class="bi-dot me-3"></i>Table Reklame</a>
                  <a href="{{ route('reklame.create') }}" class="list-group-item list-group-item-action {{ ($header == 'Tambah Reklame') ? 'list-active' : '' }}"><i class="bi-dot me-3"></i>Tambah Reklame</a>
                </div>
                
              </div>
              <a href="{{ route('order.index') }}"  class="list-group-item list-group-item-action {{ ($header == 'Order') ? 'list-active' : '' }}"><i class="bi-sliders2 me-3"></i>Table Order</a>
  <a href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#nav-2" class="list-group-item d-flex justify-content-between"><i class="bi-collection-fill me-3"></i>Brand<i class="bi-chevron-down ms-auto"></i></a>
  <div class="bg-lab-2 collapse {{ ($header == 'Brand' || $header == 'Tambah Brand' || $header == 'Edit Brand') ? 'show' : '' }}" id="nav-2" style="">

                <div class="list-group list-group-flush drop-admin">
                  <a href="{{ route('brand.index') }}" class="list-group-item list-group-item-action {{ ($header == 'Brand' || $header == 'Edit Brand' ) ? 'list-active' : '' }}"><i class="bi-dot me-3"></i>Table Brand</a>
                  <a href="{{ route('brand.create') }}" class="list-group-item list-group-item-action {{ ($header == 'Tambah Brand') ? 'list-active' : '' }}"><i class="bi-dot me-3"></i>Tambah Brand</a>
                </div>
                
              </div>
  <a href="{{ route('contact.index') }}"  class="list-group-item list-group-item-action {{ ($header == 'Contact') ? 'list-active' : '' }}"><i class="bi-envelope-open-fill me-3"></i>Contact List</a>
  <a href="{{ route('profile.show') }}" class="list-group-item list-group-item-action {{ ($header == 'Profile') ? 'list-active' : '' }}"><i class="bi-gear-fill me-3"></i>Account</a>
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
            </header>
            <x-jet-banner /> -->
            <!-- Page Content -->
            <main class="container p-3">
                {{ $slot }}
            </main>
            </div>
        </div>
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
  function startTime() {
  const today = new Date();
  let h = today.getHours();
  let m = today.getMinutes();
  let s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('jam').innerHTML =  h + ":" + m + ":" + s;
  setTimeout(startTime, 1000);
}

function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}
        </script>
        @yield('js')
    </body>
</html>
