@extends('layouts.index')
@section('content')
@php
$alamat = json_decode($data->alamat);
$ukuran = json_decode($data->ukuran);
$foto = json_decode($data->foto);
$order = \App\Models\Order::where('reklame_id', $data->id)->where('status','yes')->first();
@endphp
<div class="min-vh-100">
    <section class="space-m">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mb-3 mb-md-0">
                    <div id="filter">
                        <div class="filter__in">
                            <div class="swiper slider-2">
                                <div class="swiper-wrapper">
                                    @foreach($foto as $fo) 
                                    @php 
                                    $path = storage_path(); 
                                    $img = str_replace('\storage','\public', $path) . $fo->url; 
                                    @endphp
                                    <div class="swiper-slide">
                                        <a href="javascript:void(0)" data-fancybox="foto" data-src="{{ asset($fo->url) }}" data-caption="{{ ucfirst($data->judul) }}">
                                            <!-- <img src="{{ asset($fo->url) }}" width="100%" class="rounded" /> -->
                                            <img src="{{ asset('img/sample-1.png') }}" class="rounded" alt="..." width="100%" />
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="swiper slider-1 mt-3">
                                <div class="swiper-wrapper">
                                    @foreach($foto as $fo) @php $path = storage_path(); $img = str_replace('\storage','\public', $path) . $fo->url; @endphp
                                    <div class="swiper-slide">
                                        <a href="javascript:void(0)">
                                            <!-- <img src="{{ asset($fo->url) }}" width="100%" class="rounded" /> -->
                                            <img src="{{ asset('img/sample-1.png') }}" class="rounded" alt="..." width="100%" />
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <h4 class="title-2 fw-semibold text-capitalize">{{ $data->judul }}</h4>
                    <hr />
                    <div class="row mb-md-0 mb-3">
                        <div class="col-md-8">
                            <p class="text-secondary">{{ $alamat->alamat }}</p>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <a href="https://wa.me/6285759794605?text=Halo%20saya%20mau%20menanyakan%20detail%20tentang%20produk%20{{ str_replace('-','%20',$data->slug) }}" class="btn btn-lg w-100 rounded btn-primary" target="_blank">Beli Sekarang</a>
                            </div>
                        </div>
                    </div>
                    <!-- <h6 class="title-2 fw-semibold mt-4">Lokasi Map</h6>
                    <hr /> -->
                    <div id="map" class="rounded border"></div>
                    <h6 class="title-2 fw-semibold mt-4">Spesifikasi Reklame</h6>
                    <hr />
                    <div class="row card-body text-capitalize">
                        <div class="col-md-4 col-6 mb-2">
                            <div class="media">
                                <i class="bi bi-arrows-fullscreen h3 align-self-center me-2 text-primary"></i>
                                <div class="media-body">
                                    <p class="font-12 text-secondary mb-0">Ukuran Meter</p>
                                    <!-- <p class="title-2 fw-semibold mb-0"><span>{{ $ukuran->tinggi }}m</span> <i class="bi bi-x"></i> <span>{{ $ukuran->panjang }}m</span></p> -->
                                    <p class="title-2 fw-semibold mb-0"><span>4m</span> <i class="bi bi-x"></i> <span>3m</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 mb-2">
                            <div class="media">
                                <i class="bi bi-aspect-ratio h3 align-self-center me-2 text-primary"></i>
                                <div class="media-body">
                                    <p class="font-12 text-secondary mb-0">Tipe</p>
                                    <p class="title-2 fw-semibold mb-0">{{ $data->tipe }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 mb-2">
                            <div class="media">
                                <i class="bi bi-compass h3 align-self-center me-2 text-primary"></i>
                                <div class="media-body">
                                    <p class="font-12 text-secondary mb-0">Mengarah Ke</p>
                                    <p class="title-2 fw-semibold mb-0">{{ $data->arah }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 mb-2">
                            <div class="media">
                                <i class="bi bi-crop h3 align-self-center me-2 text-primary"></i>
                                <div class="media-body">
                                    <p class="font-12 text-secondary mb-0">Kategori</p>
                                    <p class="title-2 fw-semibold mb-0">{{ $data->kategori }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-6 mb-2">
                            <div class="media">
                                <i class="bi bi-check-circle h3 align-self-center me-2 text-primary"></i>
                                <div class="media-body">
                                    <p class="font-12 text-secondary mb-0">Status</p>
                                    <p class="title-2 fw-semibold mb-0">
                                        @if($order) Tersedia @else Tidak Tersedia @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6 class="title-2 fw-semibold mt-4">Deskripsi Reklame</h6>
                    <hr />
                    <p class="text-secondary">{{ $data->content }}</p>
                </div>
            </div>
        </div>
    </section>
    <div class="container d-none">
        <img src="https://dummyimage.com/1349x200" alt="" width="100%">
    </div>
    <section class="space-m">
        <div class="container">
            <h4 class="title-2 fw-semibold mb-4">Rekomendasi Kami</h4>

            <div class="swiper slider-3">
                <div class="swiper-wrapper">
                    @foreach($reklame->reverse()->take(6) as $rek) @php $alam = json_decode($rek->alamat); $uku = json_decode($rek->ukuran); $fotoo = json_decode($rek->foto); @endphp
                    <div class="swiper-slide">
                        <div class="card bg-transparent h-100">
                            <a href="{{ route('reklame.view',['id' => $rek -> slug]) }}">
                                <!-- <img src="{{ asset($fotoo[0]->url) }}" class="card-img-top rounded" alt="..." /> -->
                                <!-- <img src="https://dummyimage.com/600" class="card-img-top rounded" alt="..." /> -->
                                <img src="{{ asset('img/sample-1.png') }}" class="card-img-top rounded" alt="..." />
                            </a>
                            <div class="card-body">
                                <h5 class="card-title title-2  text-capitalize fw-semibold">{{ substr($rek->judul,0, 15) }}</h5>
                                <p class="font-12  text-secondary">{{ $alam->alamat }}</p>
                                <hr />
                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <p class="font-12  text-secondary mb-0">Ukuran Meter</p>
                                        <!-- <p class="  mb-0"><span>{{ $uku->tinggi }}m</span> <i class="bi bi-x"></i> <span>{{ $uku->panjang }}m</span></p> -->
                                        <p class=" mb-0 fw-semibold title-2"><span>4m</span> <i class="bi bi-x"></i> <span>3m</span></p>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <p class="font-12  text-secondary mb-0">Tipe</p>
                                        <p class=" mb-0 fw-semibold title-2 text-capitalize">{{ $rek->tipe }}</p>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <p class="font-12  text-secondary mb-0">Mengarah Ke</p>
                                        <p class=" mb-0 fw-semibold title-2 text-capitalize">{{ $rek->arah }}</p>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <p class="font-12  text-secondary mb-0">Kategori</p>
                                        <p class=" mb-0 fw-semibold title-2 text-capitalize">{{ $rek->kategori }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('reklame.view',['id' => $rek -> slug]) }}" class="btn btn-primary w-100">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination position-relative mt-4"></div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('css')
<link href="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css" rel="stylesheet">
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.1.6/swiper-bundle.min.css" integrity="sha512-trOoBBr/c0fsBG4Yzsw84nudyqyONkrWyyoi6lcJgppKRNL7y8R1crNwB2NAEmwR6A72fcxOtSySFf1Kvie7YQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
  #map { 
    /* position: absolute;  */
    top: 0; 
    bottom: 0; 
    height: 300px; 
    width: 100%; 
  }
.slider-1 .swiper-slide {
        width: 25%;
        height: 100%;
      }

      .slider-1 .swiper-slide-thumb-active {
        border: 2px solid #00367a;
        border-radius: 0.6rem;
      }

</style>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sticky-sidebar/3.3.1/sticky-sidebar.min.js" integrity="sha512-iVhJqV0j477IrAkkzsn/tVJWXYsEqAj4PSS7AG+z1F7eD6uLKQxYBg09x13viaJ1Z5yYhlpyx0zLAUUErdHM6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.1.6/swiper-bundle.min.js" integrity="sha512-BalAj1QDxNKnkwuDTiYL62iR/evB9429/SoJVTK9344Sc1VJtwpC4OFxKNu3vZMtSpbLEre3oCtr0maV3CddRw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  mapboxgl.accessToken = 'pk.eyJ1IjoiYWd1bmdzZW5qYXlhIiwiYSI6ImNqbGVnMjhtYTBpOXEza3F6NzI4M2RmbHAifQ.1WV_fgbmd1eMI4C444BDqQ';
const coordinates = document.getElementById('coordinates');
const map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11',
// style: 'mapbox://styles/mapbox/light-v10',
center: [<?php echo $alamat->lng; ?>, <?php echo $alamat->lat; ?>],
zoom: 16
});

const marker = new mapboxgl.Marker()
.setLngLat([<?php echo $alamat->lng; ?>, <?php echo $alamat->lat; ?>])
.addTo(map);

Fancybox.bind("[data-fancybox]", {
          // Your options go here
        });


        var swiper1 = new Swiper(".slider-1", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
      });
      var swiper2 = new Swiper(".slider-2", {
        spaceBetween: 10,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        thumbs: {
          swiper: swiper1,
        },
      });

      var swiper3 = new Swiper(".slider-3", {
        // slidesPerView: 4,
        // spaceBetween: 30,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
          640: {
            slidesPerView: 1,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 3,
            spaceBetween: 30,
          },
          1024: {
            slidesPerView: 4,
            spaceBetween: 30,
          },
          },
      });

    //   var a = new StickySidebar('#filter', {
	// 		topSpacing: 20,
	// 		bottomSpacing: 20,
	// 		containerSelector: '.container',
	// 		innerWrapperSelector: '.filter__in'
	// 	});

</script>
@endsection