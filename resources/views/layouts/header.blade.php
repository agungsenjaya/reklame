<div class="ads py-2 bg-primary text-white d-none">
  <div class="container text-center">
    <p class="m-0">#1 Advertising Papan Reklame, Cara Beriklan Yang Baik Untuk Jangkau Konsumen Yang lebih Luas.</p>
  </div>
</div>
<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('img/mapp.png') }}" width="200" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <!-- <span class="navbar-toggler-icon"></span> -->
      <i class="bi-list h3"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-top">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('home') }}">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('reklame') }}">Reklame</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('about') }}">Tentang Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('client') }}">Klien Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('portofolio') }}">Portofolio</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-none d-lg-block">
        <li class="nav-item">
          <a class="btn btn-outline-primary px-5" aria-current="page" href="{{ route('contact') }}">Hubungi Kami</a>
        </li>
      </ul>
    </div>
  </div>
</nav>