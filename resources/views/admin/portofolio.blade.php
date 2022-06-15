<x-app-layout>
<x-slot name="header">
            {{ __('Portofolio') }}
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
      <th scope="col">Judul</th>
      <th scope="col">Images</th>
      <th scope="col">Date Post</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($portofolio->reverse() as $port)
    <tr>
      <td>{{ counTing($no++) }}</td>
      <td class="text-capitalize">{{ $port->judul }}</td>
      <td>
        <a href="javascript:void(0)"  data-fancybox="foto" data-src="{{ url('/' . $port->foto) }}" data-caption="Foto Portofolio"> <i class="bi-eye"></i> Image</a>
      </td>
      <td>{{ $port->created_at->format('d M Y') }}</td>
      <td>
        <a href="{{ route('portofolio.edit',['id' => $port -> id]) }}" class="btn btn-sm btn-primary rounded w-100">
          Edit
        </a>
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