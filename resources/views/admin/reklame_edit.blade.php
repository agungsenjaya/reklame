<x-app-layout>
@php
$ukuran = json_decode($data->ukuran);
$alamat = json_decode($data->alamat);
$foto = json_decode($data->foto);

$arah = ['utara','timur laut','timur','tenggara','selatan','barat daya','barat','barat laut'];
@endphp
    <x-slot name="header">
            {{ __('Edit Reklame') }}
    </x-slot>

    <livewire:connection/>
    <form id="ajax-form" action="{{ route('reklame.update',['id' => $data -> id]) }}" method="POST" enctype="multipart/form-data">
      @csrf

      <input type="hidden" name="id" value="{{ $data->id }}">

    <div class="card shadow-sm mb-4">
    <div class="card-header">
<div class="d-flex justify-content-between">
  <div>
  Foto Reklame
  </div>
  <nav aria-label="breadcrumb" class="d-flex justify-content-end">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ route('reklame.index') }}">Reklame</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Reklame</li>
    </ol>
  </nav>
</div>

</div>
            <div class="card-body">
              <!-- <input id="images" class="form-control d-none" type="file" name="foto[]" accept="image/*" placeholder="Choose images" multiple> -->

              <!-- <a href="javascript:void(0)" class="a3 card col-1 border-2 text-center border-primary">
      <div class="">
        <i class="bi bi-plus h1 "></i>
      </div>
    </a>
    <a href="javascript:void(0)" class="a4 d-none card col-1 border-2 text-center border-primary">
      <div class="">
        <i class="bi bi-x h1 "></i>
      </div>
    </a> -->


    <div class="preview-image row">
    @foreach($foto as $fo)
    @php
    $path = storage_path();
    $img = str_replace('\storage','\public', $path) . $fo->url;
    @endphp
      <div class="col-md-2 my-3">
        <a href="javasccript:void(0)" data-fancybox="foto" data-src="{{ asset($fo->url) }}" data-caption="Foto Reklame"> 
          <img src="{{ asset($fo->url) }}" alt="" width="100%">
        </a>
        </div>
      @endforeach
    </div>

            </div>
      </div>
    <div class="card shadow-sm mb-4">
      <div class="card-header">
        Formulir Reklame
    </div>
        <div class="card-body">
  <div class="row">
  <div class="mb-3 col">
    <label class="form-label">Judul Reklame<span class="text-danger ms-1">*</span></label>
    <input type="text" class="form-control" name="judul" required value="{{ $data->judul }}">
  </div>
  <div class="mb-3 col">
    <div class="row">
      <div class="col">
      <label class="form-label">Panjang Reklame<span class="text-danger ms-1">*</span></label>
      <div class="input-group">
        <input class="form-control num" name="panjang" value="{{ $ukuran->panjang }}" required>
        <span class="input-group-text">Pixel</span>
    </div>
    </div>
    <div class="col">
      <label class="form-label">Tinggi Reklame<span class="text-danger ms-1">*</span></label>
      <div class="input-group">
        <input class="form-control num" name="tinggi" value="{{ $ukuran->tinggi }}" required>
        <span class="input-group-text">Pixel</span>
    </div>
  </div>
  </div>
  </div>
  </div>

  <!-- <div class="mb-3">
    <label class="form-label">Biaya Reklame<span class="text-danger ms-1">*</span></label>
    <div class="input-group">
      <span class="input-group-text">Rp</span>
        <input class="form-control" name="biaya" id="price" value="{{ str_replace('.','',$data->biaya) }}" required>
    </div>
  </div> -->

  <div class="row">
  <div class="mb-3 col">
    <label class="form-label">Tipe Reklame<span class="text-danger ms-1">*</span></label>
    <select   class="form-select"  name="tipe" required>
      <option value="">Choose Option</option>
      <option value="portrait"{{ ($data->tipe == 'portrait') ? 'selected' : '' }}>portrait</option>
      <option value="landscape" {{ ($data->tipe == 'landscape') ? 'selected' : '' }}>landscape</option>
    </select>
  </div>
  <div class="mb-3 col">
    <label class="form-label">Arah Reklame<span class="text-danger ms-1">*</span></label>
    <select   class="form-select"  name="arah" required>
      <option value="">Choose Option</option>
      @foreach($arah as $ar)
      <option value="{{ $ar }}" {{ ($data->arah == $ar) ? 'selected' : '' }}>{{ $ar }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3 col">
    <label class="form-label">Kategori Reklame<span class="text-danger ms-1">*</span></label>
    <select   class="form-select"  name="kategori" required>
      <option value="">Choose Option</option>
      <option value="indoor" {{ ($data->kategori == 'indoor') ? 'selected' : '' }}>indoor</option>
      <option value="outdoor" {{ ($data->kategori == 'outdoor') ? 'selected' : '' }}>outdoor</option>
    </select>
  </div>
  </div>
  <div class="mb-3">
  <label class="form-label">Keterangan Reklame<span class="text-danger ms-1">*</span></label>
  <textarea class="form-control" rows="5" name="content" required>{{ $data->content }}</textarea>
  </div>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
    <div class="card-header">
      Lokasi Reklame
    </div>
      <div class="card-body">
        <div class="row">
          <div class="col">

          <div class="mb-3">
            <label class="form-label">Long Map<span class="text-danger ms-1">*</span></label>
            <input type="text" class="form-control" name="lng" value="{{ $alamat->lng }}" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Lat Map<span class="text-danger ms-1">*</span></label>
            <input type="text" class="form-control" name="lat" value="{{ $alamat->lat }}" required>
          </div>
          
          <div class="">
            <label class="form-label">Alamat<span class="text-secondary fw-normal ms-1">(Optional)</span></label>
            <textarea name="alamat" class="form-control" rows="5">
              @if($alamat->alamat)
              {{ $alamat->alamat }}
              @endif
            </textarea>
          </div>
            
          </div>
          <div class="col">

          <div id="map" class="rounded border"></div>
          <pre id="coordinates" class="coordinates"></pre>

          </div>
        </div>

      </div>
    </div>
    <button type="submit" class="btn-ajax btn btn-primary">Update Reklame</button>
    </form>
@section('css')
<link href="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.css" rel="stylesheet">
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
<style>
  #map { 
    /* position: absolute;  */
    top: 0; 
    bottom: 0; 
    height: 100%; 
    width: 100%; 
  }
  .coordinates {
background: rgba(0, 0, 0, 0.5);
color: #fff;
position: absolute;
bottom: 40px;
left: 10px;
padding: 5px 10px;
margin: 0;
font-size: 11px;
line-height: 18px;
border-radius: 3px;
display: none;
}
</style>
@endsection
@section('js')
<script src="https://api.mapbox.com/mapbox-gl-js/v2.8.2/mapbox-gl.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script src="https://unpkg.com/imask"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script>
  mapboxgl.accessToken = 'pk.eyJ1IjoiYWd1bmdzZW5qYXlhIiwiYSI6ImNqbGVnMjhtYTBpOXEza3F6NzI4M2RmbHAifQ.1WV_fgbmd1eMI4C444BDqQ';
