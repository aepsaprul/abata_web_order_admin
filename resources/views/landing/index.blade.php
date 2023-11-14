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
            <table class="table m-0">
              <thead>
              <tr>
                <th class="text-center">No</th>
                <th>Nama</th>
                <th class="text-center">Aksi</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($landings as $key => $item)
                  <tr>
                    <td class="text-center">{{ $key + 1 }}</td>
                    <td>{{ $item->nama }}</td>
                    <td class="text-center">
                      <a href="{{ route('landing.edit', [$item->id]) }}" class="text-primary mr-2"><i class="fas fa-edit"></i></a>
                      <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection