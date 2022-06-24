@extends('layouts.index')
@section('content')
<div class="min-vh-100">
    <section class="space-xl bg-primary pattern-2">
        <div class="container">
        <div class="text-center text-white">
                        <h3 class="mb-0">Daftar Portofolio</h3>
                        <p class="mb-0">Total <span class="fw-semibold">{{ counTing(count($portofolio)) }}</span> portofolio</p>
                    </div>
        </div>
    </section>
    <section class="space-m">
        <div class="container" id="portofolio">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                <div class="col-md-8 offset-md-2">
                    <div class="align-self-center">
                    <div class="input-group border rounded">
                    <input type="text" class="form-control fw-placeholder border-0 search"  placeholder="Pencarian portofolio" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    <span class="input-group-text border-0 bg-white" id="basic-addon1">
                                <img src="{{ asset('icon/search.svg') }}" alt="" width="30">
                            </span>
                    </div>
                </div>
                </div>
                <!-- <hr> -->
                <ul class="list-group list-group-flush list">
                    @foreach($portofolio->reverse() as $port)
                  <li class="list-group-item px-0 py-4 border-transparent" id="{{ $port->id }}">
                      <div class="row">
                          <div class="col-md-4">
                              <a href="{{ route('portofolio.view',['id' => $port -> slug]) }}">
                              <div class="rounded" style="background:url({{ asset($port->foto) }});background-size: cover;height:250px;background-position:center"></div>
                                </a>
                          </div>
                          <div class="col-md">
<div class="card-header">
    <h5 class="card-title title-2 fw-semibold text-capitalize judul">{{ $port->judul }}</h5>
    <div class="text-secondary">
        <i class="bi-calendar2 me-1"></i>{{ $port->created_at->format('d M Y') }}
    </div>
</div>
<div class="card-body">
<p class="text-secondary mb-0">
        @php
        $text = new \Html2Text\Html2Text($port->content);
        @endphp
        {{ substr($text->getText(), 0 , 200) }}
        </p>
</div>
    <div class="card-footer d-flex justify-content-start justify-content-md-end border-top px-0">
    <a href="{{ route('portofolio.view',['id' => $port -> slug]) }}" class="btn btn-outline-primary ms-3">Lihat Detail</a>
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

        var list = new List('portofolio', options);
        // list.search('portofolio');

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
Portofolio
@endsection
@section('meta')
<meta itemprop="name" content="Portofolio | {{ config('app.name') }}">
<meta itemprop="description" content="Berikut portofolio kami dan proyek yang telah dikerjakan">

<meta name="twitter:title" content="Portofolio | {{ config('app.name') }}">
<meta name="twitter:description" content="Berikut portofolio kami dan proyek yang telah dikerjakan">

<meta property="og:title" content="Portofolio | {{ config('app.name') }}">
<meta property="og:description" content="Berikut portofolio kami dan proyek yang telah dikerjakan">
<meta property="og:url" content="{{ route('portofolio') }}">
@endsection