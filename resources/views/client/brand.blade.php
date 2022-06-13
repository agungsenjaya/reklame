@extends('layouts.index')
@section('content')
<div class="min-vh-100">
    <section class="space-xl bg-primary pattern-2 text-white">
        <div class="container">
        <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <div class="px-5 px-md-0">
                <h3 class="mb-0">Partner Klien Kami</h3>
                <p class="mb-0">Sudah banyak perusahaan yang menggunakan jasa kami</p>
            </div>
    </div>
    </div>
        </div>
    </section>
<section class="space-xl">
<div class="container">
    <div class="row text-center d-none">
        <div class="col-md">
            <h1 class="mb-0 text-primary">{{ counTing(count($brand)) }}</h1>
            <p class="mb-0">Company</p>
    </div>
    <div class="col-md border-start">
        <h1 class="mb-0 text-primary">{{ counTing(count($brand)) }}</h1>
        <p class="mb-0">Industrial</p>
    </div>
    <div class="col-md border-start">
        <h1 class="mb-0 text-primary">{{ counTing(count($brand)) }}</h1>
        <p class="mb-0">Home Industry</p>
    </div>
    </div>

    <!-- <img src="https://dummyimage.com/1349x300" alt="" width="100%"> -->
<div class="row list-brand mt-3">
    @foreach($brand as $bra)
    <div class="col-md-3 mb-4 col-6">
        <img src="{{ $bra->foto }}" alt="" width="100%" class="gray-1 opacity-75">
    </div>
    @endforeach
</div>
</div>
</section>
<section class="space-m">
    <div class="container">
        <div class="bg-primary rounded pattern-2">
        <div class="row position-relative">
            <div class="col-md-6 align-self-center order-2 order-md-1">
            <div class="px-3 px-md-5 text-white space-m text-center text-md-start">
                    <h4>Hubungi Kami</h4>
                    <p class="">Jika Anda memiliki pertanyaan atau saran jangan ragu untuk menghubungi kami</p>
                    <a href="{{ route('contact') }}" class="btn btn-light text-primary">Hubungi Kami</a>
                </div>
                </div>
                <div class="col-md-6 order-1 order-md-2 text-center hubungi">
                    <img src="{{ asset('img/home-2.png') }}" alt="" width="50%" class="rounded">
                    <!-- <img src="{{ asset('img/about-2.png') }}" alt="" width="100%" class="rounded"> -->
                </div>
        </div>
        </div>
    </div>
</section>
</div>
<div class="text-end">
        <img src="{{ asset('img/line-1.png') }}" alt="" width="100" />
    </div>
@endsection