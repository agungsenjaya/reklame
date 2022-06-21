<x-app-layout>
<x-slot name="header">
            {{ __('Tambah Brand') }}
    </x-slot>
    <div class="card shadow-sm mb-4">
    <div class="d-flex justify-content-end card-header">
            <nav aria-label="breadcrumb" class="d-flex justify-content-end">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ route('brand.index') }}">Brand</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Brand</li>
    </ol>
  </nav>
            </div>
            <div class="card-body">
                        <form id="ajax-form" action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                        <div class="mb-3 col">
                                <label class="form-label">Judul Brand<span class="text-danger ms-1">*</span></label>
                                <input type="text" class="form-control" name="judul" required>
                        </div>
                        <div class="mb-3 col">
                                <label class="form-label">Foto Brand<span class="text-danger ms-1">*</span></label>
                                <input type="file" class="form-control" name="foto" required>
                        </div>
                        </div>
                        <div>
                                <button type="submit" class="btn btn-primary">Insert Brand</button>
                        </div>
                    </form>
            </div>
</div>
@section('js')
<script>
        const modLoading = new bootstrap.Modal('#modLoading', {
            keyboard: false,
            backdrop: 'static',
          });
        $("#ajax-form").submit(function(e){
          modLoading.show();
              return true;
          });
</script>
@endsection
    </x-app-layout>