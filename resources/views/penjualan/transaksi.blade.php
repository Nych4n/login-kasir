@extends('template')
@section('contact')
@section('title','Penjualan')
<div class="row">
    <div class="col-lg-12 d-flex align-items-strech">
      <div class="card w-100">
        <div class="card-body">
         <h4>Tabel Penjualan</h4>
         <div class="card-body">
            <input type="hidden" name="pelanggan_id" value="{{ $pelanggan_id }}">
            <div class="row g-3 align-items-center mb-3">
                <div class="col-auto">
                    <label  class="col-form-label">NO NOTA</label>
                </div>
                <div class="col-auto">
                    <input type="text" name="kode_penjualan" value="{{ $nota }}" class="form-control"  placeholder="Masukkan Kode" readonly>
                </div>
            </div>
            <div class="row g-3 align-items-center mb-3">
                <div class="col-auto">
                    <label  class="col-form-label">Nama</label>
                </div>
                <div class="col-auto">
                    <input type="text" name="nama_pel" value="{{ $namapelanggan }}" class="form-control"  placeholder="Masukkan Kode" readonly>
                </div>
            </div>
            <form action="{{ route('tambahkeranjang',['pelanggan_id' => $pelanggan_id]) }}" method="post"> 
                @csrf              
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto">
                        <input type="hidden" name="kode_penjualan" value="{{ $nota }}" readonly>
                        <label  class="col-form-label">Produk</label>
                    </div>
                    <div class="col-auto">
                        <select name="produk_id" class="form-control">
                            @foreach ($produk as $item)
                            <option value="{{ $item->produk_id }}">{{ $item->nama_produk}}-{{ $item->stok}}</option>                                
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row g-3 align-items-center mb-3">
                    <div class="col-auto">
                        <label  class="col-form-label">Jumlah</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" name="jumlah" class="form-control"  placeholder="Masukkan jumlah" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
         </div>
         <div class="card-body">
            
         <table class="table ">
            <thead>
              <tr>
                <th>#</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; $total=0;?>
              @foreach ($detail as $item1)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item1->kode_produk }}</td>
                <td>{{ $item1->nama_produk }}</td>
                <td>{{ $item1->harga }}</td>
                <td>{{ $item1->jumlah }}</td>
                <td>{{ number_format($item1->harga * $item1->jumlah) }}</td>
                <td>
                    <form action="{{ route('prosesdelete',['DetailID'=> $item1->detail_id, 'ProdukID'=> $item1->produk_id]) }}" method="post" onsubmit="return confrim('Apakah Anda Yakin Ingin Menghapus???')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
              </tr>     
              <?php $total += $item1->harga * $item1->jumlah;  ?>           
              @endforeach
            </tbody>
           </table>
         </div>

         <div class="card-body">
                <label for="">Sub Total</label>
                <input type="text" value="{{ number_format($total) }}"  name="sub_total" readonly class="form-control">
                <form action="{{ route('bayar', $nota) }}" method="post">
                    @csrf
                    <label for="">Pembayaran</label>
                    <input type="text" value="" name="pembayaran" required class="form-control">

                    <br>
                    <input type="hidden" name="pelanggan_id" value="{{ $pelanggan_id }}">
                    <input type="hidden" name="kode_penjualan" value="{{ $nota }}">
                    <input type="hidden" name="total_harga" value="{{ $total }}">
                    @if (count($detail)> 0)
                        <button type="submit" class="btn btn-primary mb-3">Bayar</button>
                    @endif
                </form>
         </div>
        </div>
      </div>
    </div>
  </div>
@endsection
