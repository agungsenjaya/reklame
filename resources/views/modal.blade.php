<!-- Modal Loading -->
<div class="modal" id="modLoading" tabindex="-1" aria-labelledby="modLoadingLabel" aria-hidden="true">
  <div class="modal-dialog ms-auto m-0 text-end p-3">
    <div class="d-flex justify-content-end text-white">
      <div class="me-2 title-2 text-uppercase">
        Loading
      </div>
      <div>
        <div class="spinner-border text-success m-0" role="status" style="width: 1.5rem;height:1.5rem">
          <span class="visually-hidden">Loading...</span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal  Status -->
@if(Session::has('success') || Session::has('failed'))
<div class="modal fade" id="modStatus" tabindex="-1" aria-labelledby="modStatusLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content border-0 rounded">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      @if(Session::has('success'))
      <div class="modal-body text-center">
        <i class="bi-check-circle-fill display-5 text-success"></i>
        <h4 class="mt-3 mb-0">Success Notification</h4>
        <p class="text-secondary">Data berhasil dimasukan kedalam database</p>
      </div>
      @else if(Session::has('failed'))
      <div class="modal-body text-center">
        <i class="bi-x-circle-fill display-5 text-danger"></i>
        <h4 class="mt-3 mb-0">Failed Notification</h4>
        <p class="text-secondary">Data telah gagal dimasukan kedalam database</p>
      </div>
      @endif
    </div>
  </div>
</div>
@endif

@if(Session::has('send') || Session::has('notsend'))
<div class="modal fade" id="modStatus" tabindex="-1" aria-labelledby="modStatusLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content border-0 rounded">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      @if(Session::has('send'))
      <div class="modal-body text-center">
        <i class="bi-check-circle-fill display-5 text-success"></i>
        <h4 class="mt-3 mb-0">Email Terkirim</h4>
        <p class="text-secondary">Balasan akan dikirim ke email anda, Terima kasih.</p>
      </div>
      @else if(Session::has('notsend'))
      <div class="modal-body text-center">
        <i class="bi-x-circle-fill display-5 text-danger"></i>
        <h4 class="mt-3 mb-0">Email Gagal</h4>
        <p class="text-secondary">Mohon maaf email anda tidak terkirim.</p>
      </div>
      @endif
    </div>
  </div>
</div>
@endif