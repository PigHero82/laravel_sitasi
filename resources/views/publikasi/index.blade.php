@extends('layout')
{{-- @section('indexactive')
    active
@endsection --}}
@section('judul')
    Riwayat Publikasi
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
            <h3 class="card-title">Riwayat Publikasi</h3>

            <div class="card-tools">
            <a href="{{ route('dosen.publikasi.create') }}" class="btn btn-success px-1">Tambah</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="text-primary font-weight-bold mb-1">Jurnal Internasional</h5>
                    <p class="text-secondary">Tahun : 2017 | International Journal of Business Information Systems | Volume : 26</p>
                    <p>Promoting the software industry in Ecuador</p>
                    <p>Peran Penulis : </p>
                    <p>Status : valid</p>
                    <hr>
                </div>
                <div class="col-sm-6">
                    <h5 class="text-primary font-weight-bold mb-1">Jurnal Nasional Terakreditasi</h5>
                    <p class="text-secondary">Tahun : 2010 | Jurnal Ekonomi Bisnis | Volume : 15</p>
                    <p>MINAT KARIR TERHADAP TEKNOLOGI</p>
                    <p>Peran Penulis : </p>
                    <p>Status : valid</p>
                    <hr>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection