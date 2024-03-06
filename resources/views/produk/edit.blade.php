@extends('template')
@section('contact')
@section('title','Edit Produk')

<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-body">
         <h4>Edit Produk</h4>
              <div class="modal-body">
                <form action="{{ Route('update', $produk->produk_id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row g-3 align-items-center mb-3">
                  <div class="col-auto">
                    <label  class="col-form-label">Kode Produk</label>
                  </div>
                  <div class="col-auto">
                    <input type="text" name="kode_produk" value="{{ $produk->kode_produk }}" class="form-control" aria-describedby="Kode ProdukHelpInline" placeholder="Masukkan Kode">
                  </div>
                </div>
                <div class="row g-3 align-items-center mb-3" >
                  <div class="col-auto">
                    <label  class="col-form-label">Nama Produk</label>
                  </div>
                  <div class="col-auto">
                    <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" class="form-control" aria-describedby="Kode ProdukHelpInline" placeholder="Masukkan Nama/Merk">
                  </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                  <div class="col-auto">
                    <label  class="col-form-label">Stok Produk</label>
                  </div>
                  <div class="col-auto">
                    <input type="number" name="stok" value="{{ $produk->stok }}" class="form-control" aria-describedby="Kode ProdukHelpInline" placeholder="Masukkan Jumlah">
                  </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                  <div class="col-auto">
                    <label  class="col-form-label">Harga Produk</label>
                  </div>
                  <div class="col-auto">
                    <input type="number" name="harga" value="{{ $produk->harga }}" class="form-control" aria-describedby="Kode ProdukHelpInline" placeholder="Masukkan Harga">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
