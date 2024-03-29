@extends('layouts.app')

@section('style')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('tema/plugins/summernote/summernote-bs4.min.css') }}">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tambah Produk</h1>
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
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="deskripsi_singkat">Deskripsi Singkat</label>
                    <textarea name="deskripsi_singkat" id="deskripsi_singkat" rows="2" class="form-control" placeholder="Deskripsi singkat"></textarea>
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label for="min_beli">Min beli</label>
                    <input type="number" name="min_beli" id="min_beli" class="form-control" required>                    
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label for="berat">Berat per gram</label>
                    <input type="number" name="berat" id="berat" class="form-control" required>                    
                  </div>
                </div>
                <div class="col-2">
                  <div class="form-group">
                    <label for="satuan">Satuan</label>
                    <select name="satuan" id="satuan" class="form-control">
                      <option value="pcs">pcs</option>
                      <option value="lembar">lembar</option>
                      <option value="rim">rim</option>
                      <option value="box">box</option>
                    </select>
                  </div>
                </div>
              </div>
              <div>
                <label for="deskripsi">Deskripsi Produk</label>
                <textarea name="deskripsi" id="summernote"></textarea>
              </div>

              {{-- data hidden --}}
              <input type="hidden" name="template_total" id="template_total" value="{{ count($template) }}">

              <div style="display: grid; grid-template-columns: auto auto auto auto auto; gap: 10px;">
                @foreach ($template as $key => $item)
                  <div style="width: 100%; border: 2px solid #ccc; padding: 5px; border-radius: 5px;">
                    <div style="border-bottom: 1px solid #ccc;">
                      <label for="template_head_{{ $key }}">
                        <input 
                          type="checkbox" 
                          name="template_head[]" 
                          id="template_head_{{ $key }}" 
                          class="template_head" 
                          data-id="{{ $item->id }}" 
                          style="width: 14px; height: 17px; margin-right: 5px;" 
                          value="{{ $item->id }}">
                          <span style="font-size: 14px;">{{ $item->nama }}</span>
                      </label>
                    </div>

                    {{-- data hidden --}}
                    <input type="hidden" name="template_detail_total" id="template_detail_total_{{ $key }}" value="{{ count($item->detail) }}">

                    @if ($item->detail)
                      @foreach ($item->detail as $key => $item_detail)
                        <div>
                          <label for="template_detail_{{ $item->id }}_{{ $key }}" style="font-weight: normal;">
                            <input 
                              type="checkbox" 
                              name="template_detail[]" 
                              id="template_detail_{{ $item->id }}_{{ $key }}" 
                              class="template_detail_{{ $key }}_{{ $item->id }}" 
                              style="width: 14px; height: 14px; margin-right: 5px;" 
                              value="{{ $item_detail->id }}">
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

@section('script')
<!-- Summernote -->
<script src="{{ asset('tema/plugins/summernote/summernote-bs4.min.js') }}"></script>

<script>
  $(document).ready(function () {
    $(function () {
      // Summernote
      $('#summernote').summernote()
    })

    // template
    const template_total = $('#template_total').val();
    $('input[name="template_detail[]"]').prop('disabled', true);

    for (let i = 0; i < template_total; i++) { // loop untuk check template head
      const template_head = $('#template_head_' + i);
      template_head.on('change', function () {
        const val = $(this).val();
        const template_detail_total = $('#template_detail_total_' + i).val();
        
        if (template_head.is(':checked')) { // jika template head check
          for (let i_detail = 0; i_detail < template_detail_total; i_detail++) { // loop untuk mengaktifkan template detail
            $('.template_detail_' + i_detail + '_' + val).prop('disabled', false);            
          }
        } else { // jika template head uncheck
          for (let i_detail = 0; i_detail < template_detail_total; i_detail++) { // loop untuk mengnonaktifkan template detail
            $('.template_detail_' + i_detail + '_' + val).prop('disabled', true);            
          }
        }
      })
    }
  })
</script>
@endsection