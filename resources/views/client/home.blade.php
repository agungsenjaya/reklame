@extends('layouts.index')
@section('content')
<div class="min-vh-100">
    <div class="position-relative">
        <section class="bg-primary p-md-0 p-4 text-center text-md-start">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 align-self-center text-white order-2 order-md-1 z-in-1">
                        <h1 class="">Advertising Reklame Daerah Sukabumi</h1>
                        <p>Kami memberikan Layanan dengan Kualitas Terjamin dan ketepatan waktu pengerjaan untuk mendukung bisnis Anda</p>
                        <a href="{{ route('contact') }}" class="btn btn-light text-primary">Hubungi Kami</a>
                    </div>
                    <div class="col-md-7 d-flex justify-content-end conta order-1 order-md-1 mb-md-0 mb-4">
                        <div>
                            <img src="{{ asset('img/hero.png') }}" alt="" width="100%" class="opacity-res" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="to-right w-100 d-none d-lg-block">
            <div class="container me-0">
                <div class="row">
                    <div class="col-md-7 offset-md-5">
                        <img src="{{ asset('img/hero.png') }}" alt="" width="100%" class="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="space-xl">
        <div class="container boo">
            <div class="row">
                <div class="col-md-3 col-6 mb-md-0 mb-4">
                    <div class="p-4 p-md-0 text-center text-md-start">
                        <img src="{{ asset('icon/1.svg') }}" alt="" width="50" />
                    </div>
                    <h4 class="title-2 my-3 fw-semibold text-center text-md-start">Harga Bersaing</h4>
                    <p class="text-secondary mb-0">Beriklan menyesuaikan dengan anggaran yang anda miliki</p>
                </div>
                <div class="col align-self-center text-center d-md-block d-none">
                    <img src="{{ asset('icon/right.svg') }}" alt="" width="40" />
                </div>
                <div class="col-md-3 col-6 mb-md-0 mb-4">
                    <div class="p-4 p-md-0 text-center text-md-start">
                        <img src="{{ asset('icon/2.svg') }}" alt="" width="50" />
                    </div>
                    <h4 class="title-2 my-3 fw-semibold text-center text-md-start">Tim Profesional</h4>
                    <p class="text-secondary mb-0">Poyek perusahaan dikerjakan oleh tim yang ahli dibidangnya</p>
                </div>
                <div class="col align-self-center text-center d-md-block d-none">
                    <img src="{{ asset('icon/right.svg') }}" alt="" width="40" />
                </div>
                <div class="col-md-3 col-6 mb-md-0">
                    <div class="p-4 p-md-0 text-center text-md-start">
                        <img src="{{ asset('icon/3.svg') }}" alt="" width="50" />
                    </div>
                    <h4 class="title-2 my-3 fw-semibold text-center text-md-start">Bergaransi</h4>
                    <p class="text-secondary mb-0">Kami mempunyai garansi yang cukup meyakinkan konsumen</p>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <hr class="m-0" />
    </div>
    <section class="space-xl">
        <div class="container boo">
            <div class="mb-3 d-flex justify-content-between">
                <h4 class="boo title-2 fw-semibold">Reklame Terbaru</h4>
                <a href="{{ route('reklame') }}">Reklame Lainnya</a>
            </div>

            <div class="swiper slider-1">
                <div class="swiper-wrapper">
                    @foreach($reklame->reverse()->take(6) as $rek) @php $alam = json_decode($rek->alamat); $uku = json_decode($rek->ukuran); $fotoo = json_decode($rek->foto); @endphp
                    <div class="swiper-slide">
                        <div class="card bg-transparent h-100">
                            <a href="{{ route('reklame.view',['id' => $rek -> slug]) }}">
                                <!-- <img src="{{ asset($fotoo[0]->url) }}" class="card-img-top rounded" alt="..." /> -->
                                <!-- <div class="rounded" style="background:url('https://dummyimage.com/700x500');background-size: cover;height:300px;background-position:center"></div> -->
                                <div class="rounded" style="background:url({{ asset($fotoo[0]->url) }});background-size: cover;height:300px;background-position:center"></div>
                            </a>
                            <div class="card-body">
                                <div style="height:50px" class="d-none d-md-block">
                                    <p class="card-title title-2  text-capitalize fw-semibold">{{ $rek->judul }}</p>
                                </div>
                                <div class="d-md-none d-block">
                                    <p class="card-title title-2  text-capitalize fw-semibold">{{ $rek->judul }}</p>
                                </div>
                                <p class="font-12  text-secondary">{{ substr($alam->alamat,0,100) }}..</p>
                                <hr />
                                <div class="row">
                                    <div class="col-6 mb-2">
                                        <p class="font-12  text-secondary mb-0">Ukuran Meter</p>
                                        <p class="  mb-0 fw-semibold title-2"><span>{{ $uku->tinggi }}m</span> <i class="bi bi-x"></i> <span>{{ $uku->panjang }}m</span></p>
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
    <div class="container">
        <hr />
    </div>
    <section class="space-xl">
        <div class="container boo">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-md-0">
                        <img src="{{ asset('img/home-1.png') }}" alt="" width="100%" class="rounded">
                        </div>
                        <div class="col-md-6 align-self-center">
                            <div class="px-3 px-md-5">
                                <h4 class="title-2 fw-semibold">Beriklan sesuai dengan anggaran Anda</h4>
                                <p class="text-secondary">
                                    Kami akan menjadi solusi untuk mengiklankan produk, dengan anggaran yang menyesuaikan dengan Anda punya. Ada beberapa tahapan yang harus dilakukan oleh kounsumen, Untuk selengkapnya silahkan hubungi kami.
                                    <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, nihil. Labore ea doloremque tenetur quasi tempore aliquam dolorem, nulla unde dolorum enim magnam molestiae consectetur quia aut iusto laboriosam officiis. -->
                                </p>
                                <a href="{{ route('contact') }}" class="btn btn-outline-primary">Hubungi Kami</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div>
        <br>
        <br>
        <br>
        <br>
    </div>
    <section class="bg-primary text-white pattern-2">
        <div class="container boo">
            <div class="row">
            <div class="col-md-6 order-2 order-md-1 align-items-end">
            <div class="px-3 px-md-5 space-m">
                <div class="mb-3">
                    <h4 class="mb-0 title-2 fw-semibold">Layanan Lainnya</h4>
                    <p class="">Layanan yang akan membantu bisnis anda</p>
                </div>
                <ul class="list-group list-group-flush list-layanan">
                    <li class="list-group-item px-0">
                        <div class="media">
                            <i class="bi-check-circle-fill text-success me-3"></i>
                            <div class="media-body">
                                <p class="m-0 ">
                                    Jasa Event Organizer
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item px-0">
                        <div class="media">
                            <i class="bi-check-circle-fill text-success me-3"></i>
                            <div class="media-body">
                                <p class="m-0 ">
                                Jasa Periklanan
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item px-0">
                        <div class="media">
                            <i class="bi-check-circle-fill text-success me-3"></i>
                            <div class="media-body">
                                <p class="m-0 ">
                                Jasa Design Grafis
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item px-0">
                        <div class="media">
                            <i class="bi-check-circle-fill text-success me-3"></i>
                            <div class="media-body">
                                <p class="m-0 ">
                                Jasa Multimedia dan Animasi
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item px-0">
                        <div class="media">
                            <i class="bi-check-circle-fill text-success me-3"></i>
                            <div class="media-body">
                                <p class="m-0 ">
                                Jasa Talent Management
                                </p>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item px-0">
                        <div class="media">
                            <i class="bi-check-circle-fill text-success me-3"></i>
                            <div class="media-body">
                                <p class="m-0 ">
                                Jasa Photography dan Videography
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="d-md-none d-block">
                    <a href="{{ route('contact') }}" class="btn btn-light text-primary mt-4">Hubungi Kami</a>
                </div>

            </div>
            </div>
                <div class="col-md-6 order-1 order-md-2 layanan text-center">
                    <img src="{{ asset('img/home-4.png') }}" alt="" width="90%" class="rounded">
                </div>
            </div>
            <!-- <img src="https://dummyimage.com/1080x400" alt="" width="100%" /> -->
        </div>
    </section>
    <section class="space-xl">
        <div class="container boo">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-0 text-center">
                    <img src="{{ asset('img/home-3.png') }}" alt="" width="80%" class="rounded" />
                </div>
                <div class="col-md-6 align-self-center">
                    <div class="px-3 px-md-5">
                        <h4 class="title-2 fw-semibold">Masih bingung cari lokasi untuk beriklan ?</h4>
                        <p class="text-secondary">
                            Kami akan membantu anda untuk mencarikan lokasi yang tepat sesuai dengan target market produk Anda.
                        </p>
                        <a href="{{ route('contact') }}" class="btn btn-outline-primary">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <hr class="m-0">
    </div>
    <section class="space-xl">
        <div class="container boo">
            <div class="text-center col-md-6 offset-md-3 mb-3 px-5 px-md-0">
                <h4 class="m-0 title-2 fw-semibold">Partner Klien Kami</h4>
                <p class="text-secondary">Sudah banyak perusahaan yang menggunakan jasa kami</p>
            </div>
            <div class="row text-center">
                <div class="col-md-3 mb-4 col-6 bg-white">
                    <img src="{{ $brand[0]->foto }}" alt="" width="80%" class="gray-1 opacity-75" />
                </div>
                <div class="col-md-3 mb-4 col-6 border-start bg-white">
                    <img src="{{ $brand[1]->foto }}" alt="" width="80%" class="gray-1 opacity-75" />
                </div>
                <div class="col-md-3 mb-4 col-6 border-start bg-white">
                    <img src="{{ $brand[2]->foto }}" alt="" width="80%" class="gray-1 opacity-75" />
                </div>
                <div class="col-md-3 mb-4 col-6 bg-white">
                    <img src="{{ $brand[3]->foto }}" alt="" width="80%" class="gray-1 opacity-75" />
                </div>
            </div>
        </div>
    </section>
