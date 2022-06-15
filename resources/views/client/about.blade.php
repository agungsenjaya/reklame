@extends('layouts.index')
@section('content')
<div class="min-vh-100">
    <section class="bg-primary text-white pattern-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center order-2 order-md-1">
                <div class="px-3 px-md-5 py-4 py-md-0">
                    <h3>Tentang Kami</h3>
                    <p class="">Perusahaan kami bergerak sejak tahun 2010, seiring 
berjalannya waktu perusahaan kami berganti dengan nama 
cv. media adhi persada, sesuai dengan akta pendirian tahun 
2019. perusahaan kami merupakan sebuah perusahaan yang 
bergerak di bidang advertising, perdagangan , jasa dan 
lain-lain.</p>
                    <a href="{{ asset('pdf/COMPANY-PROFILE-MAP-2020.pdf') }}" target="_blank" class="btn btn-light text-primary"><i class="bi bi-file-earmark-pdf-fill me-2"></i>Company Profile</a>
                </div>
                </div>
                <div class="col-md-6 order-1 order-md-2">
                    <img src="{{ asset('img/about-1.png') }}" alt="" width="100%" class="rounded">
                </div>
            </div>
        </div>
    </section>
    <section class="space-m">
        <div class="container">
            <div class="row">
            <div class="col-md-10 offset-md-1">
            <div class="row">
            <div class="col-md-6 mb-4 mb-md-0">
                    <img src="{{ asset('img/about-2.png') }}" alt="" width="100%" class="rounded">
                </div>
            <div class="col-md-6 align-self-center mb-4 mb-md-0">
            <div class="px-3 px-md-5">
                    <h4>Visi Kami</h4>
                    <p class="text-secondary">Menjadi perusahaan advertising yang unggul dan berkualitas yang dapat memenuhi permintaan client. Melakukan inovasi dan perubahan demi menjadi perusahaan yang lebih sukses dan dipercaya oleh masyarak dan mitra kami</p>
                </div>
                </div>
            <div class="col-md-6 align-self-center order-2 order-md-1">
            <div class="px-3 px-md-5">
                    <h4>Misi Kami</h4>
                    <p class="text-secondary">Memberikan pelayanan terbaik bagi client , menjaga kualitas dan komitmen dalam kerjasama , mengutamakan keselamatan dan keamanan pada pekerjaan</p>
                </div>
                </div>
                <div class="col-md-6 mb-4 mb-md-0 order-1 order-md-2">
                <img src="{{ asset('img/about-3.png') }}" alt="" width="100%" class="rounded">
                </div>
            </div>
            </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('title')
Tentang Kami
@endsection
@section('meta')
<meta itemprop="name" content="Tentang Kami | {{ config('app.name') }}">
<meta itemprop="description" content="Perusahaan kami bergerak sejak tahun 2010, seiring 
berjalannya waktu perusahaan kami berganti dengan nama 
cv. media adhi persada">

<meta name="twitter:title" content="Tentang Kami | {{ config('app.name') }}">
<meta name="twitter:description" content="Perusahaan kami bergerak sejak tahun 2010, seiring 
berjalannya waktu perusahaan kami berganti dengan nama 
cv. media adhi persada">

<meta property="og:title" content="Tentang Kami | {{ config('app.name') }}">
<meta property="og:description" content="Perusahaan kami bergerak sejak tahun 2010, seiring 
berjalannya waktu perusahaan kami berganti dengan nama 
cv. media adhi persada">
<meta property="og:url" content="{{ route('about') }}">
@endsection