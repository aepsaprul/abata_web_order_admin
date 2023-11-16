@extends('layouts.app')
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Landing</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item active">Landing</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('landing.update', [$landing->id]) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              {{-- id --}}
              <input type="hidden" name="id" id="id" value="{{ $landing->id }}">
              <div class="row">
                <div class="col-12 mb-3">
                  <label for="nama">Nama</label>
                  <input type="text" name="nama" id="nama" class="form-control" value="{{ $landing->nama }}">
                </div>
                <div class="col-3 mb-3">
                  <div style="height: 200px; width: 100%;">
                    <img src="{{ asset('img_landing/'.$landing->img_1) }}" alt="img" width="100%" height="180px;" style="object-fit: contain;">
                  </div>
                  <label for="img_1">Gambar 1</label>
                  <input type="file" name="img_1" id="img_1" class="form-control">
                </div>
                <div class="col-3 mb-3">
                  <div style="height: 200px; width: 100%;">
                    <img src="{{ asset('img_landing/'.$landing->img_2) }}" alt="img" width="100%" height="180px;" style="object-fit: contain;">
                  </div>
                  <label for="img_2">Gambar 2</label>
                  <input type="file" name="img_2" id="img_2" class="form-control">
                </div>
                <div class="col-3 mb-3">
                  <div style="height: 200px; width: 100%;">
                    <img src="{{ asset('img_landing/'.$landing->img_3) }}" alt="img" width="100%" height="180px;" style="object-fit: contain;">
                  </div>
                  <label for="img_3">Gambar 3</label>
                  <input type="file" name="img_3" id="img_3" class="form-control">
                </div>
                <div class="col-3 mb-3">
                  <div style="height: 200px; width: 100%;">
                    <img src="{{ asset('img_landing/'.$landing->img_4) }}" alt="img" width="100%" height="180px;" style="object-fit: contain;">
                  </div>
                  <label for="img_4">Gambar 4</label>
                  <input type="file" name="img_4" id="img_4" class="form-control">
                </div>
                <div class="col-3 mb-3">
                  <div style="height: 200px; width: 100%;">
                    <img src="{{ asset('img_landing/'.$landing->img_5) }}" alt="img" width="100%" height="180px;" style="object-fit: contain;">
                  </div>
                  <label for="img_5">Gambar 5</label>
                  <input type="file" name="img_5" id="img_5" class="form-control">
                </div>
                <div class="col-3 mb-3">
                  <div style="height: 200px; width: 100%;">
                    <img src="{{ asset('img_landing/'.$landing->img_6) }}" alt="img" width="100%" height="180px;" style="object-fit: contain;">
                  </div>
                  <label for="img_6">Gambar 6</label>
                  <input type="file" name="img_6" id="img_6" class="form-control">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-4">
                  <label for="telepon">Telepon</label>
                  <input type="text" name="telepon" id="telepon" class="form-control">
                </div>
                <div class="col-8">
                  <label for="teks_wa">Teks WhatsApp</label>
                  <textarea name="teks_wa" id="teks_wa" rows="4" class="form-control"></textarea>
                </div>
              </div>
              <div class="row">
                <div class="col-3 mb-3">
                  <label for="teks_1">Teks 1</label>
                  <input type="text" name="teks_1" id="teks_1" class="form-control" value="{{ $landing->teks_1 }}">
                </div>
                <div class="col-3 mb-3">
                  <label for="teks_2">Teks 2</label>
                  <input type="text" name="teks_2" id="teks_2" class="form-control" value="{{ $landing->teks_2 }}">
                </div>
                <div class="col-3 mb-3">
                  <label for="teks_3">Teks 3</label>
                  <input type="text" name="teks_3" id="teks_3" class="form-control" value="{{ $landing->teks_3 }}">
                </div>
                <div class="col-3 mb-3">
                  <label for="teks_4">Teks 4</label>
                  <input type="text" name="teks_4" id="teks_4" class="form-control" value="{{ $landing->teks_4 }}">
                </div>
              </div>
              <div class="row">
                <div class="col-6 mb-3">
                  <label for="pixel_1">Pixel 1</label>
                  <textarea name="pixel_1" id="pixel_1" rows="5" class="form-control"></textarea>
                </div>
                <div class="col-6 mb-3">
                  <label for="pixel_2">Pixel 2</label>
                  <textarea name="pixel_2" id="pixel_2" rows="5" class="form-control"></textarea>
                </div>
              </div>
              <div>
                <button class="btn btn-primary" style="width: 130px;"><i class="fas fa-save"></i> Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection