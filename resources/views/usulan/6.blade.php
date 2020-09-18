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
                <h3 class="card-title">Step 6 - Jadwal</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <h3>Daftar Kegiatan Penelitian</h3>
                <hr>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Kegiatan</th>
                                <th>Urutan Tahun</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <div class="data">
                                <tr class="text-center">
                                    <td>1</td>
                                    <td>Test Kegiatan</td>
                                    <td>1</td>
                                    <td>1 Januari 2020</td>
                                    <td>2 Januari 2020</td>
                                    <td class="text-danger"><i class="feather icon-x"></i></td>
                                </tr>
                                <tr class="text-center">
                                    <td>2</td>
                                    <td>Test Kegiatan</td>
                                    <td>1</td>
                                    <td>1 Januari 2020</td>
                                    <td>2 Januari 2020</td>
                                    <td class="text-danger"><i class="feather icon-x"></i></td>
                                </tr>
                            </div>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="text" placeholder="Masukkan Nama Kegiatan" class="form-control">
                                </td>
                                <td>
                                    <select name="" id="" class="form-control">
                                        <option value="">Tahun ke 2</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control">
                                </td>
                                <td>
                                    <input type="text" class="form-control">
                                </td>
                                <td>
                                    <button class="btn btn-success px-1"><i class="feather icon-plus"></i> Tambah</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="container mt-3">
                    <h3>Timeline Kegiatan Penelitian</h3>
                    <hr>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th colspan="5">Januari</th>
                                    <th colspan="5">Februari</th>
                                    <th colspan="5">Maret</th>
                                    <th colspan="5">April</th>
                                    <th colspan="5">Mei</th>
                                    <th colspan="5">Juni</th>
                                </tr>
                                <tr class="text-center">
                                    <th>Minggu ke 1</th>
                                    <th>Minggu ke 2</th>
                                    <th>Minggu ke 3</th>
                                    <th>Minggu ke 4</th>
                                    <th>Minggu ke 5</th>
                                    <th>Minggu ke 1</th>
                                    <th>Minggu ke 2</th>
                                    <th>Minggu ke 3</th>
                                    <th>Minggu ke 4</th>
                                    <th>Minggu ke 5</th>
                                    <th>Minggu ke 1</th>
                                    <th>Minggu ke 2</th>
                                    <th>Minggu ke 3</th>
                                    <th>Minggu ke 4</th>
                                    <th>Minggu ke 5</th>
                                    <th>Minggu ke 1</th>
                                    <th>Minggu ke 2</th>
                                    <th>Minggu ke 3</th>
                                    <th>Minggu ke 4</th>
                                    <th>Minggu ke 5</th>
                                    <th>Minggu ke 1</th>
                                    <th>Minggu ke 2</th>
                                    <th>Minggu ke 3</th>
                                    <th>Minggu ke 4</th>
                                    <th>Minggu ke 5</th>
                                    <th>Minggu ke 1</th>
                                    <th>Minggu ke 2</th>
                                    <th>Minggu ke 3</th>
                                    <th>Minggu ke 4</th>
                                    <th>Minggu ke 5</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('dosen.usulan.5') }}" class="btn btn-warning px-1">Kembali</a>
                <div class="float-right">
                    <a href="{{ route('dosen.usulan.7') }}" class="btn btn-success px-1">Lanjut</a>
                </div>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    <!-- general form elements -->

@endsection