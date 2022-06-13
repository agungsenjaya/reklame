<x-app-layout>
<x-slot name="header">
            {{ __('Contact') }}
    </x-slot>
    @php
    $no = 1;
    @endphp
    <div class="card shadow">
        <div class="card-body">

        <table class="table" id="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($contact as $cont)
    <tr>
      <td>{{ counTing($no++) }}</td>
      <td class="text-capitalize">{{ $cont->nama }}</td>
      <td>{{ $cont->email }}</td>
      <td>{{ $cont->created_at }}</td>
      <td>
        <a href="javascript:void(0)" class="btn w-100 btn-primary btn-sm rounded align-self-center px-4" data-bs-toggle="modal" data-bs-target="#modal-{{ $cont->id }}">Message</a>
        <!-- Modal -->
<div class="modal fade" id="modal-{{ $cont->id }}" tabindex="-1" aria-labelledby="modal-{{ $cont->id }}Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title mb-0 text-capitalize" id="modal-{{ $cont->id }}Label">{{ $cont->nama }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>{{ $cont->pesan }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close Message</button>
      </div>
    </div>
  </div>
</div>
      </td>
    </tr>
    @endforeach
      </tbody>
      </table>

</div>
</div>
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
@endsection
@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script>
    $('#table').DataTable();
</script>
@endsection
</x-app-layout>