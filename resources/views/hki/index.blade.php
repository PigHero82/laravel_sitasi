@extends('layout')
{{-- @section('indexactive')
    active
@endsection --}}
@section('judul')
    Riwayat HKI
@endsection
@section('content')
    @if(session()->get('success'))
        <div class ="alert alert-success">
            {{ session()->get('success') }}  
        </div><br />
    @endif
    <!-- general form elements -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Riwayat HKI</h3>

            <div class="card-tools">
                <a href="/hki/create" class="btn btn-success px-1">Tambah</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="text-primary font-weight-bold mb-1">Jurnal Internasional
                        <div class="float-right">
                            <button type="button" class="btn btn-danger align-baseline px-1"><i class="feather icon-trash"></i></button>
                        </div>
                    </h5>
                    <p class="text-secondary">Tahun : 2017 | Paten | Terdaftar</p>
                    <hr>
                </div>
                <div class="col-sm-6">
                    <h5 class="text-primary font-weight-bold mb-1">Jurnal Nasional Terakreditasi
                        <div class="float-right">
                            <button type="button" class="btn btn-danger align-baseline px-1"><i class="feather icon-trash"></i></button>
                        </div>
                    </h5>
                    <p class="text-secondary">Tahun : 2010 | Paten | Terdaftar</p>
                    <hr>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection