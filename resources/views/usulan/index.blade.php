@extends('layout')

@section('judul')
    Usulan
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
            {{ $message }}
        </div>
    @endif

    @if ($message = Session::get('danger'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
            {{ $message }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-block">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
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
                        <form action="{{ route('dosen.usulan.store') }}" method="post">
                            @csrf
                            <h5>Rencana Waktu</h3><hr>
                            <div class="form-group">
                                <label for="tahun-usulan">Tahun Usulan</label>
                                <select name="skema_usulan_id" class="form-control select" data-value="1">
                                    <option value="" hidden>--Pilih skema</option>
                                    @foreach ($skema as $item)
                                        @if ($item->jenis == 1)
                                            <option value="{{ $item->id }}/{{ $item->tahun_skema }}">{{ $item->tahun_skema }} - {{ $item->kode }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tahun-usulan">Tahun Pelaksanaan</label>
                                <input type="hidden" name="jenis" value="1">
                                <input type="hidden" name="step" value="1">
                                <input type="text" id="tahun-1" name="tahun_pelaksanaan" class="form-control" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mb-3">Daftar</button>
                        </form>
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
                        <form action="{{ route('dosen.usulan.store') }}" method="post">
                            @csrf
                        <h5>Rencana Waktu</h5><hr>
                        <div class="form-group">
                            <label for="tahun-usulan">Tahun Usulan</label>
                            <select name="skema_usulan_id" class="form-control select" data-value="2">
                                <option value="" hidden>--Pilih skema</option>
                                @foreach ($skema as $item)
                                    @if ($item->jenis == 2)
                                        <option value="{{ $item->id }}/{{ $item->tahun_skema }}">{{ $item->tahun_skema }} - {{ $item->kode }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun-usulan">Tahun Pelaksanaan</label>
                            <input type="hidden" name="jenis" value="2">
                            <input type="hidden" name="step" value="1">
                            <input type="text" id="tahun-2" name="tahun_pelaksanaan" class="form-control" readonly>
                        </div>
                        {{-- <a href="{{ route('dosen.usulan.1') }}"> --}}
                            <button type="submit" class="btn btn-primary btn-block mb-3">Daftar</button>
                        </form>
                        {{-- </a> --}}
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

@section('js')
    <script>
        $(document).ready( function () {
            $('.select').on('change', function() {
                var tahun = $(this).val();
                var data = tahun.split("/");
                var id = $(this).attr('data-value');

                $('#tahun-' + id).val(data[1]);
            })
        });
    </script>
@endsection