<x-app-layout>
<x-slot name="header">
            {{ __('Dashboard') }}
    </x-slot>

	<div class="card-deck">
  <div class="card shadow-sm bg-primary text-white">
    <div class="card-body">
      <h5 class="card-title title-2">Total Reklame</h5>
      <h1 class="m-0">{{ counTing($reklame) }}</h1>
    </div>
    <div class="card-footer bg-transparent border-top">
      <small class="badge py-2 bg-white rounded-pill text-primary">Counting System</small>
    </div>
  </div>
  <div class="card shadow-sm bg-primary text-white">
    <div class="card-body">
      <h5 class="card-title title-2">Reklame Tersedia</h5>
      <h1 class="m-0">{{ counTing($reklame - $order) }}</h1>
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

<section class="py-3">
  <div class="container">
    <div class="alert bg-primary text-white">
      <div class="row">
        <div class="col-md-4 d-flex">
          <div class="media">
            <i class="bi-calendar2-fill me-2"></i>
            <div class="media-body align-self-center">
              <h6 class="title-2 mb-0 fw-normal">{{ date('d M Y') }}</h6>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex border-start border-white">
          <div class="media">
            <i class="bi-clock-fill me-2"></i>
            <div class="media-body align-self-center">
              <h6 class="title-2 mb-0 fw-normal" id="jam"></h6>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex border-start border-white">
          <div class="media">
            <i class="bi-geo-alt-fill me-2"></i>
            <div class="media-body align-self-center">
              <h6 class="title-2 mb-0 fw-normal">Indonesia</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="card h-100 shadow-sm">
          <div class="card-header d-flex justify-content-between">
            <div class="title-2 fw-semibold">
                <i class="bi-circle-fill text-primary me-2"></i>Last Inbox Contact
            </div>
            <div>
              <a href="{{ route('contact.index') }}">
                Contact Lainnya
              </a>
            </div>
          </div>
          <div class="card-body">

          <ul class="list-group list-group-flush">
            @foreach($contact->take(4)->reverse() as $cont)
              <li class="list-group-item">
                <div class="media">
                  <div class="media-body">
                    <p class="title-2 mb-0 text-capitalize">{{ $cont->nama }}</p>
                    <small class="text-secondary">
                      <i class="bi-clock me-2"></i>{{ $cont->created_at->format('d M Y') }}
                    </small>
                  </div>
                  <a href="javascript:void(0)" class="btn btn-primary btn-sm rounded align-self-center px-4" data-bs-toggle="modal" data-bs-target="#conta-{{ $cont->id }}">Message</a>
                </div>

                <!-- Modal -->
<div class="modal fade" id="conta-{{ $cont->id }}" tabindex="-1" aria-labelledby="conta-{{ $cont->id }}Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title mb-0 text-capitalize" id="conta-{{ $cont->id }}Label">{{ $cont->nama }}</h5>
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

              </li>
              @endforeach
          </ul>

          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card h-100 shadow-sm">
          <div class="card-header d-flex justify-content-between">
            <div class="title-2 fw-semibold">
                <i class="bi-circle-fill text-primary me-2"></i>Order In Progress
            </div>
            <div>
              <a href="{{ route('order.index') }}">
                Order Lainnya
              </a>
            </div>
          </div>
          <div class="card-body">

          <ul class="list-group list-group-flush">
            @foreach($ord->take(4)->reverse() as $or)
              <li class="list-group-item">
                <div class="media">
                  <i class="bi-layers-fill h2 me-3 text-secondary"></i>
                  <div class="media-body">
                  <p class="title-2 mb-0 text-capitalize">{{ $or->reklame->judul }}</p>
                    <small class="text-secondary">
                      <i class="bi bi-clock me-2"></i>{{ $or->start_date }}
                    </small>
                    <i class="bi-x"></i>
                    <small class="text-secondary">
                      {{ $or->end_date }}
                    </small>
                  </div>
                  <a href="javascript:void(0)" class="btn btn-primary btn-sm rounded align-self-center px-4" data-bs-toggle="modal" data-bs-target="#ord-{{ $or->id }}">Detail Order</a>
                </div>
              </li>

              <div class="modal fade" id="ord-{{ $or->id }}" tabindex="-1" aria-labelledby="ord-{{ $or->id }}Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title mb-0 text-capitalize" id="ord-{{ $or->id }}Label">{{ $or->reklame->judul }}</h5>
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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close Message</button>
      </div>
    </div>
  </div>
</div>

              

              @endforeach
          </ul>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
</x-app-layout>