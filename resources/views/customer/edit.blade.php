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
          <li class="breadcrumb-item"><a href="{{ route('customer') }}" class="btn btn-danger"><i class="fa fa-arrow-left"></i></a></li>
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
    <form action="{{ route('customer.update', [$customer->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="row">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <div class="row">
                  <div class="col text-center">
                    @if ($customer->gambar)
                      <img src="{{ url(env('APP_URL_CLIENT') . '/img_customer/' . $customer->gambar) }}" alt="img_customer" style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover;">
                    @else
                      <img src="{{ asset('img/1665988705.jpg') }}" alt="img_customer" style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover;">
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label for="segmen">Segmen</label>
                      <select name="segmen" id="segmen" class="form-control">
                        <option value="">Retail</option>
                        <option value="member" {{ $customer->segmen == 'member' ? 'selected' : '' }}>Member</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-9">
                <div class="row">
                  <div class="col-3">
                    <div class="form-group">
                      <label for="nik">NIK</label>
                      <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukkan nik" value="{{ $customer->nik }}" readonly>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama kategori" value="{{ $customer->nama_lengkap }}" readonly>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label for="telepon">Telepon</label>
                      <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukkan telepon" value="{{ $customer->telepon }}" readonly>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan email" value="{{ $customer->email }}" readonly>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label for="jenis_kelamin">Jenis Kelamin</label>
                      <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control" placeholder="Masukkan jenis kelamin" value="{{ $customer->jenis_kelamin }}" readonly>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label for="tanggal_lahir">Tanggal Lahir</label>
                      <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" placeholder="Masukkan nama kategori" value="{{ $customer->tanggal_lahir }}" readonly>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukkan alamat" value="{{ $customer->alamat }}" readonly>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label for="kecamatan">Kecamatan</label>
                      <input type="text" name="kecamatan" id="kecamatan" class="form-control" placeholder="Masukkan kecamatan" value="{{ $customer->kecamatan }}" readonly>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label for="kabupaten">Kabupaten</label>
                      <input type="text" name="kabupaten" id="kabupaten" class="form-control" placeholder="Masukkan kabupaten" value="{{ $customer->kabupaten }}" readonly>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label for="provinsi">Provinsi</label>
                      <input type="text" name="provinsi" id="provinsi" class="form-control" placeholder="Masukkan provinsi" value="{{ $customer->provinsi }}" readonly>
                    </div>
                  </div>
                  <div class="col-3">
                    <div class="form-group">
                      <label for="kodepos">Kodepos</label>
                      <input type="text" name="kodepos" id="kodepos" class="form-control" placeholder="Masukkan kodepos" value="{{ $customer->kodepos }}" readonly>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col text-right mt-5">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Perbaharui</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    @if ($customer->segmen)
      <div class="row">
        <div class="card">
          <div class="card-header">
            <div>Data Pengajuan Member</div>
          </div>
          <div class="card-body">
            <div>
              @if($customer->nomor_member)
                <div>
                  <label>ID Member</label>
                </div>
                <div>
                  <input type="text" value="{{ $customer->nomor_member }}" disabled>
                </div>
              @endif
            </div>
            <div>
              @if ($customer->foto_ktp)
                <div>
                  <label for="kodepos">Foto KTP</label>
                </div>
                <div>
                  <img src="{{ url(env('APP_URL_CLIENT') . '/img_ktp/' . $customer->foto_ktp) }}" alt="img_ktp" style="max-width: 300px;">
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    @endif
  </div><!--/. container-fluid -->
</section>
<!-- /.content -->
@endsection