<x-app-layout>
<x-slot name="header">
            {{ __('Order') }}
    </x-slot>
    <div class="card shadow">
        <div class="card-body">
        <table class="table" id="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul</th>
      <th scope="col">Status</th>
      <th scope="col">Start Date</th>
      <th scope="col">End Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php
    $no = 1;
    @endphp
    @foreach($order->reverse() as $or)
    <tr>
      <td>{{ counTing($no++) }}</td>
      <td class="text-capitalize">{{ $or->reklame->judul }}</td>
      <td>
        @if($or->status == 'yes')
        <div class="badge py-2 w-100 alert-primary rounded-pill">
          Progress
        </div>
        @else
        <div class="badge py-2 w-100 alert-secondary rounded-pill">
          Finish
        </div>
        @endif
      </td>
      <td>
        {{ $or->start_date }}
        </td>
      <td>
        {{ $or->end_date }}
        </td>
        <td>
          <a href="javascript:void(0)" class="btn btn-primary btn-sm rounded w-100" data-bs-toggle="modal" data-bs-target="#modal-{{ $or->id }}">Detail</a>


          <!-- Modal -->
<div class="modal fade" id="modal-{{ $or->id }}" tabindex="-1" aria-labelledby="modal-{{ $or->id }}Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-{{ $or->id }}Label">Detail Order</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <table class="table">
            <tbody>
              <tr class="row">
                <td class="col-4 title-2">Nama Pelanggan</td>
                <td class="col-1">:</td>
                <td class="col text-capitalize">{{ $or->nama }}</td>
              </tr>
              <tr class="row">
                <td class="col-4 title-2">Email</td>
                <td class="col-1">:</td>
                <td class="col">
                  @if($or->email)
                  {{ $or->email }}
                  @else
                  -
                  @endif
                </td>
              </tr>
              <tr class="row">
                <td class="col-4 title-2">No Telepon</td>
                <td class="col-1">:</td>
                <td class="col">
                @if($or->phone)
                  +62{{ $or->phone }}
                  @else
                  -
                  @endif
                </td>
              </tr>
              <tr class="row">
                <td class="col-4 title-2">Start Date</td>
                <td class="col-1">:</td>
                <td class="col">{{ $or->start_date }}</td>
              </tr>
              <tr class="row">
                <td class="col-4 title-2">End Date</td>
                <td class="col-1">:</td>
                <td class="col">{{ $or->end_date }}</td>
              </tr>
              <tr class="row border-transparent">
                <td class="col-4 title-2">Status</td>
                <td class="col-1">:</td>
                <td class="col">
                  {{ ($or->status == 'yes') ? 'Progress' : 'Finish' }}
                </td>
              </tr>
            </tbody>
          </table>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
@endsection
@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>
<script>
    $('#table').DataTable();
</script>
@endsection
</x-app-layout>