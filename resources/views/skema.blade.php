@extends('layout')

@section('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css"> --}}
@endsection

@section('judul')
    Skema Usulan
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="feather icon-check mr-1 align-middle"></i><span>{{ $message }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
            </button>
        </div>
    @endif

    @if ($message = Session::get('danger'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="feather icon-x mr-1 align-middle"></i><span>{{ $message }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Error</h4>
            <p class="mb-0">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </p>
        </div>
    @endif

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">

          <!-- skema penelitian -->
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Skema Penelitian</h3>
              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                  <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                  </ul>
              </div>

              <div class="card-tools mr-3">
                  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-create-penelitian">
                      <i class="fas fa-plus"></i> Tambah
                  </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-content collapse show">
                <div class="card-body">
                    <table id="penelitianTable" class="table zero-configuration" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 30%">Kode</th>
                                <th>Nama Skema</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($skemaPenelitian as $item)
                                <tr>
                                    <td><a href="#modal-update-penelitian" data-toggle="modal">{{ $item->tahun_skema . ' - ' . $item->kode }}</a></td>
                                    <td>{{ $item->nama }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Skema</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- skema pengabdian -->
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Skema Pengabdian</h3>
              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                  <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                  </ul>
              </div>

              <div class="card-tools mr-3">
                  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal-create-pengabdian">
                      <i class="fas fa-plus"></i> Tambah
                  </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-content collapse show">
                <div class="card-body">
                    <table id="pengabdianTable" class="table zero-configuration" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 30%">Kode</th>
                                <th>Nama Skema</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($skemaPengabdian as $item)
                                <tr>
                                    <td><a href="#modal-update-pengabdian" data-toggle="modal">{{ $item->tahun_skema . ' - ' . $item->kode }}</a></td>
                                    <td>{{ $item->nama }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Skema</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->

        <!-- modal create penelitian -->
        <div class="modal fade text-left" id="modal-create-penelitian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Tambah Skema Penelitian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.skema.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Skema</label>
                                        <input type="number" name="jenis" value="1" hidden>
                                        <select class="form-control" name="skema_id" required>
                                            <option value="" hidden>--Pilih skema</option>
                                            @foreach ($skema as $item)
                                                @if ($item->jenis == 1)
                                                    <option value="{{ $item->id }}">{{ $item->kode }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jumlah Peneliti</label>
                                        <select class="form-control" name="jumlah" required>
                                            <option value="" hidden>--Pilih jumlah peneliti</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tahun_skema">Tahun Skema</label>
                                        <select class="form-control" name="tahun_skema" required>
                                            <option value="" hidden>--Pilih tahun skema</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') }}">{{ Carbon\Carbon::now()->format('Y') }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 1 }}">{{ Carbon\Carbon::now()->format('Y') + 1 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 2 }}">{{ Carbon\Carbon::now()->format('Y') + 2 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 3 }}">{{ Carbon\Carbon::now()->format('Y') + 3 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 4 }}">{{ Carbon\Carbon::now()->format('Y') + 4 }}</option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tahun_penelitian">Tahun Penelitian</label>
                                        <select class="form-control" name="tahun_penelitian" required>
                                            <option value="" hidden>--Pilih tahun penelitian</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') }}">{{ Carbon\Carbon::now()->format('Y') }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 1 }}">{{ Carbon\Carbon::now()->format('Y') + 1 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 2 }}">{{ Carbon\Carbon::now()->format('Y') + 2 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 3 }}">{{ Carbon\Carbon::now()->format('Y') + 3 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 4 }}">{{ Carbon\Carbon::now()->format('Y') + 4 }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_usulan">Tanggal Usulan</label>
                                        <input type="date" class="form-control" name="tanggal_usulan" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_review">Tanggal Review</label>
                                        <input type="date" class="form-control" name="tanggal_review" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_laporan_kemajuan">Tanggal Laporan Kemajuan</label>
                                        <input type="date" class="form-control" name="tanggal_laporan_kemajuan" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_laporan_akhir">Tanggal Laporan Akhir</label>
                                        <input type="date" class="form-control" name="tanggal_laporan_akhir" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_publikasi">Tanggal Publikasi</label>
                                        <input type="date" class="form-control" name="tanggal_publikasi" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dana_maksimal">Dana Maksimal</label>
                                        <input type="number" class="form-control" name="dana_maksimal" placeholder="Dana Maksimal" min="0">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Jabatan Minimal</label>
                                    <div class="form-group">
                                        <select class="form-control" name="jabatan_minimal">
                                            <option value="0">Tidak ada</option>
                                            @foreach ($jabatan as $item)
                                                <option value="{{ $item->level }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Jabatan Maksimal</label>
                                    <div class="form-group">
                                        <select class="form-control" name="jabatan_maksimal">
                                            <option value="99">Tidak ada</option>
                                            @foreach ($jabatan as $item)
                                                <option value="{{ $item->level }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- modal create pengabdian -->
        <div class="modal fade text-left" id="modal-create-pengabdian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Tambah Skema Pengabdian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.skema.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Skema</label>
                                        <input type="number" name="jenis" value="2" hidden>
                                        <select class="form-control" name="skema_id" required>
                                            <option value="" hidden>--Pilih skema</option>
                                            @foreach ($skema as $item)
                                                @if ($item->jenis == 2)
                                                    <option value="{{ $item->id }}">{{ $item->kode }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jumlah Pengabdi</label>
                                        <select class="form-control" name="jumlah" required>
                                            <option value="" hidden>--Pilih jumlah pengabdi</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tahun_skema">Tahun Skema</label>
                                        <select class="form-control" name="tahun_skema" required>
                                            <option value="" hidden>--Pilih tahun skema</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') }}">{{ Carbon\Carbon::now()->format('Y') }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 1 }}">{{ Carbon\Carbon::now()->format('Y') + 1 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 2 }}">{{ Carbon\Carbon::now()->format('Y') + 2 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 3 }}">{{ Carbon\Carbon::now()->format('Y') + 3 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 4 }}">{{ Carbon\Carbon::now()->format('Y') + 4 }}</option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tahun_penelitian">Tahun Pengabdian</label>
                                        <select class="form-control" name="tahun_penelitian" required>
                                            <option value="" hidden>--Pilih tahun penelitian</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') }}">{{ Carbon\Carbon::now()->format('Y') }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 1 }}">{{ Carbon\Carbon::now()->format('Y') + 1 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 2 }}">{{ Carbon\Carbon::now()->format('Y') + 2 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 3 }}">{{ Carbon\Carbon::now()->format('Y') + 3 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 4 }}">{{ Carbon\Carbon::now()->format('Y') + 4 }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_usulan">Tanggal Usulan</label>
                                        <input type="date" class="form-control" name="tanggal_usulan" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_review">Tanggal Review</label>
                                        <input type="date" class="form-control" name="tanggal_review" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_laporan_kemajuan">Tanggal Laporan Kemajuan</label>
                                        <input type="date" class="form-control" name="tanggal_laporan_kemajuan" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_laporan_akhir">Tanggal Laporan Akhir</label>
                                        <input type="date" class="form-control" name="tanggal_laporan_akhir" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_publikasi">Tanggal Publikasi</label>
                                        <input type="date" class="form-control" name="tanggal_publikasi" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dana_maksimal">Dana Maksimal</label>
                                        <input type="number" class="form-control" name="dana_maksimal" placeholder="Dana Maksimal" min="0">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Jabatan Minimal</label>
                                    <div class="form-group">
                                        <select class="form-control" name="jabatan_minimal">
                                            <option value="0">Tidak ada</option>
                                            @foreach ($jabatan as $item)
                                                <option value="{{ $item->level }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Jabatan Maksimal</label>
                                    <div class="form-group">
                                        <select class="form-control" name="jabatan_maksimal">
                                            <option value="99">Tidak ada</option>
                                            @foreach ($jabatan as $item)
                                                <option value="{{ $item->level }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- modal update penelitian -->
        <div class="modal fade text-left" id="modal-update-penelitian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Tambah Skema Penelitian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.skema.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Skema</label>
                                        <input type="number" name="jenis" value="1" hidden>
                                        <select class="form-control" name="skema_id" required>
                                            <option value="" hidden>--Pilih skema</option>
                                            @foreach ($skema as $item)
                                                @if ($item->jenis == 1)
                                                    <option value="{{ $item->id }}">{{ $item->kode }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jumlah Peneliti</label>
                                        <select class="form-control" name="jumlah" required>
                                            <option value="" hidden>--Pilih jumlah peneliti</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tahun_skema">Tahun Skema</label>
                                        <select class="form-control" name="tahun_skema" required>
                                            <option value="" hidden>--Pilih tahun skema</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') }}">{{ Carbon\Carbon::now()->format('Y') }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 1 }}">{{ Carbon\Carbon::now()->format('Y') + 1 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 2 }}">{{ Carbon\Carbon::now()->format('Y') + 2 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 3 }}">{{ Carbon\Carbon::now()->format('Y') + 3 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 4 }}">{{ Carbon\Carbon::now()->format('Y') + 4 }}</option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tahun_penelitian">Tahun Penelitian</label>
                                        <select class="form-control" name="tahun_penelitian" required>
                                            <option value="" hidden>--Pilih tahun penelitian</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') }}">{{ Carbon\Carbon::now()->format('Y') }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 1 }}">{{ Carbon\Carbon::now()->format('Y') + 1 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 2 }}">{{ Carbon\Carbon::now()->format('Y') + 2 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 3 }}">{{ Carbon\Carbon::now()->format('Y') + 3 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 4 }}">{{ Carbon\Carbon::now()->format('Y') + 4 }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_usulan">Tanggal Usulan</label>
                                        <input type="date" class="form-control" name="tanggal_usulan" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_review">Tanggal Review</label>
                                        <input type="date" class="form-control" name="tanggal_review" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_laporan_kemajuan">Tanggal Laporan Kemajuan</label>
                                        <input type="date" class="form-control" name="tanggal_laporan_kemajuan" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_laporan_akhir">Tanggal Laporan Akhir</label>
                                        <input type="date" class="form-control" name="tanggal_laporan_akhir" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_publikasi">Tanggal Publikasi</label>
                                        <input type="date" class="form-control" name="tanggal_publikasi" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dana_maksimal">Dana Maksimal</label>
                                        <input type="number" class="form-control" name="dana_maksimal" placeholder="Dana Maksimal" min="0">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Jabatan Minimal</label>
                                    <div class="form-group">
                                        <select class="form-control" name="jabatan_minimal">
                                            <option value="0">Tidak ada</option>
                                            @foreach ($jabatan as $item)
                                                <option value="{{ $item->level }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Jabatan Maksimal</label>
                                    <div class="form-group">
                                        <select class="form-control" name="jabatan_maksimal">
                                            <option value="99">Tidak ada</option>
                                            @foreach ($jabatan as $item)
                                                <option value="{{ $item->level }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- modal update pengabdian -->
        <div class="modal fade text-left" id="modal-update-pengabdian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Tambah Skema Pengabdian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('admin.skema.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Skema</label>
                                        <input type="number" name="jenis" value="2" hidden>
                                        <select class="form-control" name="skema_id" required>
                                            <option value="" hidden>--Pilih skema</option>
                                            @foreach ($skema as $item)
                                                @if ($item->jenis == 2)
                                                    <option value="{{ $item->id }}">{{ $item->kode }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jumlah Pengabdi</label>
                                        <select class="form-control" name="jumlah" required>
                                            <option value="" hidden>--Pilih jumlah pengabdi</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tahun_skema">Tahun Skema</label>
                                        <select class="form-control" name="tahun_skema" required>
                                            <option value="" hidden>--Pilih tahun skema</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') }}">{{ Carbon\Carbon::now()->format('Y') }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 1 }}">{{ Carbon\Carbon::now()->format('Y') + 1 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 2 }}">{{ Carbon\Carbon::now()->format('Y') + 2 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 3 }}">{{ Carbon\Carbon::now()->format('Y') + 3 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 4 }}">{{ Carbon\Carbon::now()->format('Y') + 4 }}</option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tahun_penelitian">Tahun Pengabdian</label>
                                        <select class="form-control" name="tahun_penelitian" required>
                                            <option value="" hidden>--Pilih tahun penelitian</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') }}">{{ Carbon\Carbon::now()->format('Y') }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 1 }}">{{ Carbon\Carbon::now()->format('Y') + 1 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 2 }}">{{ Carbon\Carbon::now()->format('Y') + 2 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 3 }}">{{ Carbon\Carbon::now()->format('Y') + 3 }}</option>
                                            <option value="{{ Carbon\Carbon::now()->format('Y') + 4 }}">{{ Carbon\Carbon::now()->format('Y') + 4 }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_usulan">Tanggal Usulan</label>
                                        <input type="date" class="form-control" name="tanggal_usulan" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_review">Tanggal Review</label>
                                        <input type="date" class="form-control" name="tanggal_review" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_laporan_kemajuan">Tanggal Laporan Kemajuan</label>
                                        <input type="date" class="form-control" name="tanggal_laporan_kemajuan" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_laporan_akhir">Tanggal Laporan Akhir</label>
                                        <input type="date" class="form-control" name="tanggal_laporan_akhir" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_publikasi">Tanggal Publikasi</label>
                                        <input type="date" class="form-control" name="tanggal_publikasi" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="dana_maksimal">Dana Maksimal</label>
                                        <input type="number" class="form-control" name="dana_maksimal" placeholder="Dana Maksimal" min="0">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Jabatan Minimal</label>
                                    <div class="form-group">
                                        <select class="form-control" name="jabatan_minimal">
                                            <option value="0">Tidak ada</option>
                                            @foreach ($jabatan as $item)
                                                <option value="{{ $item->level }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Jabatan Maksimal</label>
                                    <div class="form-group">
                                        <select class="form-control" name="jabatan_maksimal">
                                            <option value="99">Tidak ada</option>
                                            @foreach ($jabatan as $item)
                                                <option value="{{ $item->level }}">{{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('js')
    <script>
        $(document).ready( function () {
            $(document).on('click', '#myTable tbody tr td a', function(e) {
                var id = $(this).attr('data-value');
                $.get( "/admin/skema/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#penelitianModalLabel').text(d.nama + " | Detail");
                    $('#nama').val(d.nama);
                    $('#kepala-prodi').val(d.dosen);
                    $('#id').val(d.id);
                });
                console.log($(this).attr('data-value'));
            });
        });
    </script>
@endsection