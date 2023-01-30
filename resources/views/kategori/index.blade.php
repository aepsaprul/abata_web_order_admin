@extends('layouts.app')

@section('content')
<div class="kategori">
  <h1>Kategori</h1>
  <div class="kategori-content">
    <div class="row tombol">
      <button class="btn btn-primary"><img src="{{ asset('icon/add-line.svg') }}" alt=""></button>
    </div>
    <div class="row">
      <table>
        <thead>
          <tr>
            <th style="text-align: left"><input type="checkbox" name="check_id" id="check_id"></th>
            <th style="text-align: left;">Nama</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection