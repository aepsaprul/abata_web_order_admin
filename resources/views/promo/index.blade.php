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
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Promo</li>
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
            <a href="{{ route('promo.create') }}" class="btn btn-primary btn-sm" style="width: 40px;"><i class="fa fa-plus"></i></a>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Diskon</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($promo as $key => $item)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{ $item->nama }}</td>
                      <td>
                        @if ($item->satuan == "persen")
                          {{ $item->diskon }} %
                        @else
                          Rp @currency($item->diskon)
                        @endif
                      </td>
                      <td>
                        @php
                          $awal = Carbon\Carbon::parse($item->awal)->locale('id');
                          $awal->settings(['formatFunction' => 'translatedFormat']);

                          $akhir = Carbon\Carbon::parse($item->akhir)->locale('id');
                          $akhir->settings(['formatFunction' => 'translatedFormat']);
                        @endphp
                        {{ $awal->addDay()->format('d/m/Y') }} <span style="font-weight: bold; font-size: 14px;">s/d</span> {{ $akhir->addDay()->format('d/m/Y') }}
                        {{-- {{ $item->awal }} s/d {{ $item->akhir }} --}}
                      </td>
                      <td>{{ $item->aktif }}</td>
                      <td>
                        <a href="{{ route('promo.edit', [$item->id]) }}" class="btn btn-primary btn-sm" style="width: 40px;"><i class="fa fa-edit"></i></a>
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

<!-- modal delete -->
<div class="modal fade" id="modal-danger">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <form action="{{ route('promo.delete') }}" method="POST">
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

    // btn produk
    $(document).on('click', '.btn-produk', function (e) {
      e.preventDefault();
      const id = $(this).attr('data-id');
      let url = "{{ route('promo.showProduk', ':id') }}";
      url = url.replace(':id', id);
      console.log(url)
      $.ajax({
        url: url,
        type: "get",
        success: function (response) {
          console.log(response)
          let val = `<div class="row">`;
          $.each(response.kategori, function (index, item) {
            val += `
              <div class="col-3">
                <div class="p-1 border">
                  <div class="border-bottom text-capitalize">
                    ${item.nama}
                  </div>
                </div>
              </div>
            `;
          })
          val += `</div>`;
          $('.modal-content-produk').html(val);
        }
      })      
    })
  })
</script>
@endsection