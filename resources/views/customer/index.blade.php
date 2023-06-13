@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Customer</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Customer</li>
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
          <div class="card-header border-transparent">
            <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm" style="width: 40px;"><i class="fa fa-plus"></i></a>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Telepon</th>
                  <th>Email</th>
                  <th>Segmen</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($customer as $key => $item)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $item->nama_lengkap }}</td>
                      <td>{{ $item->telepon }}</td>
                      <td>{{ $item->email }}</td>
                      <td>
                        @if ($item->segmen == "member")
                          <div class="text-success">{{ $item->segmen }}</div>
                        @elseif ($item->segmen == "proses_baru" || $item->segmen == "proses_lama" || $item->segmen == "proses_perpanjang")
                          <div class="text-danger">{{ $item->segmen }}</div>
                        @else
                          Retail
                        @endif
                      </td>
                      <td>
                        <a href="{{ route('customer.edit', [$item->id]) }}" class="btn btn-primary btn-sm" style="width: 40px;"><i class="fa fa-edit"></i></a>
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
      <form action="{{ route('customer.delete') }}" method="POST">
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
<script>
  $(document).ready(function() {
    $(document).on('click', '.btn-delete', function (e) {
      e.preventDefault();
      $(this).attr('data-id');
      $('#id').val($(this).attr('data-id'));

      $('#modal-danger').modal('show');
    })
  })
</script>
@endsection