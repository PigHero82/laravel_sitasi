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
                <h3 class="card-title">Step 1 - Identitas Usulan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-2 col-4 text-right">
                        <span>Judul :</span>
                    </div>
                    <div class="col-md-9 col-8">
                        <input type="text" name="judul" class="form-control" autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 col-4 text-right">
                        <span>Ringkasan :</span>
                    </div>
                    <div class="col-md-9 col-8">
                        <textarea name="ringkasan" cols="50" rows="5" class="form-control" placeholder="Ringkasan penelitian tidak lebih dari 500 kata."></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 col-4 text-right">
                        <span>Kata Kunci :</span>
                    </div>
                    <div class="col-md-5 col-8">
                        <input type="text" name="jenis-publikasi" class="form-control" placeholder="Add Tag">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 col-4 text-right">
                        <span>Rumpun Ilmu :</span>
                    </div>
                    <div class="col-md-3 col-4">
                        <select name="rumpun-ilmu" class="form-control">
                            <option value="">Pilih Rumpun Ilmu</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-4">
                        <select name="sub-rumpun-ilmu" class="form-control">
                            <option value="">Pilih Sub Rumpun Ilmu</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 col-4 text-right">
                        <span>Program :</span>
                    </div>
                    <div class="col-md-9 col-8">
                        <select name="program" class="form-control">
                            <option value="">Penelitian - Desentralisasi</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 col-4 text-right">
                        <span>Skema :</span>
                    </div>
                    <div class="col-md-9 col-8">
                        <select name="skema" class="form-control">
                            <option value="">Penelitian Dasar Unggulan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 col-4 text-right">
                        <span>Kategori SBK :</span>
                    </div>
                    <div class="col-md-9 col-8">
                        <select name="kategori" class="form-control">
                            <option value="">SBK Riset Dasar</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 col-4 text-right">
                        <span>Bidang Fokus :</span>
                    </div>
                    <div class="col-md-9 col-8">
                        <select name="bidang" class="form-control">
                            <option value="">Teknologi</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 col-4 text-right">
                        <span>Lama Kegiatan :</span>
                    </div>
                    <div class="col-md-9 col-8">
                        <select name="lama" class="form-control">
                            <option value="">2 Tahun</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 col-4 text-right">
                        <span>Bidang Unggulan PT :</span>
                    </div>
                    <div class="col-md-9 col-8">
                        <select name="unggulan" class="form-control">
                            <option value="">Pendidikan Karakter</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 col-4 text-right">
                        <span>Topik Unggulan PT :</span>
                    </div>
                    <div class="col-md-9 col-8">
                        <select name="topik" class="form-control">
                            <option value="">Tingkat SD</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 col-4 text-right">
                        
                    </div>
                    <div class="col-md-9 col-8">
                        <button class="btn btn-primary px-1">Renstra Penelitian</button>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="float-right">
                    <a href="{{ route('dosen.usulan.2') }}" class="btn btn-success px-1">Lanjut</a>
                </div>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    <!-- general form elements -->

@endsection