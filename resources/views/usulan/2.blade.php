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
                <h3 class="card-title">Step 2 - Anggota</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body mt-2">
                <h3>ANGGOTA DOSEN</h3>
                <p class="text-secondary mb-2">0 Dari 1 (Minimal 1)</p>
                <div class="row">
                    <div class="col-sm-3 col-6">
                        <fieldset class="form-label-group form-group position-relative input-divider-left">
                            <input type="text" class="form-control" id="iconLeftDivider" placeholder="Cari NIDN">
                            <label for="iconLeftDivider">Cari NIDN</label>
                        </fieldset>
                    </div>
                    <div class="col-sm-3 col-6 pl-0">
                        <button class="btn btn-success px-1"><i class="feather icon-search"></i> Cari</button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NIDN</th>
                                <th>Nama</th>
                                <th>Program Studi</th>
                                <th>Jenjang Pendidikan</th>
                                <th>Jabatan Fungsional</th>
                                <th>Peran Personil</th>
                                <th>Alokasi Waktu<br><span class="text-secondary">(jam/minggu)</span></th>
                                <th>Konfirmasi Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>123456</th>
                                <td>Leanne Graham</td>
                                <td>Teknik Elektro</td>
                                <td>S-3</td>
                                <td>Asisten Ahli</td>
                                <td>
                                    <select name="" id="" class="form-control">
                                        <option value=""></option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="" id="" class="form-control" placeholder="jam/minggu">
                                </td>
                                <td>Belum</td>
                                <td>
                                    <div class="row">
                                        <div class="col-6">
                                            <button type="button" class="btn btn-success px-1">Tambah</button>
                                        </div>
                                        <div class="col-6">
                                            <button type="button" class="btn btn-danger px-1">Batal</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <form action="{{ route('dosen.usulan.backward') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-warning px-1">Kembali</button>
                </form>
                <div class="float-right">
                    <a href="{{ route('dosen.usulan.3') }}" class="btn btn-success px-1">Lanjut</a>
                </div>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    <!-- general form elements -->

@endsection