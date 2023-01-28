@extends('layouts.app')

@section('content')
<div class="dashboard">
  <h1>Dashboard</h1>  
  <div class="dashboard-content">
    <div class="total">
      <div>
        <p class="angka">100</p>
        <p>Total Transaksi</p>
      </div>
      <div>
        <p class="angka">2.000.000</p>
        <p>Total Penjualan</p>
      </div>
      <div>
        <p class="angka">150</p>
        <p>Total Konsumen</p></div>
      <div>
        <p class="angka">4.000.000</p>
        <p>Total Profit</p>
      </div>
    </div>
    <div class="tabel-transaksi">
      <table>
        <thead>
          <tr>
            <th style="text-align: left;">id</th>
            <th style="text-align: left;">nama</th>
            <th style="text-align: left;">produk</th>
            <th>quantity</th>
            <th style="text-align: left;">kota</th>
            <th style="text-align: left;">status</th>
            <th style="text-align: left;">status bayar</th>
            <th style="text-align: left;">penerima</th>
            <th style="text-align: left;">tanggal</th>
            <th>total</th>
            <th style="text-align: left;">metode bayar</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($transaksi as $item)
            <tr>
              <td>{{ $item->nomor }}</td>
              <td>{{ $item->nama }}</td>
              <td>{{ $item->produk }}</td>
              <td style="text-align: center;">{{ $item->quantity }}</td>
              <td>{{ $item->kota }}</td>
              <td><span style="border-radius: 10px; padding: 0 10px">{{ $item->status }}</span></td>
              <td>{{ $item->status_bayar }}</td>
              <td>{{ $item->penerima }}</td>
              <td>{{ $item->tanggal }}</td>
              <td>{{ $item->total }}</td>
              <td>{{ $item->metode_bayar }}</td>
            </tr>              
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection