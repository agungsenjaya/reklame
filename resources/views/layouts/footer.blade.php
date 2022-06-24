<footer class="space-xl bg-primary">
    <div class="container">
    <div class="px-5 px-md-0">
      <div class="text-center text-md-start">
        <img src="{{ asset('img/mapp-white.png') }}" width="200" alt="">
      </div>
        <div class="row my-3">
            <div class="col-md-4 mb-4 mb-md-0">
            <div class="text-center text-md-start">
              <p class="text-white m-0">Jl. Cimahi Cibaraja RT. 01 RW. 01 No. 01 Desa Selajambe
Kecamatan Cisaat Kabupaten Sukabumi, 43152</p>
            </div>
            </div>
            <div class="col-md">
            <ul class="nav justify-content-center justify-content-md-end nav-social align-self-center">
            <li class="nav-item">
                <a class="nav-link" href="https://web.facebook.com/mediaapersada" target="_blank">
                  <div class="btn-icon bg-white text-center">
                  <i class="fab fa-facebook-f"></i>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://www.instagram.com/mediaapersada" target="_blank">
                  <div class="btn-icon bg-white text-center">
                  <i class="fab fa-instagram"></i>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="mailto:mediaapersada@gmail.com?subject=Customer Website" target="_blank">
                  <div class="btn-icon bg-white text-center">
                  <i class="bi-envelope-fill"></i>
                  </div>
                </a>
              </li>
            </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">
            <ul class="nav nav-foot justify-content-center justify-content-md-start">
                <li class="nav-item">
                    <a class="nav-link text-white ps-2 ps-md-0">
                    Telp : 0811845432
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white pe-2 pe-md-0">
                    Email : mediaapersada@gmail.com
                    </a>
                </li>
            </ul>
            </div>
            <div class="col-md-6">

            <ul class="nav nav-foot justify-content-center justify-content-md-end">
        <li class="nav-item">
          <a class="nav-link ps-0" aria-current="page" href="{{ route('home') }}">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('reklame') }}">Reklame</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{ route('about') }}">Tentang Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link pe-2 pe-md-0" aria-current="page" href="{{ route('client') }}">Klien Kami</a>
        </li>
      </ul>
            
            </div>
        </div>
        </div>
        <hr class="bg-white">
        <div class="text-center text-md-start">
            <p class="mb-0 text-white">Cv. Media Adhi Persada © {{ date('Y') }} • Hak Cipta Dilindungi Undang-Undang.</p>
        </div>
    </div>
</footer>