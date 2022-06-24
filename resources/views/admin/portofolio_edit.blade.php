<x-app-layout>
<x-slot name="header">
            {{ __('Edit Portofolio') }}
    </x-slot>
    <div class="card shadow-sm mb-4">
    <div class="d-flex justify-content-end card-header">
            <nav aria-label="breadcrumb" class="d-flex justify-content-end">
    <ol class="breadcrumb mb-0">
      <li class="breadcrumb-item"><a href="{{ route('portofolio.index') }}">Portofolio</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Portofolio</li>
    </ol>
  </nav>
            </div>
            <div class="card-body">
                        <form id="ajax-form" action="{{ route('portofolio.update',['id' => $data-> id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                        <div class="mb-3 col">
                                <label class="form-label">Judul Portofolio<span class="text-danger ms-1">*</span></label>
                                <input type="text" class="form-control" name="judul" required value="{{ $data->judul }}">
                        </div>
                        <div class="mb-3 col">
                                <label class="form-label">Foto Portofolio<span class="text-secondary fw-normal ms-1">(Optional)</span></label>
                                <input type="file" class="form-control" name="foto">
                        </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Deskripsi<span class="text-danger ms-1">*</span></label>
                            <textarea id="summer" name="content" required>
                                {!! $data->content !!}
                            </textarea>
                        </div>
                        <div>
                                <button type="submit" class="btn btn-primary">Update Portofolio</button>
                                <a class="ms-2 btn btn-outline-primary" href="{{ route('portofolio.delete',['id' => $data -> id]) }}">Hapus</a>
                        </div>
                    </form>
            </div>
</div>
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.19.0/ckeditor.js" integrity="sha512-tjxUra6WjSA8H5+nC7G61SVqEXj1e958LdR4N8BGZeRx9tObm/YhsrUzY6tH4EuHQyZqOyu317pgV7f8YPFoAQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // $('#summer').summernote({
    //     tabsize: 2,
    //     height: 300,
    //     toolbar: [
    //       ['style', ['bold', 'italic', 'underline', 'clear']],
    //       ['font', ['strikethrough', 'superscript', 'subscript']],
    //       ['color', ['color']],
    //       ['para', ['ul', 'ol', 'paragraph']],
    //       ['table', ['table']],
    //       ['insert', ['link', 'picture', 'video']],
    //       ['view', ['fullscreen', 'codeview', 'help']]
    //     ],
    //     callbacks: {
    //       onPaste: function (e) {
    //             var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
    //             e.preventDefault();
    //             document.execCommand('insertText', false, bufferText);
    //         }
    //       }
    //   });

    CKEDITOR.replace('summer', {
        filebrowserUploadUrl: "{{ route('portofolio.upload', ['_token' => csrf_token() ]) }}",
        filebrowserUploadMethod: 'form',
        height: 500
    });

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