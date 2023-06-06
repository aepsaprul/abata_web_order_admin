@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Transaksi</span>
            <span class="info-box-number">{{ $count_transaksi }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Pesanan Hari Ini</span>
            <span class="info-box-number">{{ $count_pesanan_hari_ini }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-bill"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Belum Bayar</span>
            <span class="info-box-number">{{ $count_belum_bayar }}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <div style="width: 150px;">
                <div class="input-group">
                  <select name="filter" id="filter" class="form-control form-control-sm">
                    <option value="">Pilih Filter</option>
                    <option value="1">Pesanan Hari Ini</option>
                    <option value="2">Belum Bayar</option>
                  </select>
                </div>
              </div>  
              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="cari" id="cari" class="form-control float-right" placeholder="Cari">
  
                  <div class="input-group-append">
                    <button type="button" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>Kode</th>
                  <th>Customer</th>
                  <th>Total</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($transaksi_page as $key => $item)
                  <tr>
                    <td><a href="#" class="detail" data-id="{{ $item->id }}" data-toggle="modal" data-target="#modalDetail">{{ $item->kode }}</a></td>
                    <td>
                      @if ($item->dataCustomer)
                        {{ $item->dataCustomer->nama_lengkap }}
                      @else
                        <div class="text-danger">kosong</div>
                      @endif
                    </td>
                    <td class="text-right">Rp. @currency($item->total)</td>
                    <td>
                      <span class="text-capitalize {{ $item->status == 6 ? 'bg-success' : 'bg-danger' }} rounded py-1 px-2">{{ $item->dataStatus->nama }}</span> 
                      @if ($item->status == 2 || $item->status == 3 || $item->status == 4 || $item->status == 5)
                        <a href="#" class="edit" data-id="{{ $item->id }}" data-toggle="modal" data-target="#modalEdit" style="text-decoration: underline;">Edit</a>                          
                      @endif
                    </td>
                  </tr>                    
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
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
          console.log(response)
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
            <div>
              <!-- Timelime example  -->
              <div class="row">
                <div class="col-md-12 mt-2">
                  <!-- The time line -->
                  <div class="timeline">
                    <!-- timeline item -->`;
                    $.each(transaksi.data_transaksi_status, function (index_status, item_status) {
                      val += `
                      <div>
                        <i class="fas fa-circle bg-blue"></i>
                        <div class="timeline-item">
                          <h3 class="timeline-header">${item_status.data_status.nama}</h3>
                          <div class="timeline-body">
                            ${item_status.keterangan}
                          </div>
                        </div>
                      </div>`;
                    })
                    val += `
                    <!-- END timeline item -->
                  </div>
                </div>
                <!-- /.col -->
              </div>
            </div>
            <div class="p-2 border rounded">
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
                          <div style="font-size: 12px;">`;
                            $.each(item.data_keranjang_template, function (index_keranjang_template, item_keranjang_template) {
                              val += `${item_keranjang_template.data_template.nama}: ${item_keranjang_template.data_template_detail.nama},`;
                            })
                          val += `</div>
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
                  <div style="width: 60%;" class="text-uppercase">${transaksi.alamat}, Kec ${transaksi.data_kecamatan.kecamatan}, Kab ${transaksi.data_kabupaten.kabupaten}, ${transaksi.data_provinsi.provinsi}</div>
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
      e.preventDefault();
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
          <div style="display: flex; margin: 20px 0;">
            <div style="text-transform: capitalize; width: 100px;">${response.transaksi.data_rekening.grup}</div>
            <div>${response.transaksi.data_rekening.nama}</div>
          </div>
          <div style="display: flex; margin: 20px 0;">
            <div style="width: 100px;">Total Bayar</div>
            <div>Rp <span style="font-weight: bold;">${afRupiah(response.transaksi.total)}</span></div>
          </div>
          <div>
            <img src="{{ url(env('APP_URL_CLIENT') . '/img_bayar/${response.konfirmasi.gambar}') }}" alt="gambar" style="max-width: 100%;">
          </div>
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

      let formData = {
        id: id,
        status_id: status
      }

      $.ajax({
        url: "{{ URL::route('transaksi.update') }}",
        type: "post",
        data: formData,
        success: function (response) {
          window.location.reload();
        }
      })
    })
  })
</script>
@endsection