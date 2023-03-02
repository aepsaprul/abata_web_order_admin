@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Rekening</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('rekening') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i></a></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('rekening.update', [$rekening->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="row">
                <div class="col-3">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama rekening" value="{{ $rekening->nama }}" required>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="nomor">Nomor</label>
                    <input type="text" name="nomor" id="nomor" class="form-control" placeholder="Masukkan nomor rekening" value="{{ $rekening->nomor }}" required>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="atas_nama">Atas Nama</label>
                    <input type="text" name="atas_nama" id="atas_nama" class="form-control" placeholder="Masukkan atas nama rekening" value="{{ $rekening->atas_nama }}" required>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="grup">Grup</label>
                    <select name="grup" id="grup" class="form-control">
                      <option value="bank" {{ $rekening->grup == "bank" ? 'selected' : '' }}>Bank</option>
                      <option value="e-wallet" {{ $rekening->grup == "e-wallet" ? 'selected' : '' }}>E Wallet</option>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                  </div>
                </div>
              </div>
              <button class="btn btn-primary"><i class="fa fa-save"></i> Perbaharui</button>
            </form>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection