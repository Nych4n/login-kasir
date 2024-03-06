@extends('template')
@section('contact')
@section('title','Pengguna')

<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-body">
         <h4>Halaman Pengguna</h4>
         <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Tambah Pengguna
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Pengguna</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form action="{{ Route('prosestambah') }}" method="post">
                  @csrf
                <div class="row g-3 align-items-center mb-3">
                  <div class="col-auto">
                    <label  class="col-form-label">Username</label>
                  </div>
                  <div class="col-auto">
                    <input type="text" name="username" class="form-control" aria-describedby="Kode ProdukHelpInline" placeholder="Masukkan Username" required>
                  </div>
                </div>
                <div class="row g-3 align-items-center mb-3" >
                  <div class="col-auto">
                    <label  class="col-form-label">Nama</label>
                  </div>
                  <div class="col-auto">
                    <input type="text" name="name" class="form-control" aria-describedby="Kode ProdukHelpInline" placeholder="Masukkan Nama" required>
                  </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                  <div class="col-auto">
                    <label  class="col-form-label">password</label>
                  </div>
                  <div class="col-auto">
                    <input type="password" name="password" class="form-control" aria-describedby="Kode ProdukHelpInline" placeholder="*******" required>
                  </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                  <div class="col-auto">
                    <label  class="col-form-label">Level</label>
                  </div>
                  <div class="col-auto">
                    <select name="level" class="form-control">
                        <option value="administrator">Admin</option>
                        <option value="petugas">Petugas</option>
                    </select>
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
              <th>Username</th>
              <th>Nama</th>
              <th>Level</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; ?>
            @foreach ($pengguna as $item)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $item->username }}</td>
              <td>{{ $item->name }}</td>
              <td>{{ $item->level }}</td>
              <td>
                <form action="{{ route('proseshapus',$item->id) }}" method="post" onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus ??')">
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