const coordinates = document.getElementById('coordinates');
const map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/streets-v11',
center: [<?php echo $alamat->lng; ?> , <?php echo $alamat->lat; ?>],
zoom: 10,
});

map.addControl(
    new mapboxgl.GeolocateControl({
    positionOptions: {
    enableHighAccuracy: true
    },
    trackUserLocation: true,
    showUserHeading: true
    }),'top-left');

    map.addControl(
    new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
    // mapboxgl: mapboxgl
    }));

    map.addControl(new mapboxgl.NavigationControl());

    var marker = new mapboxgl.Marker()
    .setLngLat(map.getCenter())
    .addTo(map);

    map.on('move', function (e) {
    console.log(`Current Map Center: ${map.getCenter()}`);
    marker.setLngLat(map.getCenter());
    $('input[name="lng"]').val(map.getBounds().getCenter().lng);
    $('input[name="lat"]').val(map.getBounds().getCenter().lat);
    // $.ajax({
    //   type: "GET",
    //   url: `https://maps.googleapis.com/maps/api/geocode/json?latlng=${map.getBounds().getCenter().lat},${map.getBounds().getCenter().lng}key=AIzaSyAdfB-1tzijt8NQRVY6SLNft9_JwxWxu1s`,
    //   dataType: "JSON",
    //   success: function (data) {
    // $('textarea[name="alamat"]').val(data.results[0].formatted_address);
    //   }
    // });

    // https://maps.googleapis.com/maps/api/geocode/json?latlng=44.4647452,7.3553838&key=AIzaSyAdfB-1tzijt8NQRVY6SLNft9_JwxWxu1s
    // data.results[0].formatted_address

});
      $('.a3').on('click', function(){
        $('#images').trigger('click');
      });
      $(function() {
            var multiImgPreview = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML(`<div class="col-md-2 my-3"><a href="javasccript:void(0)" data-fancybox="foto" data-src="${event.target.result}" data-caption="Foto Reklame"> <img class="w-100" src="${event.target.result}"></a></div>`)).appendTo(imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('input[name="foto[]"]').on('change', function() {
              if (this) {
                $('.a3').addClass('d-none');
                $('.a4').removeClass('d-none');
              }
                multiImgPreview(this, 'div.preview-image');
            });
        });
        $('.a4').on('click', function () {
          $('#images').val('');
          $('.preview-image div').remove();
          $('.a3').removeClass('d-none');
          $('.a4').addClass('d-none');
        });

        var items = document.getElementsByClassName('num');
        Array.prototype.forEach.call(items, function(element) {
          var number = new IMask(element, {
            mask: Number,
            placeholder: {
              show: 'always'
            }
        });
        });

        // var price = IMask(
        // document.getElementById('price'),
        // {
        //   mask: Number,
        //   thousandsSeparator: '.'
        // });

        Fancybox.bind("[data-fancybox]", {
          // Your options go here
        });

        var gas = <?php print json_encode($foto) ?>;
        console.log(gas);

</script>
@endsection
</x-app-layout>