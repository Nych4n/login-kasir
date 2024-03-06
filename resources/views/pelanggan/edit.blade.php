@extends('template')
@section('contact')
@section('title','Edit pelanggan')

<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-body">
         <h4>Edit pelanggan</h4>
              <div class="modal-body">
                <form action="{{ Route('ganti', $pelanggan->pelanggan_id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row g-3 align-items-center mb-3">
                  <div class="col-auto">
                    <label  class="col-form-label">Nama</label>
                  </div>
                  <div class="col-auto">
                    <input type="text" name="nama_pel" value="{{ $pelanggan->nama_pel }}" class="form-control"  placeholder="Masukkan Kode">
                  </div>
                </div>
                <div class="row g-3 align-items-center mb-3" >
                  <div class="col-auto">
                    <label  class="col-form-label">Alamat</label>
                  </div>
                  <div class="col-auto">
                    <input type="text" name="alamat" value="{{ $pelanggan->alamat }}" class="form-control"  placeholder="Masukkan Alamat">
                  </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                  <div class="col-auto">
                    <label  class="col-form-label">Telepon</label>
                  </div>
                  <div class="col-auto">
                    <input type="number" name="telp" value="{{ $pelanggan->telp }}" class="form-control"  placeholder="Masukkan NO telp">
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
