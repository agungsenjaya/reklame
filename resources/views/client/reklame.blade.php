@extends('layouts.index')
@section('content')
<div class="min-vh-100">
    <section class="space-m">
        <div class="container" id="reklame">
            <div class="row">
                <div class="col-md-3 d-none d-md-block">
                <!-- <h4 class="mb-0">Filter Reklame</h4> -->
                <!-- <hr> -->
                <div id="filter">
                <div class="card border filter__in">
                    <div class="card-header title-2 fw-semibold">
                        Filter Reklame
                    </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="indoor">
                    <label class="form-check-label title-1 text-secondary" for="indoor">
                        Indoor
                    </label>
                    </div>
                  </li>
                  <li class="list-group-item">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="outdoor">
                      <label class="form-check-label title-1 text-secondary" for="outdoor">
                          Outdoor
                        </label>
                    </div>
                  </li>
                </ul>
            </div>
            <div class="card-footer">
                <a href="javascript:void(0)" onClick="filter__in()" class="btn btn-primary w-100">Set Filter</a>
            </div>
            </div>
            </div>
                </div>
                <div class="col-md">
                <div class="d-flex justify-content-between flex-md-row flex-column">
                    <div class="text-center text-md-start">
                        <h4 class="mb-0">Daftar Papan Reklame</h4>
                        <p class="text-secondary mb-3 mb-md-0">Total <span class="fw-semibold text-primary">{{ counTing(count($reklame)) }}</span> papan reklame yang tersebar</p>
                    </div>
                    <div class="align-self-center">
                    <div class="input-group border rounded">
                    <input type="text" class="form-control fw-placeholder border-0 search"  placeholder="Pencarian reklame" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    <span class="input-group-text border-0 bg-white" id="basic-addon1">
                                <img src="{{ asset('icon/search.svg') }}" alt="" width="30">
                            </span>
                    </div>
                </div>
                </div>
                <!-- <hr> -->
                <ul class="list-group list-group-flush list">
                    @foreach($reklame->reverse() as $rek)
                    @php
                    $alamat = json_decode($rek->alamat);
                    $ukuran = json_decode($rek->ukuran);
                    $foto = json_decode($rek->foto);
                    $order = \App\Models\Order::where('reklame_id', $rek->id)->where('status','yes')->first();
                    @endphp
                  <li class="list-group-item px-0 py-4 border-transparent" id="{{ $rek->id }}">
                      <div class="row">
                          <div class="col-md-4">
                              <a href="{{ route('reklame.view',['id' => $rek -> slug]) }}">
                                  <!-- <img src="{{ asset($foto[0]->url) }}" alt="" width="100%" class="rounded mb-3 mb-sm-0"> -->
                                  <div class="rounded" style="background:url('https://dummyimage.com/700x500');background-size: cover;height:300px;background-position:center"></div>
                                </a>
                          </div>
                          <div class="col-md">
<div class="card-header">
    <h5 class="card-title title-2 fw-semibold text-capitalize judul">{{ $rek->judul }}</h5>
    <p class="text-secondary alamat">{{ $alamat->alamat }}</p>
</div>

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
            <!-- @if($rek->tipe == 'portrait')
                <i class="bi bi-phone h3 align-self-center me-2 text-primary"></i>
                @else
                <i class="bi bi-phone-landscape h3 align-self-center me-2 text-primary"></i>
                @endif -->
                <i class="bi bi-aspect-ratio h3 align-self-center me-2 text-primary"></i>
            <div class="media-body">
            <p class="font-12 text-secondary mb-0">Tipe</p>
            <p class="title-2 fw-semibold mb-0">{{ $rek->tipe }}</p>
        </div>
        </div>
        </div>
        <div class="col-md-4 col-6 mb-2">
        <div class="media">
                <i class="bi bi-compass h3 align-self-center me-2 text-primary"></i>
            <div class="media-body">
            <p class="font-12 text-secondary mb-0">Mengarah Ke</p>
            <p class="title-2 fw-semibold mb-0">{{ $rek->arah }}</p>
        </div>
        </div>
        </div>
        <div class="col-md-4 col-6 mb-2">
        <div class="media">
                <i class="bi bi-crop h3 align-self-center me-2 text-primary"></i>
            <div class="media-body">
            <p class="font-12 text-secondary mb-0">Kategori</p>
            <p class="title-2 fw-semibold mb-0 kategori">{{ $rek->kategori }}</p>
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
    <div class="card-footer d-flex justify-content-end border-top">
    <a target="_blank" href="https://wa.me/6281288874567?text=Halo%20saya%20mau%20menanyakan%20detail%20tentang%20produk%20{{ str_replace('-','%20',$rek->slug) }}" class="btn btn-primary">Beli Sekarang</a>
    <a href="{{ route('reklame.view',['id' => $rek -> slug]) }}" class="btn btn-outline-primary ms-3">Lihat Detail</a>
</div>
                              
                          </div>
                      </div>
                  </li>
                  @endforeach
                </ul>

                <!-- <ul class="pagination"></ul> -->

                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sticky-sidebar/3.3.1/sticky-sidebar.min.js" integrity="sha512-iVhJqV0j477IrAkkzsn/tVJWXYsEqAj4PSS7AG+z1F7eD6uLKQxYBg09x13viaJ1Z5yYhlpyx0zLAUUErdHM6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // var a = new StickySidebar('#filter', {
	// 		topSpacing: 20,
	// 		bottomSpacing: 20,
	// 		containerSelector: '.container',
	// 		innerWrapperSelector: '.filter__in'
	// 	});

        var options = {
            valueNames: [ 'judul', 'alamat' ,'kategori'],
            // page: 4,
            // pagination: true,
        };

        var list = new List('reklame', options);
        // list.search('reklame');

        // console.log(list);

        function filter__in() {
            list.filter(function(item) {
            if (item.values().kategori == 'outdoor' || item.values().kategori == 'indoora') {
                return true;
            } else {
            return false;
            }
            });
        }

        // $('.pagination > li').addClass('page-item');
        // $('.pagination > li > a').addClass('page-link');

</script>
@endsection
@section('title')
Reklame
@endsection
@section('meta')
<meta itemprop="name" content="Reklame | {{ config('app.name') }}">
<meta itemprop="description" content="Pasang reklame makin mudah bersama kami, sesuai dengan anggaran anda">

<meta name="twitter:title" content="Reklame | {{ config('app.name') }}">
<meta name="twitter:description" content="Pasang reklame makin mudah bersama kami, sesuai dengan anggaran anda">

<meta property="og:title" content="Reklame | {{ config('app.name') }}">
<meta property="og:description" content="Pasang reklame makin mudah bersama kami, sesuai dengan anggaran anda">
<meta property="og:url" content="{{ route('reklame') }}">
@endsection