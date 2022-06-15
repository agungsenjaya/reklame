<x-app-layout>
<x-slot name="header">
            {{ __('Tambah Portofolio') }}
    </x-slot>
    <div class="card shadow-sm mb-4">
    <div class="d-flex justify-content-end card-header">
            <nav aria-label="breadcrumb" class="d-flex justify-content-end">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ route('portofolio.index') }}">Portofolio</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tambah Portofolio</li>
    </ol>
  </nav>
            </div>
            <div class="card-body">
                        <form id="ajax-form" action="{{ route('portofolio.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                        <div class="mb-3 col">
                                <label class="form-label">Judul Portofolio<span class="text-danger ms-1">*</span></label>
                                <input type="text" class="form-control" name="judul" required>
                        </div>
                        <div class="mb-3 col">
                                <label class="form-label">Foto Portofolio<span class="text-danger ms-1">*</span></label>
                                <input type="file" class="form-control" name="foto" required>
                        </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Deskripsi<span class="text-danger ms-1">*</span></label>
                            <textarea id="summer" name="content" required></textarea>
                        </div>
                        <div>
                                <button type="submit" class="btn btn-primary">Insert Portofolio</button>
                        </div>
                    </form>
            </div>
</div>
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
    $('#summer').summernote({
        tabsize: 2,
        height: 300,
        toolbar: [
          ['style', ['bold', 'italic', 'underline', 'clear']],
          ['font', ['strikethrough', 'superscript', 'subscript']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
</script>
@endsection
    </x-app-layout>