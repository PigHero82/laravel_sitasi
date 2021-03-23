@extends('layout')

@section('judul')
    SITASI
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
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
        <div class="col-md-6 order-2 order-lg-1">
            <!-- general form elements -->
            @if(count($skema))
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Usulan yang Dapat Diajukan</h3>

                        <div class="card-tools">
                          <a href="{{ route('dosen.usulan.index') }}" class="btn btn-success">Ajukan Usulan</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="usulan" class="table zero-configuration table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Skema</th>
                                    <th>Jenis Usulan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($skema as $item)
                                    <tr>
                                        <td>{{ $item->tahun_skema . ' - ' . $item->kode }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>
                                            @isset($item->jenis)
                                                @if ($item->jenis == 1)
                                                    Penelitian
                                                @elseif ($item->jenis == 2)
                                                    Pengabdian
                                                @endif
                                            @endisset
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            @else
                <div class="card bg-danger text-white">
                    <div class="card-header">
                        <h3 class="card-title text-white">Usulan yang Dapat Diajukan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-content">
                        <div class="card-body text-center">
                            <h1 class="text-white"><i class="feather icon-alert-octagon"></i></h1>
                            <h4 class="card-title text-white">Tidak ada data</h4>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            @endif
            <!-- /.card -->
            <div class="row">
                <div class="col-12">
                @if((!count($penelitian)) && (!count($pengabdian)))
                <div class="card bg-danger text-white">
                    <div class="card-header">
                        <h3 class="card-title text-white">Usulan yang Dapat Diajukan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-content">
                        <div class="card-body text-center">
                            <h1 class="text-white"><i class="feather icon-alert-octagon"></i></h1>
                            <h4 class="card-title text-white">Tidak ada data</h4>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                @else
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Usulan yang Sedang Diajukan</h3>
                    </div>
                    <div class="card-body">
                        <table id="usulan-berjalan" class="table zero-configuration table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 60%;">Judul</th>
                                <th>Skema</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penelitian as $item)
                                @if($item->tahun_skema == date('Y'))
                                <tr>
                                    <td><a href="#modal-pengajuan" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->judul }}</a></td>
                                    <td>{{ $item->tahun_skema . ' - ' . $item->kode }}</td>
                                    <td>
                                        @if($item->step < 9)

                                        <form action="{{ route('dosen.usulan.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="skema_usulan_id" value="{{ $item->skema_usulan_id }}/{{ $item->tahun_skema }}">
                                            <input type="hidden" name="jenis" value="1">
                                            <input type="hidden" name="step" value="{{ $item->step }}">
                                            <button type="submit" class="btn btn-danger">Lanjutkan</button>
                                        </form>
                                        @else
                                        Telah diajukan
                                        @endif

                                    </td>

                                </tr>
                                @endif
                            @endforeach
                            @foreach ($pengabdian as $item)
                                @if($item->tahun_skema == date('Y'))
                                <tr>
                                    <td><a href="#modal-pengajuan" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->judul }}</a></td>
                                    <td>{{ $item->tahun_skema . ' - ' . $item->kode }}</td>
                                    <td>
                                        @if($item->step < 9)

                                        <form action="{{ route('dosen.usulan.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="skema_usulan_id" value="{{ $item->skema_usulan_id }}/{{ $item->tahun_skema }}">
                                            <input type="hidden" name="jenis" value="2">
                                            <input type="hidden" name="step" value="{{ $item->step }}">
                                            <button type="submit" class="btn btn-danger">Lanjutkan</button>
                                        </form>
                                        @else
                                        Telah diajukan
                                        @endif

                                    </td>

                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                @endif
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card text-center">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                    <div class="avatar-content">
                                        <i class="feather icon-bar-chart-2 text-info font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700">{{ $countPenelitian }}</h2>
                                <p class="mb-0 line-ellipsis">Total Penelitian</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card text-center">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="avatar bg-rgba-warning p-50 m-0 mb-1">
                                    <div class="avatar-content">
                                        <i class="feather icon-pie-chart text-warning font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700">{{ $countPengabdian }}</h2>
                                <p class="mb-0 line-ellipsis">Total Pengabdian</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 order-1 order-lg-2">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Informasi Pribadi</h3>

                      <div class="card-tools">
                        <a href="#" class="btn btn-success">Ubah Profil</a>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card-text">
                            <dl class="row">
                                <dt class="col-sm-3 text-right">Foto Profil</dt>
                                <dd class="col-sm-9">
                                    @isset ($composerUser->profile_photo_path)
                                        <img src="{{ asset($composerUser->profile_photo_path) }}" class="img-fluid" alt="Profile picture">
                                    @else
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png" class="img-fluid" alt="Profile picture">
                                    @endisset
                                </dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3 text-right">Nama</dt>
                                <dd class="col-sm-9">{{ $dosen->nama }}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3 text-right">NIDN</dt>
                                <dd class="col-sm-9">{{ $dosen->nidn }}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3 text-right">Email</dt>
                                <dd class="col-sm-9"><a href="mailto:{{ $dosen->email }}">{{ $dosen->email }}</a></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3 text-right">Link Google Scholar</dt>
                                <dd class="col-sm-9">
                                    @isset($dosen->google_scholar_id)
                                        <a href="https://scholar.google.com/citations?user={{ $dosen->google_scholar_id }}&hl=id">{{ $dosen->google_scholar_id }}</a>
                                    @else
                                        <a href="{{ route('profil.index') }}" class="text-danger">Ubah Profil Untuk Setting Link Google Scholar</a>
                                    @endisset
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!--/.col (left) -->
              </div>
              <!-- /.row -->
        </div>
    </div>

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title mb-0">Riwayat Penelitian & Pengabdian</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">

            <!-- skema penelitian -->
            <!-- general form elements -->
            @if(count($penelitian))
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Penelitian</h3>

                        <div class="card-tools">
                            <a href="{{ route('dosen.usulan.riwayat') }}" class="btn btn-success">
                                Lihat Semua
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <table id="tablePenelitian" class="table zero-configuration table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 60%">Judul</th>
                                        <th>Skema Usulan</th>
                                        <th>Tahun Pelaksanaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($penelitian as $item)
                                        <tr>
                                            <td><a href="#modal" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->judul }}</a></td>
                                            <td>{{ $item->skema_usulan->tahun_skema . ' - ' . $item->skema_usulan->kode }}</td>
                                            <td>{{ $item->skema_usulan->tahun_pelaksanaan }}</td>
                                        </tr>
                                    @empty
                                            Tidak ada data
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Skema Usulan</th>
                                        <th>Tahun Pelaksanaan</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            @else
                <div class="card bg-danger text-white">
                    <div class="card-header">
                        <h3 class="card-title text-white">Daftar Penelitian</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-content collapse show">
                        <div class="card-body text-center">
                            <h1 class="text-white"><i class="feather icon-alert-octagon"></i></h1>
                            <h4 class="card-title text-white">Tidak ada data</h4>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            @endif
            <!-- /.card -->

            <!-- skema pengabdian -->
            <!-- general form elements -->
            @if (count($pengabdian))
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Pengabdian</h3>

                        <div class="card-tools">
                            <a href="{{ route('dosen.usulan.riwayat') }}" class="btn btn-success">
                                Lihat Semua
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <table id="tablePengabdian" class="table zero-configuration table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 60%">Judul</th>
                                        <th>Skema Usulan</th>
                                        <th>Tahun Pelaksanaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengabdian as $item)
                                        <tr>
                                            <td><a href="#modal" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->judul }}</a></td>
                                            <td>{{ $item->skema_usulan->tahun_skema . ' - ' . $item->skema_usulan->kode }}</td>
                                            <td>{{ $item->skema_usulan->tahun_pelaksanaan }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Skema Usulan</th>
                                        <th>Tahun Pelaksanaan</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            @else
                <div class="card bg-danger text-white">
                    <div class="card-header">
                        <h3 class="card-title text-white">Daftar Pengabdian</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-content collapse show">
                        <div class="card-body text-center">
                            <h1 class="text-white"><i class="feather icon-alert-octagon"></i></h1>
                            <h4 class="card-title text-white">Tidak ada data</h4>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            @endif
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
    </div>
    <!-- /.row -->

    <!-- modal -->
    <div class="modal fade text-left" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="label">Detail</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-text">
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Judul</dt>
                            <dd class="col-sm-8" id="judul">-</dd>
                        </dl>
                        <dl class="row mb-0">
                            <dt class="col-sm-4 text-md-right">Tim Peneliti</dt>
                            <dd class="col-sm-8 ml-1 ml-md-0">
                                <dl class="row">
                                    <dt class="col-sm-3 text-md-right">Ketua</dt>
                                    <dd class="col-sm-9" id="ketua">-</dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-sm-3 mb-0 text-md-right">Anggota</dt>
                                    <dd class="col-sm-9 mb-0">
                                        <ul class="list-unstyled" id="anggota">-</ul>
                                    </dd>
                                </dl>
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Skema</dt>
                            <dd class="col-sm-8" id="skema">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Tahun Usulan</dt>
                            <dd class="col-sm-8" id="tahun-usulan">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Tahun Penelitian</dt>
                            <dd class="col-sm-8" id="tahun-pelaksanaan">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Jenis Usulan</dt>
                            <dd class="col-sm-8" id="jenis">Penelitian</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Proposal</dt>
                            <dd class="col-sm-8" id="berkas-proposal">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Laporan Kemajuan</dt>
                            <dd class="col-sm-8" id="berkas-laporan-kemajuan">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Laporan Akhir</dt>
                            <dd class="col-sm-8" id="berkas-laporan-akhir">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Laporan Anggaran</dt>
                            <dd class="col-sm-8" id="berkas-laporan-anggaran">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Laporan Belanja</dt>
                            <dd class="col-sm-8" id="berkas-laporan-belanja">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Laporan Publikasi</dt>
                            <dd class="col-sm-8" id="berkas-laporan-publikasi">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Link Publikasi/Google Scholar</dt>
                            <dd class="col-sm-8">-</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade text-left" id="modal-pengajuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="label">Detail Usulan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-text">
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Judul</dt>
                            <dd class="col-sm-8" id="judul-pengajuan">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Skema</dt>
                            <dd class="col-sm-8" id="skema-pengajuan">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Tahun Usulan</dt>
                            <dd class="col-sm-8" id="tahun-usulan-pengajuan">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Tahun Pelaksanaan</dt>
                            <dd class="col-sm-8" id="tahun-pelaksanaan-pengajuan"></dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Jenis Usulan</dt>
                            <dd class="col-sm-8" id="jenis-pengajuan">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Rencana Anggaran</dt>
                            <dd class="col-sm-8" id="anggaran-pengajuan">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Rencana Luaran</dt>
                            <dd class="col-sm-8" id="luaran-pengajuan">-</dd>
                        </dl>
                        <hr>

                        <div id="proposal" hidden>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Komentar</dt>
                                <dd class="col-sm-8" id="revisi-komentar-pengajuan">-</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Proposal</dt>
                                <dd class="col-sm-8" id="revisi-proposal-pengajuan">-</dd>
                            </dl>
                            <form action="#" method="post" id="form-proposal" enctype="multipart/form-data" hidden>
                                @csrf
                                @method('PATCH')
                                <dl class="row mb-0">
                                    <dt class="col-sm-4 text-md-right">Ubah Proposal</dt>
                                    <dd class="col-sm-8">
                                        <div class="custom-file mr-1">
                                            <input type="hidden" name="usulan_id" id="proposal-usulan-id" required>
                                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="surat_path" accept=".pdf" required>
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-4 text-md-right"></dt>
                                    <dd class="col-sm-8" id=""><button type="submit" class="btn btn-success"><i class="feather icon-edit-2"></i> Unggah Proposal</button></dd>
                                </dl>
                            </form>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">RAB</dt>
                                <dd class="col-sm-8" id="revisi-rab-pengajuan">-</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right"></dt>
                                <dd class="col-sm-8" id="revisi-rab-2-pengajuan">-</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Luaran</dt>
                                <dd class="col-sm-8" id="revisi-luaran-pengajuan">-</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right"></dt>
                                <dd class="col-sm-8" id="revisi-luaran-2-pengajuan"><a class="btn btn-warning" href="#"><i class="feather icon-edit-2"></i> Ubah Luaran</a></dd>
                            </dl>
                        </div>

                        <div id="monev" hidden>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Komentar</dt>
                                <dd class="col-sm-8" id="komentar-monev">-</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Laporan Kemajuan</dt>
                                <dd class="col-sm-8" id="lk-pengajuan">-</dd>
                            </dl>
                            <form action="#" method="post" id="form-monev" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <dl class="row mb-0">
                                    <dt class="col-sm-4 text-md-right">Upload Laporan Kemajuan</dt>
                                    <dd class="col-sm-8">
                                        <div class="custom-file mr-1">
                                            <input type="hidden" name="usulan_id" id="lk-usulan-id" required>
                                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="surat_path" accept=".pdf" required>
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-4 text-md-right"></dt>
                                    <dd class="col-sm-8" id=""><button type="submit" class="btn btn-success"><i class="feather icon-edit-2"></i> Unggah Laporan Kemajuan</button></dd>
                                </dl>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#tablePenelitian').DataTable({
                responsive: true,
                "order": [[1, "desc"]]
            })

            $('#tablePengabdian').DataTable({
                responsive: true,
                "order": [[1, "desc"]]
            })

            $('#usulan').DataTable()

            $('#usulan-berjalan').DataTable()

            $(document).on('click', '#tablePenelitian tbody tr td a', function(e) {
                var id = $(this).attr('data-value');
                $.get( "/usulan/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#label').text('Detail Penelitian');
                    $('#jenis').text('Penelitian');
                    $('#judul').html(d.judul);
                    $('#ketua').html(d.ketua);
                    for (var i = 0; i < d.anggota.length; i++) {
                        $('#anggota').html('<li>'+d.anggota[i].dosen_nama+'</li>');
                    }
                    $('#skema').html(d.skema_usulan.nama);
                    $('#tahun-usulan').html(d.skema_usulan.tahun_skema);
                    $('#tahun-pelaksanaan').html(d.skema_usulan.tahun_pelaksanaan);
                    $('#berkas-proposal').html('-');
                    $('#berkas-laporan-kemajuan').html('-');
                    $('#berkas-laporan-akhir').html('-');
                    $('#berkas-laporan-anggaran').html('-');
                    for (var i = 0; i < d.berkas.length; i++) {
                        if (d.berkas[i]['jenis_berkas_id'] == 1) {
                            $('#berkas-proposal').html('<a href="/' + d.berkas[i]['berkas'] + '" target="_blank">Berkas Proposal</a>')
                        } else if (d.berkas[i]['jenis_berkas_id'] == 2) {
                            $('#berkas-laporan-kemajuan').html('<a href="/' + d.berkas[i]['berkas'] + '" target="_blank">Berkas Laporan Kemajuan</a>')
                        } else if (d.berkas[i]['jenis_berkas_id'] == 3) {
                            $('#berkas-laporan-akhir').html('<a href="/' + d.berkas[i]['berkas'] + '" target="_blank">Berkas Laporan Akhir</a>')
                        } else if (d.berkas[i]['jenis_berkas_id'] == 4) {
                            $('#berkas-laporan-anggaran').html('<a href="/' + d.berkas[i]['berkas'] + '" target="_blank">Berkas Laporan Anggaran</a>')
                        }
                    }
                });
            });

            $(document).on('click', '#tablePengabdian tbody tr td a', function(e) {
                var id = $(this).attr('data-value');
                $.get( "/usulan/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#label').text('Detail Pengabdian');
                    $('#jenis').text('Pengabdian');
                    $('#judul').html(d.judul);
                    $('#ketua').html(d.ketua);
                    if(d.anggota.length > 0){
                        $('#anggota').html('');
                        for (var i = 0; i < d.anggota.length; i++) {
                            $('#anggota').append('<li>'+d.anggota[i].dosen_nama+'</li>');
                        }
                    }
                    $('#skema').html(d.skema_usulan.nama);
                    $('#tahun-usulan').html(d.skema_usulan.tahun_skema);
                    $('#tahun-pelaksanaan').html(d.skema_usulan.tahun_pelaksanaan);
                    $('#berkas-proposal').html('-');
                    $('#berkas-laporan-kemajuan').html('-');
                    $('#berkas-laporan-akhir').html('-');
                    $('#berkas-laporan-anggaran').html('-');
                    for (var i = 0; i < d.berkas.html; i++) {
                        if (d.berkas[i]['jenis_berkas_id'] == 1) {
                            $('#berkas-proposal').html('<a href="/' + d.berkas[i]['berkas'] + '" target="_blank">Berkas Proposal</a>')
                        } else if (d.berkas[i]['jenis_berkas_id'] == 2) {
                            $('#berkas-laporan-kemajuan').html('<a href="/' + d.berkas[i]['berkas'] + '" target="_blank">Berkas Laporan Kemajuan</a>')
                        } else if (d.berkas[i]['jenis_berkas_id'] == 3) {
                            $('#berkas-laporan-akhir').html('<a href="/' + d.berkas[i]['berkas'] + '" target="_blank">Berkas Laporan Akhir</a>')
                        } else if (d.berkas[i]['jenis_berkas_id'] == 4) {
                            $('#berkas-laporan-anggaran').html('<a href="/' + d.berkas[i]['berkas'] + '" target="_blank">Berkas Laporan Anggaran</a>')
                        }
                    }
                });
            });

            $(document).on('click', '#usulan-berjalan tbody tr td a', function(e) {
                var id = $(this).attr('data-value');
                $('#berkas-proposal-pengajuan').html('-');
                $.get( "/usulan/" + id, function(data) {
                    var d = JSON.parse(data);
                    console.log(d);
                    $('#jenis-pengajuan').text('Penelitian');
                    if(d.jenis == 2){
                        $('#jenis-pengajuan').text('Pengabdian');
                    }
                    $('#judul-pengajuan').html(d.judul);
                    $('#skema-pengajuan').html(d.skema_usulan.nama);
                    $('#tahun-usulan-pengajuan').html(d.skema_usulan.tahun_skema);
                    $('#tahun-pelaksanaan-pengajuan').html(d.skema_usulan.tahun_pelaksanaan);
                    $('#anggaran-pengajuan').html(formatRupiah(''+d.usulan_dana, 'Rp. '));
                    $('#luaran-pengajuan').html('');
                    for(var l = 0; l < d.luaran.length;l++){
                        $('#luaran-pengajuan').append('<li>'+d.luaran[l].nama_luaran+'</li>')
                    }

                    $('#proposal').attr('hidden', true)
                    $('#monev').attr('hidden', true)
                    $('#hasil').attr('hidden', true)

                    /*
                        ------------ Proposal ------------
                    */
                    if (d.step == 9) {
                        $('#proposal').removeAttr('hidden')
                        $('#revisi-komentar-pengajuan').empty()
                        for (let i = 0; i < d.komentar.length; i++) {
                            if (d.komentar[i].penilaian_tahap_id == 1) {
                                $('#revisi-komentar-pengajuan').text(d.komentar[i].komentar)
                            } else {
                                $('#revisi-komentar-pengajuan').text('-')
                            }
                        }

                        $('#revisi-proposal-pengajuan').empty()
                        for (var i = 0; i < d.berkas.length; i++) {
                            if (d.berkas[i]['jenis_berkas_id'] == 1) {

                                $('#revisi-proposal-pengajuan').html('<a href="/' + d.berkas[i]['berkas'] + '" target="_blank">Berkas Proposal</a>');
                                console.log(d.berkas[i]);
                                $('#form-proposal').attr('action', '{{ url("dosen/usulan/revisi/proposal") }}/' + id)
                                $('#proposal-usulan-id').val(d.id);
                                i = d.berkas.length + 1;
                            } else {
                                $('#revisi-proposal-pengajuan').text('-')
                                $('#form-proposal').attr('action', '#')
                                $('#proposal-usulan-id').val()
                            }
                        }

                        $('#revisi-rab-pengajuan').empty()
                        $('#revisi-rab-2-pengajuan').empty()
                        if (d.rab.length > 0) {
                            $('#revisi-rab-pengajuan').html('<a href="/dosen/usulan/rab/' + d.id + '" target="_blank">Lihat RAB</a>')
                            $('#revisi-rab-2-pengajuan').html('<a class="btn btn-warning" href="/dosen/usulan/rab/' + d.id + '#ubah"><i class="feather icon-edit-2"></i> Ubah RAB</a>')
                        } else if(d.nilai > 0){
                            $('#revisi-rab-pengajuan').html('<a href="/dosen/usulan/rab/' + d.id + '" target="_blank">Lihat RAB</a>')
                            $('#revisi-rab-2-pengajuan').html('<a class="btn btn-warning" href="/dosen/usulan/rab/' + d.id + '#ubah"><i class="feather icon-edit-2"></i> Ubah RAB</a>')
                        }
                        else{
                            $('#revisi-rab-pengajuan').text('-')
                            $('#revisi-rab-2-pengajuan').text('-')
                        }

                        $('#revisi-luaran-pengajuan').empty()
                        $('#revisi-luaran-2-pengajuan').empty()
                        if (d.luaran.length > 0) {
                            $('#revisi-luaran-pengajuan').html('<a href="/dosen/usulan/luaran/' + d.id + '" target="_blank">Lihat Luaran</a>')
                            $('#revisi-luaran-2-pengajuan').html('<a class="btn btn-warning" href="/dosen/usulan/luaran/' + d.id + '#ubah"><i class="feather icon-edit-2"></i> Ubah Luaran</a>')
                        } else {
                            $('#revisi-luaran-pengajuan').text('-')
                            $('#revisi-luaran-2-pengajuan').text('-')
                        }

                    /*
                        ------------ MONEV ------------
                    */
                    } else if(d.step == 10) {
                        $('#monev').removeAttr('hidden')
                        $('#komentar-monev').empty()
                        for (let i = 0; i < d.komentar.length; i++) {
                            if (d.komentar[i].penilaian_tahap_id == 2) {
                                $('#komentar-monev').text(d.komentar[i].komentar)
                            } else {
                                $('#komentar-monev').text('-')
                            }
                        }

                        $('#lk-pengajuan').empty()
                        $('#lk-usulan-id').val(d.id)
                        for (var i = 0; i < d.berkas.length; i++) {
                            if (d.berkas[i]['jenis_berkas_id'] == 2) {
                                $('#lk-pengajuan').html('<a href="/' + d.berkas[i]['berkas'] + '" target="_blank">Berkas Laporan Kemajuan</a>');
                                $('#form-monev').attr('action', '{{ url("dosen/usulan/revisi/laporan-kemajuan") }}/' + id)
                                console.log(d.berkas[i])
                                i = d.berkas.length + 1
                            }
                            else {
                                $('#lk-pengajuan').text('-');
                                $('#form-monev').attr('action', '{{ url("dosen/usulan/laporan-kemajuan") }}/' + id)
                            }
                        }

                    /*
                        ------------ Hasil ------------
                    */
                    } else if(d.step == 12) {
                        $('#hasil').removeAttr('hidden')

                    }
                });
            });
        });
    </script>
@endsection
