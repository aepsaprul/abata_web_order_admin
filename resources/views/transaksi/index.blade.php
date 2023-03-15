@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Transaksi</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Transaksi</li>
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
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode</th>
                  <th>Penerima</th>
                  <th>Total</th>
                  <th>Ekspedisi</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($transaksi as $key => $item)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td><a href="#" class="detail" data-id="{{ $item->id }}" data-toggle="modal" data-target="#modalDetail">{{ $item->kode }}</a></td>
                      <td>{{ $item->penerima }}</td>
                      <td>Rp @currency($item->total)</td>
                      <td>{{ $item->ekspedisi }}</td>
                      <td>
                        <span class="text-capitalize {{ $item->status == 6 ? 'bg-success' : 'bg-danger' }} rounded py-1 px-2">{{ $item->dataStatus->nama }}</span> 
                        @if ($item->status == 2 || $item->status == 3 || $item->status == 4 || $item->status == 5)
                          <a href="#" class="edit" data-id="{{ $item->id }}" data-toggle="modal" data-target="#modalEdit">Edit</a>                            
                        @endif
                      </td>
                      <td>
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

<!-- modal detail -->
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDetailLabel">Detail Transaksi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-content-detail"></div>
    </div>
  </div>
</div>

<!-- modal edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form id="form_edit">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditLabel">Ubah Status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body modal-content-edit"></div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Perbaharui</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal hapus -->
<div class="modal fade" id="modal-danger">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <form action="{{ route('transaksi.delete') }}" method="POST">
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
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    // detail
    $('.detail').on('click', function (e) {
      e.preventDefault()
      const id = $(this).attr('data-id');

      let url = "{{ route('transaksi.show', ':id') }}";
      url = url.replace(':id', id);
      
      $.ajax({
        url: url,
        type: "get",
        success: function (response) {
          const transaksi = response.transaksi;

          const tgl = transaksi.created_at; // tanggal dari DB
          const event = new Date(tgl); // ambil variabel tanggal
          const options = { year: 'numeric', month: 'long', day: 'numeric' } // tentukan jenis tanggal
          const tgl_indo = event.toLocaleDateString('id-ID', options); // output ex. 9 maret 2023
          
          let val = `
            <div class="d-flex justify-content-between border rounded p-2">
              <div>${transaksi.kode}</div>
              <div>${tgl_indo}</div>
            </div>
            <div class="my-2 p-2 border rounded">
              <div class="font-weight-bold border-bottom pb-2">Detail Produk</div>`;

              $.each(transaksi.data_keranjang, function (index, item) {
                  val += `
                    <div>
                      <div class="d-flex my-2">
                        <div>
                          <img src="{{ asset('img_produk/${item.produk.gambar}') }}" alt="logo" style="width: 100px;">
                        </div>
                        <div class="ml-3">
                          <div class="text-md font-weight-bold">${item.produk.nama}</div>
                          <div class="text-sm">${item.qty} ${item.produk.satuan} x <span class="text-xs">Rp</span> ${afRupiah(item.harga)}</div>
                        </div>
                      </div>
                      <div class="mt-2">
                        <div class="text-xs">Total Harga</div>
                        <div class="text-sm font-weight-bold"><span class="text-xs">Rp</span> ${afRupiah(response.keranjang_total.total_harga)}</div>
                      </div>
                    </div>
                  `;
                })
  
                val += `
            </div>
            <div class="my-2 p-2 border rounded">
              <div class="font-weight-bold border-bottom pb-2">Pengiriman</div>
              <div>
                <div class="d-flex">
                  <div style="width: 40%;">Kurir</div>
                  <div style="width: 60%;">${transaksi.ekspedisi}</div>
                </div>
                <div class="d-flex">
                  <div style="width: 40%;">Alamat</div>
                  <div style="width: 60%;" class="text-uppercase">${transaksi.alamat}, Kec ${transaksi.data_kecamatan.dis_name}, Kab ${transaksi.data_kabupaten.city_name}, ${transaksi.data_provinsi.prov_name}</div>
                </div>
              </div>
            </div>
            <div class="my-2 p-2 border rounded">
              <div class="font-weight-bold border-bottom pb-2">Pembayaran</div>
              <div>
                <div class="d-flex">
                  <div style="width: 40%;><span class="text-uppercase">${transaksi.data_rekening.grup}</span></div>
                  <div style="width: 60%;">${transaksi.data_rekening.nama}</div>
                </div>
                <div class="d-flex">
                  <div style="width: 40%;">Total Harga</div>
                  <div style="width: 60%;"><span class="text-xs">Rp</span> ${afRupiah(response.keranjang_total.total_harga)}</div>
                </div>
                <div class="d-flex">
                  <div style="width: 40%;">Ongkir</div>
                  <div style="width: 60%;"><span class="text-xs">Rp</span> ${afRupiah(transaksi.ongkir)}</div>
                </div>
                <div class="d-flex">
                  <div style="width: 40%;">Diskon</div>
                  <div style="width: 60%;"><span class="text-xs">Rp</span> `;

                    if (transaksi.diskon) {
                      val += `${afRupiah(transaksi.diskon)}`;
                    } else {
                      val += `0`;
                    }

                    val += `</div>
                </div>
                <div class="d-flex">
                  <div style="width: 40%;">Total Beli</div>
                  <div style="width: 60%;" class="font-weight-bold"><span class="text-xs">Rp</span> ${afRupiah(transaksi.total)}</div>
                </div>
              </div>
            </div>
          `;

          $('.modal-content-detail').html(val);
        }
      })
    });

    // edit
    $('.edit').on('click', function (e) {
      const id = $(this).attr('data-id');
      
      let url = "{{ URL::route('transaksi.edit', ':id') }}";
      url = url.replace(':id', id);

      $.ajax({
        url: url,
        type: "get",
        success: function (response) {
          let val = `
          <input type="hidden" id="transaksi_id" value="${id}">
          <select name="status_id" id="status_id" class="form-control" required>
            <option value="">Pilih Status</option>`;

            $.each(response.status, function (index, item) {
              val += `<option value="${item.id}">${item.nama}</option>`;
            })
            
            val += `
          </select>
          `;

          $('.modal-content-edit').html(val);
        }
      })
    })

    // update
    $('#form_edit').on('submit', function (e) {
      e.preventDefault();
      const id = $('#transaksi_id').val();
      const status = $('#status_id').val();
      
      let url = "{{ route('transaksi.update', ':id') }}";
      url = url.replace(':id', id);

      let formData = {
        status_id: status
      }

      $.ajax({
        url: url,
        type: "put",
        data: formData,
        success: function (response) {
          window.location.reload();
        }
      })
    })
  })
</script>
@endsection