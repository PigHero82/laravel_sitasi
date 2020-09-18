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
                <h3 class="card-title">Step 7 - Kelengkapan Lain</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <h3>Tambah Mitra</h3>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Nama Mitra :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <input type="text" name="" id="" class="form-control" placeholder="Nama Mitra">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Nama Pimpinan :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <input type="text" name="" id="" class="form-control" placeholder="Nama Pimpinan">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Jenis :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <select name="program" class="form-control">
                                    <option value="">Perusahaan/Industri/CSR</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Institusi :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <input type="text" name="" id="" class="form-control" placeholder="Nama Institusi">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Negara :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <select name="program" class="form-control">
                                    <option value="">Indonesia</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Provinsi :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <select name="program" class="form-control">
                                    <option value="">Kalimantan Barat</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Kota :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <select name="program" class="form-control">
                                    <option value="">Kab. Badung</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Alamat Institusi :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <input type="text" name="jenis-publikasi" class="form-control" placeholder="Alamat Institusi">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>No Telepon :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <input type="text" name="jenis-publikasi" class="form-control" placeholder="081234567890">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>No Fax :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <input type="text" name="jenis-publikasi" class="form-control" placeholder="098765432">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>No HP :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <input type="text" name="jenis-publikasi" class="form-control" placeholder="082345678910">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Surel :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <input type="text" name="jenis-publikasi" class="form-control" placeholder="contoh@mail.com">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <span>Surat Pernyataan Mitra (pdf, maksimal 5 MB) :</span>
                            <input type="file" name="jenis-publikasi" class="form-control-file mt-1" placeholder="contoh@mail.com">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <button type="button" class="btn btn-success btn-block"><i class="feather icon-plus"></i> Tambah</button>
                    </div>
                </div>

                <h3>Tambah Dana Mitra Penelitian</h3>
                <hr>
                <div class="row justify-content-end">
                    <div class="col-sm-8">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Mitra :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <select name="program" class="form-control">
                                    <option value="">Test Mitra</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Urutan Tahun Usulan :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <select name="program" class="form-control">
                                    <option value="">Tahun ke 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Dana :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <input type="text" name="jenis-publikasi" class="form-control" value="1000000">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <button type="button" class="btn btn-success btn-block"><i class="feather icon-plus"></i> Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>

                <h3>Tambah Dana Lain Penelitian</h3>
                <hr>
                <div class="row justify-content-end">
                    <div class="col-sm-8">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Urutan Tahun Usulan :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <select name="program" class="form-control">
                                    <option value="">Tahun ke 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Dana Internal PT :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <input type="text" name="jenis-publikasi" class="form-control" value="1000000">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Inkind :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <input type="text" name="jenis-publikasi" class="form-control">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-8">
                                <button type="button" class="btn btn-success btn-block"><i class="feather icon-plus"></i> Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>

                <h3>Daftar Mitra</h3>
                <hr>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Institusi</th>
                                <th>Provinsi</th>
                                <th>Kota</th>
                                <th>Surat Pernyataan Mitra (pdf)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Test Mitra</td>
                                <td>Test Institusi</td>
                                <td>Kalimantan Barat</td>
                                <td>Kab. Kubu Raya</td>
                                <td>Sudah Unggah</td>
                                <td><i class="feather icon-x text-danger"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h3>Daftar Mitra Penelitian</h3>
                <hr>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun Usulan</th>
                                <th>Nama Institusi</th>
                                <th>Dana</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>2020</td>
                                <td>Test Institusi</td>
                                <td>Rp 1.000.000</td>
                                <td><i class="feather icon-x text-danger"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tahun Usulan</th>
                                <th>Dana Internal PT</th>
                                <th>Inkind</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>2020</td>
                                <td>Rp 2.000.000</td>
                                <td>Test</td>
                                <td><i class="feather icon-x text-danger"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('dosen.usulan.6') }}" class="btn btn-warning px-1">Kembali</a>
                <div class="float-right">
                    <a href="{{ route('dosen.usulan.8') }}" class="btn btn-success px-1">Lanjut</a>
                </div>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    <!-- general form elements -->

@endsection