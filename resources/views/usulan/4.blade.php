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
                <h3 class="card-title">Step 4 - Luaran & Target</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class=" d-flex justify-content-center">
                        <div class="col-md-8">
                            <p class="font-weight-bold mb-2">Pada bagian ini, pengusul wajib mengisi luaran wajib & tambahan, tahun capaian, dan status pencapaiannya. Sama halnya seperti pada luaran penelitian, luaran publikasi pengabdian kepada masyarakat</p>
                            <h3>Informasi Janji Luaran</h3>
                            <ul>
                                <li>Tahun ke 1
                                    <p class="mt-1 ml-3">Abdasdadas</p>
                                    <p class="ml-3">sadhbasjhdbasdosa</p>
                                    <p class="ml-3">ADASFASJFNSAKF</p>
                                </li>
                                <li>Tahun ke 1
                                    <p class="mt-1 ml-3">Media lokal sudah hadir</p>
                                </li>
                                <li>Tahun ke 1
                                    <p class="mt-1 ml-3">Apa yang auw asd akjdka</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Tahun :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <select name="program" class="form-control">
                                    <option value="">Pilih Tahun</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Kelompok :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <select name="program" class="form-control">
                                    <option value="">Pilih Kelompok</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Luaran :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <select name="program" class="form-control">
                                    <option value="">Pilih Luaran</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Target :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <select name="program" class="form-control">
                                    <option value="">Pilih Target</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Jumlah :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <select name="program" class="form-control">
                                    <option value="">Pilih Jumlah</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Keterangan :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <input type="text" name="jenis-publikasi" class="form-control" placeholder="Pilih Keterangan">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('dosen.usulan.3') }}" class="btn btn-warning px-1">Kembali</a>
                <div class="float-right">
                    <a href="{{ route('dosen.usulan.5') }}" class="btn btn-success px-1">Lanjut</a>
                </div>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    <!-- general form elements -->

@endsection