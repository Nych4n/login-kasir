@extends('template')
@section('contact')
@section('title','Pelanggan')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-body">
         <h4>Tabel Pelanggan</h4>
         <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Tambah Pelanggan
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Pelanggan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{ Route('tambah') }}" method="post">
                  @csrf
                <div class="row g-3 align-items-center mb-3">
                  <div class="col-auto">
                    <label  class="col-form-label">Nama </label>
                  </div>
                  <div class="col-auto">
                    <input type="text" name="nama_pel" class="form-control" aria-describedby="Kode ProdukHelpInline" placeholder="Masukkan Nama">
                  </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                  <div class="col-auto">
                    <label  class="col-form-label">Alamat</label>
                  </div>
                  <div class="col-auto">
                    <input type="text" name="alamat" class="form-control" aria-describedby="Kode ProdukHelpInline" placeholder="Masukkan Alamat">
                  </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                  <div class="col-auto">
                    <label  class="col-form-label">Telepon</label>
                  </div>
                  <div class="col-auto">
                    <input type="number" name="telp" class="form-control" aria-describedby="Kode ProdukHelpInline" placeholder="Masukkan telp">
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
              <th>Nama</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; ?>
            @foreach ($pelanggan as $item)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $item->nama_pel }}</td>
              <td>{{ $item->alamat }}</td>
              <td>{{ $item->telp }}</td>
              <td>
                <form action="{{ route('delete',$item->pelanggan_id) }}" method="post" onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus ??')">
                  <a href="{{ route('ubah', $item->pelanggan_id) }}" class="btn btn-warning"> Edit</a>
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
