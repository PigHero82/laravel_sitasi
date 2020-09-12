@extends('layout')
{{-- @section('indexactive')
    active
@endsection --}}
@section('judul')
    Tambah Buku
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
            <h3 class="card-title">Tambah Buku</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-2 col-4 text-right">
                    <span>Judul Buku :</span>
                </div>
                <div class="col-md-9 col-8">
                    <input type="text" name="judul" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2 col-4 text-right">
                    <span>Tahun Penerbitan :</span>
                </div>
                <div class="col-md-9 col-8">
                    <input type="text" name="jenis-publikasi" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2 col-4 text-right">
                    <span>ISBN :</span>
                </div>
                <div class="col-md-9 col-8">
                    <input type="text" name="jenis-publikasi" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2 col-4 text-right">
                    <span>Jumlah Halaman :</span>
                </div>
                <div class="col-md-9 col-8">
                    <input type="text" name="jenis-publikasi" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2 col-4 text-right">
                    <span>Penerbit :</span>
                </div>
                <div class="col-md-9 col-8">
                    <input type="text" name="jenis-publikasi" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2 col-4 text-right">
                    <span>URL :</span>
                </div>
                <div class="col-md-9 col-8">
                    <input type="text" name="jenis-publikasi" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2 col-4 text-right">
                    <span>Upload File :</span>
                </div>
                <div class="col-md-9 col-8">
                    <input type="file" name="jenis-publikasi" class="form-control-file">
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection