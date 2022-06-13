<x-app-layout>
<x-slot name="header">
            {{ __('Reklame') }}
    </x-slot>

    <div class="card-deck mb-3">
  <div class="card shadow-sm bg-primary text-white">
    <div class="card-body">
      <h5 class="card-title title-2">Total Reklame</h5>
      <h1 class="m-0">{{ counTing(count($reklame)) }}</h1>
    </div>
    <div class="card-footer bg-transparent border-top">
      <small class="badge py-2 bg-white rounded-pill text-primary">Counting System</small>
    </div>
  </div>
  <div class="card shadow-sm bg-primary text-white">
    <div class="card-body">
      <h5 class="card-title title-2">Reklame Tersedia</h5>
      <h1 class="m-0">{{ counTing(count($reklame) - $order) }}</h1>
    </div>
    <div class="card-footer bg-transparent border-top">
      <small class="badge py-2 bg-white rounded-pill text-primary">Counting System</small>
    </div>
  </div>
  <div class="card shadow-sm bg-primary text-white">
    <div class="card-body">
      <h5 class="card-title title-2">Order In Progress</h5>
      <h1 class="m-0">{{ counTing($order) }}</h1>
    </div>
    <div class="card-footer bg-transparent border-top">
      <small class="badge py-2 bg-white rounded-pill text-primary">Counting System</small>
    </div>
  </div>
</div>

    <div class="card shadow">
        <div class="card-body">
        <table class="table" id="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Judul</th>
      <th scope="col">Status</th>
      <th scope="col">End Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php
    $no = 1;
    @endphp
    @foreach($reklame->reverse() as $rek)
    @php
    $order = \App\Models\Order::where('reklame_id', $rek->id)->where('status','yes')->first();
    @endphp
    <tr>
      <td>{{ counTing($no++) }}</td>
      <td class="text-capitalize">{{ $rek->judul }}</td>
      <td>
        @if($order)
        <div class="badge py-2 w-100 alert-secondary rounded-pill">
          Not Available
        </div>
        @else
        <div class="badge py-2 w-100 alert-primary rounded-pill">
          Available
        </div>
        @endif
      </td>
      <td>
        @if($order)
        {{ $order->end_date }}
        @else
        -
        @endif
        </td>
        <td>
          <div class="d-flex">
            <a href="javascript:void(0)" class="btn btn-primary btn-sm rounded flex-fill me-3" data-bs-toggle="modal" data-bs-target="#modal-{{ $rek->id }}">
            @if($order)
            Details
            @else
            Order
            @endif
            </a>
            <a href="{{ route('reklame.edit', ['id' => $rek -> id]) }}" class="btn btn-outline-primary btn-sm rounded flex-fill">Edit</a>
          </div>

          <!-- Modal -->
<div class="modal fade" id="modal-{{ $rek->id }}" tabindex="-1" aria-labelledby="modal-{{ $rek->id }}Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-{{ $rek->id }}Label">
          @if($order)
          Detail Order
          @else
          Order Reklame
          @endif
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      @if($order)
      <form action="{{ route('order.update',['id' => $order -> id]) }}" method="POST">
        @else
        <form action="{{ route('order.store') }}" method="POST">
      @endif
      <div class="modal-body">
          @csrf
          @if($order)
          <table class="table">
            <tbody>
              <tr class="row">
                <td class="col-4 title-2">Nama Pelanggan</td>
                <td class="col-1">:</td>
                <td class="col text-capitalize">{{ $order->nama }}</td>
              </tr>
              <tr class="row">
                <td class="col-4 title-2">Email</td>
                <td class="col-1">:</td>
                <td class="col">
                  @if($order->email)
                  {{ $order->email }}
                  @else
                  -
                  @endif
                </td>
              </tr>
              <tr class="row">
                <td class="col-4 title-2">No Telepon</td>
                <td class="col-1">:</td>
                <td class="col">
                @if($order->phone)
                  +62{{ $order->phone }}
                  @else
                  -
                  @endif
                </td>
              </tr>
              <tr class="row">
                <td class="col-4 title-2">Start Date</td>
                <td class="col-1">:</td>
                <td class="col">{{ $order->start_date }}</td>
              </tr>
              <tr class="row">
                <td class="col-4 title-2">End Date</td>
                <td class="col-1">:</td>
                <td class="col">{{ $order->end_date }}</td>
              </tr>
              <tr class="row border-transparent">
                <td class="col-4 title-2">Status</td>
                <td class="col-1">:</td>
                <td class="col">
                  <input type="hidden" name="id" value="{{ $order->id }}">
                  <select name="status" class="form-select form-select-sm rounded">
                    <option value="yes" selected>Progress</option>
                    <option value="no">Finish</option>
                  </select>
                </td>
              </tr>
            </tbody>
          </table>
          
          @else
          <input type="hidden" name="reklame_id" value="{{ $rek->id }}">
          <div class="row">
          <div class="mb-3 col">
            <label for="" class="form-label">Nama Pelanggan<span class="text-danger ms-1">*</span></label>
            <input type="text" class="form-control" name="nama"  required>
          </div>
          <div class="mb-3 col">
            <label for="" class="form-label">Alamat Email<span class="text-secondary fw-normal ms-1">(Optional)</span></label>
            <input type="email" class="form-control" name="email" >
          </div>
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Nomor Telepon<span class="text-secondary fw-normal ms-1">(Optional)</span></label>
            <div class="input-group">
              <span class="input-group-text">+62</span>
        <input type="text" class="form-control num" name="phone" >
    </div>
          </div>

          <div class="row">
          <div class="mb-3 col">
            <label for="" class="form-label">Start Date<span class="text-danger ms-1">*</span></label>
            <input type="date" class="form-control" name="start_date"  required>
          </div>
          <div class="mb-3 col">
            <label for="" class="form-label">End Date<span class="text-danger ms-1">*</span></label>
            <input type="date" class="form-control" name="end_date"  required>
          </div>
          </div>
          
          
          <div class="mb-3">
            <label class="form-label">Biaya Reklame<span class="text-secondary fw-normal ms-1">(Optional)</span></label>
            <div class="input-group">
              <span class="input-group-text">Rp</span>
              <input class="form-control price" name="biaya">
            </div>
          </div>
          @endif

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">
            @if($order)
            Update Order
            @else
            Insert Order
            @endif
          </button>
        </div>
      </form>
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
<script src="https://unpkg.com/imask"></script>
<script>
    $('#table').DataTable();

    var price = document.getElementsByClassName('price');
        Array.prototype.forEach.call(price, function(element) {
          var noop = new IMask(element, {
            mask: Number,
            thousandsSeparator: '.'
        });
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

</script>
@endsection
</x-app-layout>