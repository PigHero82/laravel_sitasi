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
                <h3 class="card-title">Step 3 - Atribut Usulan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <p>Unggah file berdasarkan template dibawah</p>
                <button type="button" class="btn btn-success">Unduh Template</button>
                <hr>
                <div class="form-group row mt-2">
                    <div class="col-md-2 col-4">
                        <span>Unggah File :</span>
                    </div>
                    <div class="col-md-9 col-8">
                        <input type="file" name="" id="" class="form-control-file">
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