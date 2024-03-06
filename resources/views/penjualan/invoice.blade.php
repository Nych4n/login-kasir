@extends('template')
@section('contact')
@section('title','Invoice')

<div class="col-sm-12">
<h4># Invoice</h4>
<div class="card-body">
    <div class="row">
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-info">
                <strong>From</strong><br>
                Toko Berkah Pakan <br>
                Jl.gatot subroto <br>
            </div>
            <div class="col-sm-4 invoice-info">
                <strong>NOTA # {{ $nota }}</strong><br>
                {{ $tanggal }} <br>
            </div>
            <div class="col-sm-4 invoice-info">
                @foreach ($penjualan as $item)
                <strong>To</strong><br>
                    Nama : {{ $item->nama_pel }} <br>
                    Alamat : {{ $item->alamat }} <br>
                    Telepon : {{ $item->telp }} 
                @endforeach
            </div>
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
                  </tr>     
                  <?php $total += $item1->harga * $item1->jumlah;  ?>           
                  @endforeach
                </tbody>
               </table>
               <div class="card-body">
                <strong>Total : {{ number_format($total) }}</strong><br>
                @foreach ($penjualan as $item2)
                    <strong>Pembayaran : {{ number_format($item2->pembayaran) }}</strong><br>
                    <?php $kembalian = $item2->pembayaran - $total ?>
                    <strong>Kembalian : {{ number_format($kembalian) }}</strong>
                @endforeach
               </div>
        </div>
    </div>
</div>
</div>
    
@endsection