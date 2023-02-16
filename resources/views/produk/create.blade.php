@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Produk</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('produk') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i></a></li>
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
            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-3">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama produk" required>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" id="harga" class="form-control" placeholder="Masukkan harga produk" required>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="kategori_id">Kategori</label>
                    <select name="kategori_id" id="kategori_id" class="form-control">
                      @foreach ($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }}</option>                          
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control" required>
                  </div>
                </div>
              </div>
              <div style="display: grid; grid-template-columns: auto auto auto auto auto; gap: 10px;">
                @foreach ($template as $item)
                  <div style="width: 100%; border: 2px solid #ccc; padding: 5px; border-radius: 5px;">
                    <div>
                      <label for="template_head_{{ $item->id }}">
                        <input type="checkbox" name="template_head" id="template_head_{{ $item->id }}" style="width: 14px; height: 17px; margin-right: 5px;">
                        <span style="font-size: 14px;">{{ $item->nama }}</span>
                      </label>
                    </div>
                    @if ($item->detail)
                      @foreach ($item->detail as $item_detail)
                        <div style="border-bottom: 1px solid #ccc;">
                          <label for="template_detail_{{ $item_detail->id }}" style="font-weight: normal;">
                            <input type="checkbox" name="template_detail" id="template_detail_{{ $item_detail->id }}" style="width: 14px; height: 14px; margin-right: 5px;">
                            <span style="font-size: 12px;">{{ $item_detail->nama }}</span>
                          </label>
                        </div>
                      @endforeach
                    @endif
                  </div>
                @endforeach
              </div>
              <button class="btn btn-primary mt-3"><i class="fa fa-save"></i> Simpan</button>
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