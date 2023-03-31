@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Promo</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('promo') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i></a></li>
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
            <form action="{{ route('promo.store') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-3">
                  <div class="form-group">
                    <label for="nama">Nama Promo</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama promo" required>
                  </div>
                </div>
                <div class="col-3">
                  <div class="form-group">
                    <label for="diskon">Diskon</label>
                    <div class="d-flex justify-content-center align-items-center">
                      <div class="mr-1" style="width: 60%;">
                        <input type="text" name="diskon" id="diskon" class="form-control" placeholder="Masukkan diskon" required>
                      </div>
                      <div style="width: 40%;">
                        <label for="persen">
                          <input type="radio" name="satuan" id="persen" value="persen"> %
                        </label>
                        <label for="nominal">
                          <input type="radio" name="satuan" id="nominal" value="nominal"> Rp
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="tanggal">Batas Promo</label>
                    <div class="d-flex align-items-center">
                      <div style="width: 45%;">
                        <input type="date" name="awal" id="awal" class="form-control" value="{{ date('Y-m-d') }}" required>
                      </div>
                      <div class="text-center" style="width: 10%;">s/d</div>
                      <div style="width: 45%;">
                        <input type="date" name="akhir" id="akhir" class="form-control" value="{{ date('Y-m-d') }}" required>
                      </div>             
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <div style="font-weight: bold;">Produk</div>
                </div>
              </div>
              <div class="row mt-3">
                @foreach ($kategori as $key => $item)
                  <div class="col-3">
                    <div class="p-1 border">
                      <div class="border-bottom text-capitalize">
                        <label for="kategori_{{ $key }}" style="font-weight: 600;">
                          <input type="checkbox" name="kategori[]" id="kategori_{{ $key }}" class="kategori" value="{{ $item->id }}"> {{ $item->nama }}
                        </label>
                      </div>
                      <div>
                        @foreach ($item->dataProduk as $key_produk => $item_produk)
                          <div>
                            <label for="produk_{{ $item->id }}_{{ $key_produk }}" style="font-weight: 300;">
                              <input type="checkbox" name="produk[]" id="produk_{{ $item->id }}_{{ $key_produk }}" class="produk_{{ $item->id }}" value="{{ $item_produk->id }}"> {{ $item_produk->nama }}                            
                            </label>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="mt-4">
                <button class="btn btn-primary" style="width: 200px;"><i class="fa fa-save"></i> Simpan</button>
              </div>
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

@section('script')
<script>
  $(document).ready(function () {
    const kategori_class = document.querySelectorAll('.kategori');
    
    for (let i_kategori = 0; i_kategori < kategori_class.length; i_kategori++) {
      const kategori_check = $('#kategori_' + i_kategori);
      
      kategori_check.on('change', function () {
        const val = $(this).val();
        if (kategori_check.is(':checked')) {
          $('.produk_' + val).prop('checked', true);          
        } else {
          $('.produk_' + val).prop('checked', false);
        }
      })
    }
  })
</script>
@endsection