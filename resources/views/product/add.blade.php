@extends('app')

@section('content')
  <div class="justify-content-center d-flex mt-4" style="width: 100%">
    <div class="card p-3">
      <form action="{{ url('/product') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <table style="width: 600px">
          <tbody>
            <tr>
              <td><label for="exampleInputEmail1" class="form-label">Nama Produk</label></td>
              <td><input type="text" class="form-control @error('product_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="product_name"></td>
            </tr>
            <tr>
              <td></td>
              <td>
                  <div id="emailHelp" class="form-text">Nama produk tidak boleh lebih dari 255</div>
                  @error('product_name')
                  <div class="invalid-feedback">
                    Nama tidak boleh kosong
                  </div>
                  @enderror
                </div>
              </td>
            </tr>
            <tr>
              <td><label for="exampleInputEmail1" class="form-label">Deskripsi</label></td>
              <td><input type="text" class="form-control @error('product_description') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="product_description"></td>
            </tr>
            <tr>
              <td></td>
              <td>@error('product_description')
                  <div class="invalid-feedback">
                    Description tidak boleh kosong
                  </div>
                  @enderror
                </div>
              </td>
            </tr>
            <tr>
              <td><label for="exampleInputEmail1" class="form-label">Harga</label></td>
              <td><input type="text" class="form-control @error('product_price') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="product_price"></td>
            </tr>
            <tr>
              <td></td>
              <td>@error('product_price')
                  <div class="invalid-feedback">
                    Harga tidak boleh kosong
                  </div>
                  @enderror
              </td>
            </tr>
            <tr>
              <td></td>
              <td><select class="form-select mt-3 @error('category_id') is-invalid @enderror" aria-label="Default select example" name="category_id">
                  <option selected>Pilih Kategori</option>
                  @foreach ($categories as $item)
                      <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                  @endforeach
                </select>
              </td>
            </tr>
            <tr>
              <td></td>
              <td>@error('category_id')
                  <div class="invalid-feedback">
                    Pilih salah satu kategori
                  </div>
                  @enderror
              </td>
            </tr>
            <tr>
              <td>
                <label for="image" class="form-label">Tambahkan Gambar</label>
              </td>
              <td>
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
                  <div id="avatarHelp" class="form-text">{{ $message }}</div>
                @enderror
              </td>
            </tr>
          </tbody>
        </table>
        <button type="submit" class="btn btn-primary mt-3">Ubah</button>
      </form>
    </div>
    </div>
@endsection