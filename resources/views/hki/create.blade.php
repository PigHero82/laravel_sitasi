@extends('layout')
{{-- @section('indexactive')
    active
@endsection --}}
@section('judul')
    Tambah HKI
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
            <h3 class="card-title">Tambah HKI</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-2 col-4 text-right">
                    <span>Judul HKI:</span>
                </div>
                <div class="col-md-9 col-8">
                    <input type="text" name="judul" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2 col-4 text-right">
                    <span>Tahun Pelaksanaan :</span>
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
                    <span>Jenis HKI :</span>
                </div>
                <div class="col-md-9 col-8">
                    <select name="jenis-publikasi" class="form-control">
                        <option value="">Pilih Jenis HKI</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2 col-4 text-right">
                    <span>No. Pendaftaran :</span>
                </div>
                <div class="col-md-9 col-8">
                    <input type="text" name="nama-jurnal" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2 col-4 text-right">
                    <span>No. HKI :</span>
                </div>
                <div class="col-md-9 col-8">
                    <input type="text" name="jenis-publikasi" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2 col-4 text-right">
                    <span>Status HKI :</span>
                </div>
                <div class="col-md-9 col-8">
                    <select name="peran-penulis" class="form-control">
                        <option value="">Pilih Status HKI</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-2 col-4 text-right">
                    <span>Dokumen Pendukung :</span>
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