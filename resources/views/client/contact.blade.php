@extends('layouts.index')
@section('content')
<div class="min-vh-100">
<section class="space-xl bg-primary pattern-2">
<div class="container">
<div class="text-center row text-white">
    <div class="col-md-4 offset-md-4">
        <h3 class="mb-0">Hubungi Kami</h3>
        <p class="mb-0">Jika Anda memiliki pertanyaan atau saran jangan ragu untuk menghubungi kami</p>
    </div>
    </div>
    <!-- <p>Punya ide keren untuk iklan anda? Kami di sini untuk membantu Anda mempermudah pengembangan iklan Anda</p> -->
</div>
</section>
<section class="space-m">
<div class="container">

    <div class="row">
      <div class="col-md-6 mb-4 md-md-0">
      <div class="card card-body shadow">
        <form action="{{ route('contact.send') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="nama">Nama<span class="text-danger ms-1">*</span></label>
                <input type="text" class="form-control" id="nama" name="nama" value="" required>
                <span class="text-danger "></span>
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email<span class="text-danger ms-1">*</span></label>
                <input type="email" class="form-control " id="email" name="email" value="" required>
                <span class="text-danger "></span>
            </div>
            <div class="mb-3">
                <label class="form-label" for="message">Pesan<span class="text-danger ms-1">*</span></label>
                <textarea name="pesan" class="form-control" id="message" rows="5" required></textarea>
                <span class="text-danger "></span>
            </div>
            <div class="mb-3">
            {!! htmlFormSnippet() !!}
            </div>
            <button type="submit" class="btn btn-primary">Submit Message</button>
        </form>
      </div>
      </div>
      <div class="col-md-6 align-self-center">
          <!-- <img src="https://dummyimage.com/1349x400" alt="" width="100%" class="mb-3"> -->
      <ul class="list-group list-group-flush">
  <li class="list-group-item">
      <div class="media">
      <div class="btn-icon bg-primary text-center me-3">
          <i class="text-white bi bi-envelope-fill "></i>
          </div>
          <div class="media-body">
              <p class="mb-0 title-2 fw-semibold text-primary">Alamat Email</p>
              <a href="mailto:enquiry@mapkreatif.com" class="text-secondary no-dec">enquiry@mapkreatif.com</a>
            </div>
        </div>
  </li>
  <li class="list-group-item">
      <div class="media">
        <div class="btn-icon bg-primary text-center me-3">
            <i class="text-white bi bi-telephone-fill "></i>
        </div>
          <div class="media-body">
              <p class="mb-0 title-2 fw-semibold text-primary">Nomor Telepon</p>
              <a href="tel:+6281288874567" class="text-secondary no-dec">0812 8887 4567</a>
            </div>
        </div>
  </li>
  <li class="list-group-item">
      <div class="media">
        <div class="btn-icon bg-primary text-center me-3">
            <i class="text-white bi bi-whatsapp "></i>
        </div>
          <div class="media-body">
              <p class="mb-0 title-2 fw-semibold text-primary">Whatsapp</p>
              <a href="https://api.whatsapp.com/send?phone=6281288874567&text=Halo%20saya%2C%20ingin%20menanyakan%20lebih%20lanjut%20tentang%20beriklan" target="_blank" class="text-secondary no-dec">0812 8887 4567</a>
            </div>
        </div>
  </li>
  <li class="list-group-item">
      <div class="media">
      <div class="btn-icon bg-primary text-center me-3">
          <i class="text-white bi bi-briefcase-fill "></i>
          </div>
          <div class="media-body">
              <p class="mb-0 title-2 fw-semibold text-primary">Kantor Pusat</p>
              <p class="mb-0 text-secondary">Jl. Cimahi Cibaraja RT. 01 RW. 01 No. 01 Desa Selajambe Kecamatan Cisaat Kabupaten Sukabumi, 43152</p>
            </div>
        </div>
  </li>
  <li class="list-group-item">
      <div class="media">
      <div class="btn-icon bg-primary text-center me-3">
          <i class="text-white bi bi-gear-fill "></i>
          </div>
          <div class="media-body">
              <p class="mb-0 title-2 fw-semibold text-primary">Workshop</p>
              <p class="mb-0 text-secondary">Workshop. Kp. Cimahi RT. 29 RW. 06 01 Desa Cibolangkaler Kecamatan Cisaat Kabupaten Sukabumi, 43152</p>
            </div>
        </div>
  </li>
  
</ul>

       </div>
            
        
      </div>
    </div>
</section>
</div>
@endsection
@section('css')
<style>
.g-recaptcha > div {
    width: 100% !important;
}

/* .g-recaptcha iframe {
    width: 100% !important;
}

.rc-anchor-normal {
    width: 100% !important;
} */
</style>
@endsection
@section('js')
<script src="https://www.google.com/recaptcha/api.js"></script>
<script>
    window.onload = function() {
    var $recaptcha = document.querySelector('#g-recaptcha-response');

    if($recaptcha) {
        $recaptcha.setAttribute("required", "required");
    }
};
</script>
@endsection