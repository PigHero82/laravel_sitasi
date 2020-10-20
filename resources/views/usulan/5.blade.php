@extends('layout')

@section('judul')
    Usulan | {{ $usulan->tahun_skema }} - {{ $usulan->kode }}
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

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Step 5 - Rencana Anggaran</h3>
        </div>
        <!-- /.card-header -->
        <form action="{{ route('dosen.usulan.update', $usulan->id) }}" method="POST">
            @csrf
            @method('PATCH')
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
                <div class="card-footer row">
                    <div class="col-6">
                        <a class="btn btn-warning px-1" href="{{ route('dosen.usulan.backward') }}" onclick="event.preventDefault();
                        document.getElementById('backward-form').submit();">Kembali</a>
                    </div>
                    <div class="col-6 text-right">
                        {{-- <input type="hidden" name="step" value="6">
                        <input type="hidden" name="usulan_id" value="{{ $usulan->id }}"> --}}
                        <button type="submit" class="btn btn-success px-1">Lanjut</a>
                    </div>
                </div>
            <!-- /.card-footer -->
        </form>
    </div>
            
    <form id="backward-form" action="{{ route('dosen.usulan.backward') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <!-- /.card -->
<!-- general form elements -->

@endsection