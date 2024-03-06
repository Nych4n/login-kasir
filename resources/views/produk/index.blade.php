@extends('template')
@section('contact')
@section('title','Produk')

<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-body">
         <h4>Halaman Produk</h4>
         <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Tambah Produk
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{ Route('create') }}" method="post">
                  @csrf
                <div class="row g-3 align-items-center mb-3">
                  <div class="col-auto">
                    <label  class="col-form-label">Kode Produk</label>
                  </div>
                  <div class="col-auto">
                    <input type="text" name="kode_produk" class="form-control" aria-describedby="Kode ProdukHelpInline" placeholder="Masukkan Kode">
                  </div>
                </div>
                <div class="row g-3 align-items-center mb-3" >
                  <div class="col-auto">
                    <label  class="col-form-label">Nama Produk</label>
                  </div>
                  <div class="col-auto">
                    <input type="text" name="nama_produk" class="form-control" aria-describedby="Kode ProdukHelpInline" placeholder="Masukkan Nama/Merk">
                  </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                  <div class="col-auto">
                    <label  class="col-form-label">Stok Produk</label>
                  </div>
                  <div class="col-auto">
                    <input type="number" name="stok" class="form-control" aria-describedby="Kode ProdukHelpInline" placeholder="Masukkan Jumlah">
                  </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                  <div class="col-auto">
                    <label  class="col-form-label">Harga Produk</label>
                  </div>
                  <div class="col-auto">
                    <input type="number" name="harga" class="form-control" aria-describedby="Kode ProdukHelpInline" placeholder="Masukkan Harga">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>
              </div>
            </div>
          </div>
        </div>
         <table class="table ">
          <thead>
            <tr>
              <th>#</th>
              <th>Kode</th>
              <th>Nama</th>
              <th>Stok</th>
              <th>Harga</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; ?>
            @foreach ($produk as $item)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $item->kode_produk }}</td>
              <td>{{ $item->nama_produk }}</td>
              <td>{{ $item->stok }}</td>
              <td>{{ number_format($item->harga) }}</td>
              <td>
                <form action="{{ route('hapus',$item->produk_id) }}" method="post" onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus ??')">
                  <a href="{{ route('edit', $item->produk_id) }}" class="btn btn-warning"> Edit</a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
              </td>
            </tr>                
            @endforeach
          </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>
@endsection
