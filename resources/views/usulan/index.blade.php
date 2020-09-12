@extends('layout')
@section('tambahactive')
    active
@endsection
@section('judul')
    Usulan
@endsection
@section('content')
    @if(session()->get('success'))
        <div class ="alert alert-success">
            {{ session()->get('success') }}  
        </div><br />
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">PENELITIAN</h3>
                </div>
                <!-- /.card-header -->
                <div class="container">
                    <div class="card-body">
                        <h5>Rencana Waktu</h3><hr>
                        <div class="form-group">
                            <label for="tahun-usulan">Tahun Usulan</label>
                            <select name="tahun-usulan" class="form-control" readonly>
                                <option value="">2020</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun-usulan">Tahun Pelaksanaan</label>
                            <select name="tahun-usulan" class="form-control">
                                <option value="">2021</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary btn-block mb-3">Daftar</button>
                        <h3>Informasi Ketersediaan Skema</h3>
                        <div class="card collapse-icon accordion-icon-rotate">
                            <div class="accordion" id="accordionExample3" data-toggle-hover="true">
                                <div class="collapse-bordered">
                                    <div class="card">
                                        <div class="card-header row" id="heading300" data-toggle="collapse" role="button" data-target="#collapse300" aria-expanded="false" aria-controls="collapse300">
                                            <div class="col-12">
                                                <span class="lead collapse-title">
                                                    <div class="float-right mr-2">
                                                        <span class="badge badge-success">Berhak</span>
                                                    </div>
                                                    Penelitian Dasar Unggulan Perguruan Tinggi
                                                </span>
                                            </div>
                                        </div>

                                        <div id="collapse300" class="collapse" aria-labelledby="heading300" data-parent="#accordionExample3">
                                            <div class="card-body">
                                                <ul class="list-group">
                                                    <li class="list-group-item">Penelitian - Desentralisasi</li>
                                                    <li class="list-group-item">Tahun Minimal - 2 Tahun</li>
                                                    <li class="list-group-item">Tahun Maksimal - 3 Tahun</li>
                                                    <li class="list-group-item">Level TKT - 1,2,3</li>
                                                    <li class="list-group-item">Pengusul belum terdaftar di SINTA</li>
                                                    <li class="list-group-item">
                                                        <h3>Keterangan</h3>
                                                        <p class="text-danger">- Ketua pengusul berpendidikan S3 dengan minimal jabatan fungsional sekurang-kurangnya lektor.</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header row" id="heading310" data-toggle="collapse" role="button" data-target="#collapse310" aria-expanded="false" aria-controls="collapse310">
                                            <div class="col-12">
                                                <span class="lead collapse-title collapse-title">
                                                    <div class="float-right mr-2">
                                                        <span class="badge badge-danger">Tidak Berhak</span>
                                                    </div>
                                                    Penelitian Pengembangan Unggulan Perguruan Tinggi
                                                </span>
                                            </div>
                                        </div>
                                        <div id="collapse310" class="collapse" aria-labelledby="heading310" data-parent="#accordionExample3">
                                            <div class="card-body">
                                                <ul class="list-group">
                                                    <li class="list-group-item">Penelitian - Desentralisasi</li>
                                                    <li class="list-group-item">Tahun Minimal - 2 Tahun</li>
                                                    <li class="list-group-item">Tahun Maksimal - 3 Tahun</li>
                                                    <li class="list-group-item">Level TKT - 1,2,3</li>
                                                    <li class="list-group-item">Pengusul belum terdaftar di SINTA</li>
                                                    <li class="list-group-item">
                                                        <h3>Keterangan</h3>
                                                        <p class="text-danger">- Ketua pengusul berpendidikan S3 dengan minimal jabatan fungsional sekurang-kurangnya lektor.</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">PENGABDIAN</h3>
                </div>
                <!-- /.card-header -->
                <div class="container">
                    <div class="card-body">
                        <h5>Rencana Waktu</h3><hr>
                        <div class="form-group">
                            <label for="tahun-usulan">Tahun Usulan</label>
                            <select name="tahun-usulan" class="form-control" readonly>
                                <option value="">2020</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun-usulan">Tahun Pelaksanaan</label>
                            <select name="tahun-usulan" class="form-control">
                                <option value="">2021</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary btn-block mb-3">Daftar</button>
                        <h3>Informasi Ketersediaan Skema</h3>
                        <div class="card collapse-icon accordion-icon-rotate">
                            <div class="accordion" id="accordionExample4" data-toggle-hover="true">
                                <div class="collapse-bordered">
                                    <div class="card">
                                        <div class="card-header row" id="heading330" data-toggle="collapse" role="button" data-target="#collapse330" aria-expanded="false" aria-controls="collapse330">
                                            <div class="col-12">
                                                <span class="lead collapse-title">
                                                    <div class="float-right mr-2">
                                                        <span class="badge badge-success">Berhak</span>
                                                    </div>
                                                    Penelitian Dasar Unggulan Perguruan Tinggi
                                                </span>
                                            </div>
                                        </div>

                                        <div id="collapse330" class="collapse" aria-labelledby="heading330" data-parent="#accordionExample4">
                                            <div class="card-body">
                                                <ul class="list-group">
                                                    <li class="list-group-item">Penelitian - Desentralisasi</li>
                                                    <li class="list-group-item">Tahun Minimal - 2 Tahun</li>
                                                    <li class="list-group-item">Tahun Maksimal - 3 Tahun</li>
                                                    <li class="list-group-item">Level TKT - 1,2,3</li>
                                                    <li class="list-group-item">Pengusul belum terdaftar di SINTA</li>
                                                    <li class="list-group-item">
                                                        <h3>Keterangan</h3>
                                                        <p class="text-danger">- Ketua pengusul berpendidikan S3 dengan minimal jabatan fungsional sekurang-kurangnya lektor.</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header row" id="heading340" data-toggle="collapse" role="button" data-target="#collapse340" aria-expanded="false" aria-controls="collapse340">
                                            <div class="col-12">
                                                <span class="lead collapse-title collapse-title">
                                                    <div class="float-right mr-2">
                                                        <span class="badge badge-danger">Tidak Berhak</span>
                                                    </div>
                                                    Penelitian Pengembangan Unggulan Perguruan Tinggi
                                                </span>
                                            </div>
                                        </div>
                                        <div id="collapse340" class="collapse" aria-labelledby="heading340" data-parent="#accordionExample4">
                                            <div class="card-body">
                                                <ul class="list-group">
                                                    <li class="list-group-item">Penelitian - Desentralisasi</li>
                                                    <li class="list-group-item">Tahun Minimal - 2 Tahun</li>
                                                    <li class="list-group-item">Tahun Maksimal - 3 Tahun</li>
                                                    <li class="list-group-item">Level TKT - 1,2,3</li>
                                                    <li class="list-group-item">Pengusul belum terdaftar di SINTA</li>
                                                    <li class="list-group-item">
                                                        <h3>Keterangan</h3>
                                                        <p class="text-danger">- Ketua pengusul berpendidikan S3 dengan minimal jabatan fungsional sekurang-kurangnya lektor.</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- general form elements -->

@endsection