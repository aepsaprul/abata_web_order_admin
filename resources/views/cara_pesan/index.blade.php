@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Cara Pesan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Cara Pesan</li>
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
    {{-- tabel cara pesan --}}
    <div class="row">
      <!-- Left col -->
      <div class="col-md-12">
        <div class="card">
          <div class="card-header border-transparent d-flex justify-content-between">
            <div style="width: 100%;">
              <a href="{{ route('cara_pesan.create') }}" class="btn btn-primary btn-sm" style="width: 40px;"><i class="fa fa-plus"></i></a>
            </div>
            <div class="text-right" style="width: 100%;">
              <span class="font-weight-bold">Tabel Cara Pesan</span>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($cara_pesan as $key => $item)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $item->nama }}</td>
                      <td>
                        <a href="{{ route('cara_pesan.edit', [$item->id]) }}" class="btn btn-primary btn-sm" style="width: 40px;"><i class="fa fa-edit"></i></a>
                        <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $item->id }}" style="width: 40px;"><i class="fa fa-times"></i></button>
                      </td>
                    </tr>                      
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    {{-- tabel gambar --}}
    <div class="row">
      <!-- Left col -->
      <div class="col-md-12">
        <div class="card">
          <div class="card-header border-transparent d-flex justify-content-between">
            <div style="width: 100%;">
              <a href="{{ route('cara_pesan_gambar.create') }}" class="btn btn-primary btn-sm" style="width: 40px;"><i class="fa fa-plus"></i></a>
            </div>
            <div class="text-right" style="width: 100%;">
              <span class="font-weight-bold">Tabel Gambar</span>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Gambar</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($cara_pesan_gambar as $key => $item)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td><img src="{{ asset('img_cara_pesan_gambar/' . $item->gambar) }}" alt="gambar" style="width: 100px;"></td>
                      <td>
                        <a href="{{ route('cara_pesan_gambar.edit', [$item->id]) }}" class="btn btn-primary btn-sm" style="width: 40px;"><i class="fa fa-edit"></i></a>
                        <button type="button" class="btn btn-danger btn-sm btn-delete-gambar" data-id="{{ $item->id }}" style="width: 40px;"><i class="fa fa-times"></i></button>
                      </td>
                    </tr>                      
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
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

{{-- modal --}}
<div class="modal" tabindex="-1" role="dialog" id="modal_cara_pesan">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-danger">
      <form action="{{ route('cara_pesan.delete') }}" method="POST">
        @csrf
        <div class="modal-body">
          <input type="hidden" name="cara_pesan_id" id="cara_pesan_id">
          <p>Yakin akan dihapus?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-primary">Ya</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- modal gambar --}}
<div class="modal" tabindex="-1" role="dialog" id="modal_gambar">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-danger">
      <form action="{{ route('cara_pesan_gambar.delete') }}" method="POST">
        @csrf
        <div class="modal-body">
          <input type="hidden" name="gambar_id" id="gambar_id">
          <p>Yakin akan dihapus?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-primary">Ya</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  $(document).ready(function() {
    $(document).on('click', '.btn-delete', function (e) {
      e.preventDefault();
      $(this).attr('data-id');
      $('#cara_pesan_id').val($(this).attr('data-id'));

      $('#modal_cara_pesan').modal('show');
    })

    $(document).on('click', '.btn-delete-gambar', function (e) {
      e.preventDefault();
      $(this).attr('data-id');
      $('#gambar_id').val($(this).attr('data-id'));

      $('#modal_gambar').modal('show');
    })
  })
</script>
@endsection