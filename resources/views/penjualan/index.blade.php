@extends('template')
@section('contact')
@section('title','Penjualan')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-body">
         <h4>Tabel Penjualan</h4>
         <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Cari Pelanggan
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Pelanggan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
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
                         <a href="{{ route('transaksi',$item->pelanggan_id) }}" class="btn btn-warning">Pilih</a>
                        </td>
                      </tr>                
                      @endforeach
                    </tbody>
                   </table>
              </div>
            </div>
          </div>
        </div>
         <table class="table ">
          <thead>
            <tr>
              <th>#</th>
              <th>Kode</th>
              <th>Tanggal</th>
              <th>Total Harga</th>
              <th>Nama Pelanggan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; ?>
            @foreach ($data['penjualan'] as $item1)
            <tr>
              <td>{{ $no++ }}</td>
              <td>{{ $item1->kode_penjualan }}</td>
              <td>{{ $item1->tgl_penjualan }}</td>
              <td>{{ $item1->total_harga }}</td>
              <td>{{ $item1->nama_pel }}</td>
              <td>
                  <a href="{{ route('invoice', $item1->kode_penjualan) }}" class="btn btn-warning"> Cek</a>
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


