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
            <h3 class="card-title">Step 2 - Anggota</h3>

            <div class="card-tools">
                <a href="#inlineForm" class="btn btn-outline-success 
                @if (count($usulanAnggota)+1 >= $skema->jumlah)
                    disabled
                @endif
                " data-toggle="modal"><i class="fas fa-plus"></i> Tambah</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body mt-2">
            <h3>ANGGOTA DOSEN</h3>
            <p class="text-secondary mb-2 
                @if (count($usulanAnggota)+1 >= $skema->jumlah)
                    text-danger
                @endif
            ">{{ count($usulanAnggota)+1 }} dari {{ $skema->jumlah }} anggota</p>
            <a href="#modalPenelitian" data-toggle="modal"></a>
            {{-- <div class="row">
                <div class="col-sm-3 col-6">
                    <fieldset class="form-label-group form-group position-relative input-divider-left">
                        <input type="text" class="form-control" id="iconLeftDivider" placeholder="Cari NIDN">
                        <label for="iconLeftDivider">Cari NIDN</label>
                    </fieldset>
                </div>
                <div class="col-sm-3 col-6 pl-0">
                    <button class="btn btn-success px-1"><i class="feather icon-search"></i> Cari</button>
                </div>
            </div> --}}
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>NIDN</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>Jabatan Fungsional</th>
                            <th>Peran Personil</th>
                            <th>Alokasi Waktu<br><span class="text-secondary">(jam/minggu)</span></th>
                            <th>Konfirmasi Status</th>
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
                                <td>{{ $item->waktu }} jam/minggu</td>
                                @if ($item->status == 1)
                                    <td class="badge badge-pill badge-warning mt-1"><i class="feather icon-clock"></i> {{ $item->status_nama }}</td>
                                @elseif ($item->status == 2)
                                    <td class="badge badge-pill badge-success mt-1"><i class="feather icon-check"></i> {{ $item->status_nama }}</td>
                                @elseif ($item->status == 3)
                                    <td class="badge badge-pill badge-danger mt-1"><i class="feather icon-check"></i> {{ $item->status_nama }}</td>
                                @endif
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
    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
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
                            <select name="dosen_id" class="form-control select2" required>
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
                        
                        <div class="form-group">
                            <label for="firstName1">Alokasi Waktu <span class="text-secondary">(jam/minggu)</span></label>
                            <input type="number" class="form-control" name="waktu" required>
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

@endsection

@section('js')
    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/forms/select/form-select2.js"></script>
    <!-- END: Page JS-->
@endsection