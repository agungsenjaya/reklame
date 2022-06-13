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
    <div class="container">
      <hr class="m-0">
    </div>
    <section class="space-m bg-light">
        <div class="container">
          <div class="row">
          <div class="col-md-6 offset-md-3 mb-5 text-center">
            <h3 class="m-0">Tim Profesional</h3>
            <p class="mb-0 text-secondary">Cv. Media Adhi Persada, Dengan orang-orang yang Luar Biasa
Kami berusaha memberikan layanan yang terbaik.</p>
          </div>
          </div>

            <div class="row row-cols-2 row-cols-md-3 g-4 text-center">
  <div class="col">
  <div class="card bg-transparent">
    <div class="text-center">
      <img src="{{ asset('img/female.jpg') }}" class="" width="50%" alt="...">
    </div>
    <div class="card-body">
      <h5 class="card-title title-2">Dety Rahman</h5>
      <div class="badge alert-primary rounded-pill px-3 py-2">Komander</div>
    </div>
  </div>
  </div>
  <div class="col">
  <div class="card bg-transparent">
    <div class="text-center">
      <img src="{{ asset('img/male.jpg') }}" class="" width="50%" alt="...">
    </div>
    <div class="card-body">
      <h5 class="card-title title-2">Adi Sumarna</h5>
      <div class="badge alert-primary rounded-pill px-3 py-2">Direktur</div>
    </div>
  </div>
  </div>
  <div class="col">
  <div class="card bg-transparent">
    <div class="text-center">
      <img src="{{ asset('img/male.jpg') }}" class="" width="50%" alt="...">
    </div>
    <div class="card-body">
      <h5 class="card-title title-2">Aceng Baehaki</h5>
      <div class="badge alert-primary rounded-pill px-3 py-2">Project Manager</div>
    </div>
  </div>
  </div>
  <div class="col">
  <div class="card bg-transparent">
    <div class="text-center">
      <img src="{{ asset('img/male.jpg') }}" class="" width="50%" alt="...">
    </div>
    <div class="card-body">
      <h5 class="card-title title-2">Ade Indra</h5>
      <div class="badge alert-primary rounded-pill px-3 py-2">Administrasi Umum</div>
    </div>
  </div>
  </div>
  <div class="col">
  <div class="card bg-transparent">
    <div class="text-center">
      <img src="{{ asset('img/male.jpg') }}" class="" width="50%" alt="...">
    </div>
    <div class="card-body">
      <h5 class="card-title title-2">Encep Ramli</h5>
      <div class="badge alert-primary rounded-pill px-3 py-2">Tax & Permith</div>
    </div>
  </div>
  </div>
  <div class="col">
  <div class="card bg-transparent">
    <div class="text-center">
      <img src="{{ asset('img/male.jpg') }}" class="" width="50%" alt="...">
    </div>
    <div class="card-body">
      <h5 class="card-title title-2">Samsul Muin</h5>
      <div class="badge alert-primary rounded-pill px-3 py-2">SPV Placement</div>
    </div>
  </div>
  </div>
  
</div>

        </div>
    </section>
</div>
@endsection