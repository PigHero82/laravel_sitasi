@extends('layout')

@section('judul')
    Usulan | {{ $usulan->tahun_skema }} - {{ $usulan->kode }}
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/select/select2.min.css') }}">
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
            <h3 class="card-title">Step 2 - Anggota <br><small>{{ count($usulanAnggota)+count($usulanMahasiswa) }} dari {{ $skema->jumlah-1 }} anggota</small></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body mt-2">
            <div class="row justify-content-between">
                <div class="col">
                    <h3>ANGGOTA DOSEN</h3>
                    <p class="text-secondary
                        @if (count($usulanAnggota)+1 >= $skema->jumlah)
                            text-danger mb-0
                        @else
                            mb-2
                        @endif
                    ">{{ count($usulanAnggota) }} dosen</p>
                    @if (count($usulanAnggota)+count($usulanMahasiswa)+1 >= $skema->jumlah)
                        <p class="text-secondary mb-2 text-danger">Tidak dapat menambahkan anggota baru</p>
                    @endif
                </div>
                <div class="col text-right">
                    <a href="#inlineForm" class="btn btn-outline-success
                    @if (count($usulanAnggota)+count($usulanMahasiswa)+1 >= $skema->jumlah)
                        disabled
                    @endif
                    " data-toggle="modal"><i class="fas fa-plus"></i> Tambah</a>
                </div>
            </div>
            <a href="#modalPenelitian" data-toggle="modal"></a>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>NIDN</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>Jabatan Fungsional</th>
                            <th>Peran Personil</th>
                            <th>Status Konfirmasi</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usulanAnggota as $item)
                            <tr>
                                <th>{{ $item->nidn }}</th>
                                <td>{{ $item->dosen_nama }}</td>
                                <td>{{ $item->prodi_nama }}</td>
                                <td>{{ $item->jabatan_nama }}</td>
                                <td>{{ $item->peran_nama }}</td>
                                <td>
                                    @if ($item->status == 0)
                                        <i class="feather icon-clock text-warning"></i> {{ $item->status_nama }}
                                    @elseif ($item->status == 1)
                                        <i class="feather icon-check text-success"></i> {{ $item->status_nama }}
                                    @elseif ($item->status == 2)
                                        <i class="feather icon-x text-danger"></i> {{ $item->status_nama }}
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('dosen.usulan.anggota.destroy', $item->id)}}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{ $item->dosen_nama }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="padding: 0; border: none; background: none;" class="action-edit text-danger" title="Hapus"><i class="feather icon-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="row justify-content-between">
                <div class="col">
                    <h3>ANGGOTA MAHASISWA</h3>
                    <p class="text-secondary
                        @if (count($usulanMahasiswa)+1 >= $skema->jumlah)
                            text-danger mb-0
                        @else
                            mb-2
                        @endif
                    ">{{ count($usulanMahasiswa) }} mahasiswa</p>
                    @if (count($usulanAnggota)+count($usulanMahasiswa)+1 >= $skema->jumlah)
                        <p class="text-secondary mb-2 text-danger">Tidak dapat menambahkan mahasiswa baru</p>
                    @endif
                </div>
                <div class="col text-right">
                    <a href="#inlineFormMahasiswa" class="btn btn-outline-success
                    @if (count($usulanAnggota)+count($usulanMahasiswa)+1 >= $skema->jumlah)
                        disabled
                    @endif
                    " data-toggle="modal"><i class="fas fa-plus"></i> Tambah</a>
                </div>
            </div>
            <a href="#modalPenelitian" data-toggle="modal"></a>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usulanMahasiswa as $item)
                            <tr>
                                <th>{{ $item->nim }}</th>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    <form action="{{ route('dosen.usulan.mahasiswa.destroy', $item->id)}}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{ $item->nama }}?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="padding: 0; border: none; background: none;" class="action-edit text-danger" title="Hapus"><i class="feather icon-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer row">
            <form action="{{ route('dosen.usulan.backward') }}" method="post" class="col-6">
                @csrf
                <button type="submit" class="btn btn-warning px-1">Kembali</button>
            </form>
            <form action="{{ route('dosen.usulan.update', $usulan->id) }}" method="post" class="col-6 text-right">
                @csrf
                @method('PATCH')
                <input type="hidden" name="step" value="3">
                <button type="submit" class="btn btn-success px-1">Lanjut</a>
            </form>
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->

    <!-- Modal -->
    <div class="modal fade text-left" id="inlineForm" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Tambah Anggota</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('dosen.usulan.anggota') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Dosen</label>
                            <select name="dosen_id" class="select2 form-control" required>
                                <option value="" hidden>-- Pilih dosen</option>
                                @foreach ($dosen as $item)
                                    @if ($item->nidn != Auth::user()->nidn)
                                        <option value="{{ $item->id }}">{{ $item->nidn }} - {{ $item->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Peran</label>
                            <select name="peran_id" class="form-control" required>
                                <option value="" hidden>-- Pilih peran</option>
                                @foreach ($peran as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="usulan_id" value="{{ $usulan->id }}">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade text-left" id="inlineFormMahasiswa" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Tambah Mahasiswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('dosen.usulan.mahasiswa') }}" method="POST">
                    @csrf
                    <div class="modal-body mt-1">
                        <fieldset class="form-label-group">
                            <input type="number" class="form-control" name="nim" placeholder="NIM">
                            <label>NIM</label>
                        </fieldset>

                        <fieldset class="form-label-group">
                            <input type="text" class="form-control" name="nama" placeholder="Nama">
                            <label>Nama</label>
                        </fieldset>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="usulan_id" value="{{ $usulan->id }}">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/forms/select/form-select2.js') }}"></script>
    <!-- END: Page JS-->

    <script>
        $(document).ready( function () {
            $('form').submit(function() {
                $(this).find("button[type='submit']").prop('disabled', true);
            });
        });
    </script>
@endsection
