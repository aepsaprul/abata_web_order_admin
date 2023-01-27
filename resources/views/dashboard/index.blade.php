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
            <th>id</th>
            <th>nama</th>
            <th>produk</th>
            <th>quantity</th>
            <th>kota</th>
            <th>status</th>
            <th>status bayar</th>
            <th>penerima</th>
            <th>tanggal</th>
            <th>total</th>
            <th>metode bayar</th>
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
              <td>{{ $item->status }}</td>
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