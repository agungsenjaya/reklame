@extends('layouts.index')
@section('content')
<div class="min vh-100">
    <section class="space-m">
        <div class="container">
            <div class="row">
                <div class="col-3 offset-5 text-center">
                    <h1 class="display-5">404</h1>
                    <p class="text-secondary">Halaman yang anda maksud tidak ditemukan, harap periksa kembali url yang anda masukan, Terima kasih.</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">Beranda</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection