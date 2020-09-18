@extends('layout')
@section('tambahactive')
    active
@endsection
@section('judul')
    Usulan | [Nama Skema]
@endsection
@section('content')
    @if(session()->get('success'))
        <div class ="alert alert-success">
            {{ session()->get('success') }}  
        </div><br />
    @endif
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Step 3 - Identitas Usulan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-2 col-4 text-right">
                        <span>Pendahuluan :</span>
                    </div>
                    <div class="col-md-9 col-8">
                        <textarea name="" cols="50" rows="5" class="form-control" placeholder="Ringkasan penelitian tidak lebih dari 500 kata."></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 col-4 text-right">
                        <span>Solusi Permasalahan :</span>
                    </div>
                    <div class="col-md-9 col-8">
                        <textarea name="" cols="50" rows="5" class="form-control" placeholder="Ringkasan penelitian tidak lebih dari 500 kata."></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 col-4 text-right">
                        <span>Metode Pelaksanaan :</span>
                    </div>
                    <div class="col-md-9 col-8">
                        <textarea name="" cols="50" rows="5" class="form-control" placeholder="Ringkasan penelitian tidak lebih dari 500 kata."></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 col-4 text-right">
                        <span>Gambaran IPTEK :</span>
                    </div>
                    <div class="col-md-9 col-8">
                        <textarea name="" cols="50" rows="5" class="form-control" placeholder="Ringkasan penelitian tidak lebih dari 500 kata."></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 col-4 text-right">
                        <span>Daftar Pustaka :</span>
                    </div>
                    <div class="col-md-9 col-8">
                        <textarea name="" cols="50" rows="5" class="form-control" placeholder="Ringkasan penelitian tidak lebih dari 500 kata."></textarea>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('dosen.usulan.2') }}" class="btn btn-warning px-1">Kembali</a>
                <div class="float-right">
                    <a href="{{ route('dosen.usulan.4') }}" class="btn btn-success px-1">Lanjut</a>
                </div>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    <!-- general form elements -->

@endsection