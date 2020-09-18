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
                <h3 class="card-title">Step 5 - Rencana Anggaran</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <h3>Tambah Item Anggaran Penelitian</h3>
                <hr>
                <div class="row justify-content-end">
                    <div class="col-sm-8">
                        <div class="form-group row">
                            <div class="col-md-2 col-4 text-right">
                                <span>Urutan Tahun :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <select name="program" class="form-control">
                                    <option value="">Tahun ke 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 col-4 text-right">
                                <span>Jenis :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <select name="program" class="form-control">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 col-4 text-right">
                                <span>Penggunaan :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <input type="text" name="jenis-publikasi" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 col-4 text-right">
                                <span>Nama Item :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <input type="text" name="jenis-publikasi" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 col-4 text-right">
                                <span>Detail Item :</span>
                            </div>
                            <div class="col-md-5 col-4">
                                <input type="text" name="jenis-publikasi" class="form-control">
                            </div>
                            <div class="col-md-4 col-4">
                                <input type="text" name="jenis-publikasi" class="form-control" placeholder="satuan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 col-4 text-right">
                            </div>
                            <div class="col-md-5 col-4">
                                <input type="text" name="jenis-publikasi" class="form-control">
                            </div>
                            <div class="col-md-4 col-4">
                                <input type="text" name="jenis-publikasi" class="form-control" placeholder="satuan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 col-4 text-right">
                            </div>
                            <div class="col-md-5 col-4">
                                <input type="text" name="jenis-publikasi" class="form-control">
                            </div>
                            <div class="col-md-4 col-4">
                                <input type="text" name="jenis-publikasi" class="form-control" placeholder="satuan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 col-4 text-right">
                                <span>Penggunaan :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <input type="text" name="jenis-publikasi" class="form-control" value="1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 col-4 text-right">
                                <span>Penggunaan :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <input type="text" name="jenis-publikasi" class="form-control" value="1" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 col-4 text-right">
                                
                            </div>
                            <div class="col-md-9 col-8">
                                <button class="btn btn-primary btn-block px-1"><i class="feather icon-plus"></i> Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>

                <h3>Daftar Item Anggaran Tahun ke 1</h3>
                <hr>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center align-middle my-auto">Jenis Pembelanjaan</th>
                                <th rowspan="2" class="text-center align-middle my-auto">Tahun</th>
                                <th rowspan="2" class="text-center align-middle my-auto">Penggunaan</th>
                                <th rowspan="2" class="text-center align-middle my-auto">Nama Item</th>
                                <th colspan="6" class="text-center">Volume</th>
                                <th rowspan="2" class="text-center align-middle my-auto">Total</th>
                                <th rowspan="2"></th>
                            </tr>
                            <tr>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Satuan</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Satuan</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Satuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>BELANJA BARANG NON OPERASIONAL LAINNYA</td>
                                <td>1</td>
                                <td>Konsumsi</td>
                                <td>Uang Makan</td>
                                <td>80</td>
                                <td>Orang</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Rp. 20.000</td>
                                <td>Rp. 1.000.000</td>
                                <td class="text-danger text-weight-bold"><i class="feather icon-x"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('dosen.usulan.4') }}" class="btn btn-warning px-1">Kembali</a>
                <div class="float-right">
                    <a href="{{ route('dosen.usulan.6') }}" class="btn btn-success px-1">Lanjut</a>
                </div>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    <!-- general form elements -->

@endsection