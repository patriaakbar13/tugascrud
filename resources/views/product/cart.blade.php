@extends('app')

@section('content')
   <div class="d-flex flex-column-fluid">
    <div class="container">
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-tittle">
                    <span class="card-icon">
                        <i class="flaticon2-supermarket text-primary"></i>
                    </span>
                    <h3 class="card-label">Pesanan</h3>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Pilih menu</button>
                </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        {{-- begin: datable --}}
                        <div class="table-responsive text-nowrap" style="width: 710px;">
                            <table class="table table-bordered table-hover table-checkable table-responsive" id="data_order" style="margin-top: 13px !important, margin-right: 13px;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Product</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $item)
                                    <tr>
                                        <th>{{ $item->id }}</th>
                                        <th>{{ $item->product->name }}</th>
                                        <th>{{ $item->product->price }}</th>
                                        <th>{{ $item->qty }}</th>
                                        <th><a type="button" class="btn btn-danger" href="/cart/delete/{{ $item->id }}">Hapus</a></th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
   </div>

   <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          @foreach ($products as $product)
        <div class="row fs-5 text-center">
            <div class="mt-3 col p-4">
                <div class="card m-0">
                    <div class="card-body">
                        <div class="card-title">
                            {{ $product->name }} ( Rp {{ $product->price }} )
                        </div>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $product->category->name }}</h6>
                        <div class="class">{{ $product->description }}</div>
                        <form action="/cart/add/{{ $product->id }}">
                            <input type="number" name="qty">
                            <button class="btn btn-warning mt-3" type="submit"  name="id">Pilih</button>
                        </form>
                  </div>
                </div>
            </div>
        </div>
        @endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>     
        
@endsection