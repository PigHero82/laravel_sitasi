@extends('layout')
{{-- @section('indexactive')
    active
@endsection --}}
@section('judul')
    Riwayat Buku
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
            <h3 class="card-title">Riwayat Buku</h3>

            <div class="card-tools">
            <a href="/buku/create" class="btn btn-success px-1">Tambah</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="text-primary font-weight-bold mb-1">Metodologi Penelitian</h5>
                    <p class="text-secondary">Tahun : 2017 | ISBN : 123-456-789-0 | Halaman : 26</p>
                    <p>Penerbit : ABC</p>
                    <p>URL : </p>
                    <p>Status : valid</p>
                    <hr>
                </div>
                <div class="col-sm-6">
                    <h5 class="text-primary font-weight-bold mb-1">Simulasi Sistem Industri</h5>
                    <p class="text-secondary">Tahun : 2010 | ISBN : 123-456-789-0 | Halaman : 15</p>
                    <p>Penerbit : ABC</p>
                    <p>URL : </p>
                    <p>Status : valid</p>
                    <hr>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection