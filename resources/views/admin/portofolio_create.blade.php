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
                            <!-- <textarea id="summer" name="content" required></textarea> -->
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
<link rel="stylesheet" href="{{ asset('csss/editor.css') }}">
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.19.0/ckeditor.js" integrity="sha512-tjxUra6WjSA8H5+nC7G61SVqEXj1e958LdR4N8BGZeRx9tObm/YhsrUzY6tH4EuHQyZqOyu317pgV7f8YPFoAQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.3/tinymce.min.js" integrity="sha512-DB4Mu+YChAdaLiuKCybPULuNSoFBZ2flD9vURt7PgU/7pUDnwgZEO+M89GjBLvK9v/NaixpswQtQRPSMRQwYIA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
<script>

ClassicEditor
.create( document.querySelector( '#summer' ) )
.catch( error => {
console.error( error );
} );

    // tinymce.init({
    //         selector: 'textarea#summer',
    //         height: 400,
    //         menubar: false,
    //         plugins: [
    //             'advlist autolink lists link image charmap print preview anchor',
    //             'searchreplace visualblocks code fullscreen',
    //             'insertdatetime media table paste code help wordcount', 'image'
    //         ],
    //         automatic_uploads: true,
    //         toolbar: 'undo redo | link image | formatselect | ' +
    //             'bold italic backcolor | alignleft aligncenter ' +
    //             'alignright alignjustify | bullist numlist outdent indent | ' +
    //             'removeformat | help',
    //         content_css: '//www.tiny.cloud/css/codepen.min.css',
    //     });

        // tinymce.activeEditor.uploadImages(function(success) {
        //   $.post('https://localhost:8000/api/foto_portofolio', tinymce.activeEditor.getContent()).done(function() {
        //     console.log("Uploaded images and posted content as an ajax request.");
        //   });
        // });

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