</div>
<div class="text-end">
    <img src="{{ asset('img/line-1.png') }}" alt="" width="100" />
</div>
@endsection
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.1.6/swiper-bundle.min.css" integrity="sha512-trOoBBr/c0fsBG4Yzsw84nudyqyONkrWyyoi6lcJgppKRNL7y8R1crNwB2NAEmwR6A72fcxOtSySFf1Kvie7YQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    @media (min-width: 1200px) {
        /*  */
    }
</style>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.1.6/swiper-bundle.min.js" integrity="sha512-BalAj1QDxNKnkwuDTiYL62iR/evB9429/SoJVTK9344Sc1VJtwpC4OFxKNu3vZMtSpbLEre3oCtr0maV3CddRw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js" integrity="sha512-VEBjfxWUOyzl0bAwh4gdLEaQyDYPvLrZql3pw1ifgb6fhEvZl9iDDehwHZ+dsMzA0Jfww8Xt7COSZuJ/slxc4Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollTrigger.min.js" integrity="sha512-v8B8T8l8JiiJRGomPd2k+bPS98RWBLGChFMJbK1hmHiDHYq0EjdQl20LyWeIs+MGRLTWBycJGEGAjKkEtd7w5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var swiper = new Swiper(".slider-1", {
        // slidesPerView: 1,
        // spaceBetween: 50,
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

      const boo = gsap.utils.toArray('.boo');
    boo.forEach((box, i) => {
    const anim1 = gsap.fromTo(box, { autoAlpha: 0, y: 60 }, { duration: 1, autoAlpha: 1, y: 0 });
    ScrollTrigger.create({
        trigger: box,
        animation: anim1,
        // toggleActions: 'play none none none',
        // start: "top",
        // markers: true,
        // once: true 
    });
    });
      
    const booo = gsap.utils.toArray('.booo');
    booo.forEach((box, i) => {
    const anim2 = gsap.fromTo(box, { autoAlpha: 0, y: 60 }, { duration: 1, autoAlpha: 1, y: 0 });
    ScrollTrigger.create({
        trigger: box,
        animation: anim2,
        // toggleActions: 'play none none none',
        // start: "top",
        // markers: true,
        // once: true 
    });
    });

</script>
@endsection
@section('title')
Beranda
@endsection
@section('meta')
<meta itemprop="name" content="Beranda | {{ config('app.name') }}">
<meta itemprop="description" content="Advertising sukabumi, menerima pembuatan dan pemasaran reklame,neon, billboard daerah sukabumi dan luar kota.">
<meta itemprop="image" content="{{ asset('img/meta.jpg') }}">

<meta name="twitter:title" content="Beranda | {{ config('app.name') }}">
<meta name="twitter:description" content="Advertising sukabumi, menerima pembuatan dan pemasaran reklame,neon, billboard daerah sukabumi dan luar kota.">
<meta name="twitter:image:src" content="{{ asset('img/meta.jpg') }}">
<meta name=twitter:card content="summary_large_image">

<meta property="og:title" content="Beranda | {{ config('app.name') }}">
<meta property="og:image" content="{{ asset('img/meta.jpg') }}">
<meta property="og:description" content="Advertising sukabumi, menerima pembuatan dan pemasaran reklame,neon, billboard daerah sukabumi dan luar kota.">
<meta property="og:url" content="{{ route('home') }}">
@endsection