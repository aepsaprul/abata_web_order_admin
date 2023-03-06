@extends('layouts.app')

@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('tema/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('tema/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('tema/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

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
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Produk</li>
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
        <!-- TABLE: LATEST ORDERS -->
        <div class="card">
          <div class="card-header border-transparent">
            <a href="{{ route('produk.create') }}" class="btn btn-primary btn-sm" style="width: 40px;"><i class="fa fa-plus"></i></a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <table id="tabel-produk" class="table">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Harga</th>
                  <th>Kategori</th>
                  <th>Gambar</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($produk as $key => $item)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $item->nama }}</td>
                      <td>{{ $item->harga }}</td>
                      <td>
                        @if ($item->kategori)
                          {{ $item->kategori->nama }}
                        @endif
                      </td>
                      <td><img src="{{ asset('img_produk/' . $item->gambar) }}" alt="" style="max-width: 100px;"></td>
                      <td>
                        <a href="{{ route('produk.edit', [$item->id]) }}" class="btn btn-primary btn-sm" style="width: 40px;"><i class="fa fa-edit"></i></a>
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
  </div><!--/. container-fluid -->
</section>
<!-- /.content -->

{{-- modal --}}
<div class="modal fade" id="modal-danger">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <form action="{{ route('produk.delete') }}" method="POST">
        <input type="hidden" name="id" id="id">
        @csrf
        <div class="modal-body">
          <p>Yakin akan dihapus?</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-primary">Ya</button>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endsection

@section('script')
<!-- DataTables  & Plugins -->
<script src="{{ asset('tema/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('tema/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('tema/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('tema/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('tema/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('tema/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>

<script>
  $(document).ready(function() {
    $(document).on('click', '.btn-delete', function (e) {
      e.preventDefault();
      $(this).attr('data-id');
      $('#id').val($(this).attr('data-id'));

      $('#modal-danger').modal('show');
    })
  })

  // datatable
  $('#tabel-produk').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
  });
</script>
@endsection