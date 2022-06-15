@extends('layouts.index')
@section('content')
<div class="min-vh-100">
<section class="space-m">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                <h4 class="mb-0 text-capitalize">{{ $data->judul }}</h4>
                    <hr>
                <div class="d-flex mb-3 justify-content-between flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                    <div class="text-secondary">
                        <i class="bi-calendar2 me-1"></i>{{ $data->created_at->format('d M Y') }}
                    </div>
                </div>
                <div>

<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_button_copy_link"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_whatsapp"></a>
</div>

                </div>
                </div>
                <!-- <img src="{{ asset($data->foto) }}" alt="" width="100%"> -->
                <img src="https://dummyimage.com/1349x700" alt="" width="100%">
                <!-- <hr> -->
                <div class="my-3 blog">
                    {!! $data->content  !!}
                </div>
                </div>
            </div>
</div>
</section>
<div class="container">
    <hr class="m-0">
</div>
<section class="space-m">
    <div class="container">
        <div class="mb-4">
            <h4 class="mb-0 text-capitalize">Portofolio lainnya</h4>
        </div>

        <div class="swiper slider-3">
                <div class="swiper-wrapper">
                    @foreach($portofolio->reverse()->take(6) as $port)
                    <div class="swiper-slide">
                        <div class="card bg-transparent h-100">
                            <a href="{{ route('portofolio.view',['id' => $port -> slug]) }}">
                            <div class="rounded" style="background:url('https://dummyimage.com/700x500');background-size: cover;height:300px;background-position:center"></div>
                            </a>
                            <div class="card-body">
                                <h5 class="card-title title-2  text-capitalize fw-semibold">{{ $port->judul }}</h5>
                                <div class="text-secondary">
                                    <i class="bi-calendar2 me-1"></i>{{ $port->created_at->format('d M Y') }}
                                </div>
                                <hr />
                                @php
                                $text = new \Html2Text\Html2Text($port->content);
                                @endphp
                                <p>
                                    {{ substr($text->getText(), 0 , 100) }}
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('portofolio.view',['id' => $port -> slug]) }}" class="btn btn-primary w-100">Lihat Detail</a>
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.1.6/swiper-bundle.min.css" integrity="sha512-trOoBBr/c0fsBG4Yzsw84nudyqyONkrWyyoi6lcJgppKRNL7y8R1crNwB2NAEmwR6A72fcxOtSySFf1Kvie7YQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('js')
<script async src="https://static.addtoany.com/menu/page.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.1.6/swiper-bundle.min.js" integrity="sha512-BalAj1QDxNKnkwuDTiYL62iR/evB9429/SoJVTK9344Sc1VJtwpC4OFxKNu3vZMtSpbLEre3oCtr0maV3CddRw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    var a2a_config = a2a_config || {};
    a2a_config.icon_color = "#023e8a";

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

</script>
@endsection
@section('title')
{{ ucfirst($data->judul) }}
@endsection
@section('meta')
<meta itemprop="name" content="{{ ucfirst($data->judul) }} | {{ config('app.name') }}">
<meta itemprop="description" content="{{ substr($data->content, 0 , 100) }}">
<meta itemprop="image" content="{{ asset($data->foto) }}">

<meta name="twitter:title" content="{{ ucfirst($data->judul) }} | {{ config('app.name') }}">
<meta name="twitter:description" content="{{ substr($data->content, 0 , 100) }}">
<meta name="twitter:image:src" content="{{ asset($data->foto) }}">
<meta name=twitter:card content="summary_large_image">

<meta property="og:title" content="{{ ucfirst($data->judul) }} | {{ config('app.name') }}">
<meta property="og:image" content="{{ asset($data->foto) }}">
<meta property="og:description" content="{{ substr($data->content, 0 , 100) }}">
<meta property="og:url" content="{{ route('portofolio.view',['id' => $data -> slug]) }}">
@endsection