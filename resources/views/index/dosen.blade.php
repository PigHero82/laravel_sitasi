@extends('layout')

@section('judul')
    SITASI
@endsection

@section('content')
    @if(session()->get('success'))
        <div class ="alert alert-success">
            {{ session()->get('success') }}  
        </div><br />
    @endif

    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            @if(count($skema))
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Usulan yang Dapat Diajukan</h3>
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
        </div>
        <!--/.col (left) -->

        <div class="col-md-6">
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
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="{{ asset($dosen->profile_photo_path) }}" alt="Profile picture">
                                        </div>
                                        <div class="col-12">
                                            <form action="#" method="post">
                                                <fieldset class="form-group">
                                                    <label for="basicInputFile"><strong>Ubah Foto</strong> *Maksimal Ukuran Foto 250Kb</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="inputGroupFile01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Unggah</button>
                                        </div>
                                    </div>
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
                                <dd class="col-sm-9">{{ $dosen->email }}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3 text-right">Link Google Scholar</dt>
                                <dd class="col-sm-9">
                                    @isset($dosen->google_scholar_id)
                                        <a href="https://scholar.google.com/citations?user={{ $dosen->google_scholar_id }}&hl=id">{{ $dosen->google_scholar_id }}</a>
                                    @else
                                        <a href="#" class="text-danger">Ubah Biodata Untuk Setting Link Google Scholar</a>
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

    <div class="row">
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-content">
                    <div class="card-body">
                        <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                            <div class="avatar-content">
                                <i class="feather icon-bar-chart-2 text-info font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700">279</h2>
                        <p class="mb-0 line-ellipsis">Total Penelitian Internal</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-content">
                    <div class="card-body">
                        <div class="avatar bg-rgba-warning p-50 m-0 mb-1">
                            <div class="avatar-content">
                                <i class="feather icon-pie-chart text-warning font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700">0</h2>
                        <p class="mb-0 line-ellipsis">Total Penelitian Eksternal</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-content">
                    <div class="card-body">
                        <div class="avatar bg-rgba-danger p-50 m-0 mb-1">
                            <div class="avatar-content">
                                <i class="feather icon-globe text-danger font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700">90</h2>
                        <p class="mb-0 line-ellipsis">Total Pengabdian Internal</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-content">
                    <div class="card-body">
                        <div class="avatar bg-rgba-primary p-50 m-0 mb-1">
                            <div class="avatar-content">
                                <i class="feather icon-users text-primary font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700">0</h2>
                        <p class="mb-0 line-ellipsis">Total Pengabdian Eksternal</p>
                    </div>
                </div>
            </div>
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
                            <a href="#" class="btn btn-outline-success">
                                Lihat Semua
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <table id="penelitian" class="table zero-configuration table-striped table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        @isset($penelitian)
                                            <th style="width: 60%">Judul</th>
                                            <th>Skema Usulan</th>
                                            <th>Tahun Pelaksanaan</th>
                                        @else
                                            <th>Judul</th>
                                            <th>Skema Usulan</th>
                                            <th>Tahun Pelaksanaan</th>
                                        @endisset
                                    </tr>
                                </thead>
                                <tbody>
                                    @isset($penelitian)
                                        @foreach ($penelitian as $item)
                                            <tr>
                                                <td><a href="#modalPenelitian" data-toggle="modal">{{ $item->judul }}</a></td>
                                                <td>{{ $item->tahun_skema . ' - ' . $item->kode }}</td>
                                                <td>{{ $item->tahun_penelitian . ' - ' . $item->kode }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                            Tidak ada data
                                    @endisset
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
                            <a href="#" class="btn btn-outline-success">
                                Lihat Semua
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <table id="pengabdian" class="table zero-configuration table-striped table-responsive" style="width:100%">
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
                                            <td><a href="#modalPengabdian" data-toggle="modal">{{ $item->judul }}</a></td>
                                            <td>{{ $item->tahun_skema . ' - ' . $item->kode }}</td>
                                            <td>{{ $item->tahun_penelitian . ' - ' . $item->kode }}</td>
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

        
    <!-- modal penelitian -->
    <div class="modal fade text-left" id="modalPenelitian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Detail Penelitian</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-text">
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Judul</dt>
                            <dd class="col-sm-8">Implementasi Komik Interaktif Cerita Rakyat Cupak Grantang dengan Bahasa Isyarat berbasis Mobile</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Tim Peneliti</dt>
                            <dd class="col-sm-8">
                                <dl class="row">
                                    <dt class="col-sm-3 text-md-right">Ketua</dt>
                                    <dd class="col-sm-9">Airi Satou</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3 text-md-right">Anggota</dt>
                                    <dd class="col-sm-9">
                                        <ul class="list-unstyled">
                                            <li>Ashton Cox</li>
                                            <li class="mt-1">Cedric Kelly</li>
                                            <li class="mt-1">Garrett Winters</li>
                                            <li class="mt-1">Tiger Nixon</li>
                                        </ul>
                                    </dd>
                                </dl>
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Skema</dt>
                            <dd class="col-sm-8">PPDS Batch 1</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Tahun Usulan</dt>
                            <dd class="col-sm-8">2020</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Tahun Penelitian</dt>
                            <dd class="col-sm-8">2020</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Jenis Usulan</dt>
                            <dd class="col-sm-8">Penelitian</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Proposal</dt>
                            <dd class="col-sm-8"><a href="#">Berkas Proposal</a></dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Laporan Kemajuan</dt>
                            <dd class="col-sm-8">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Laporan Akhir</dt>
                            <dd class="col-sm-8">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Laporan Anggaran</dt>
                            <dd class="col-sm-8">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Laporan Belanja</dt>
                            <dd class="col-sm-8">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Laporan Publikasi</dt>
                            <dd class="col-sm-8">-</dd>
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

    <!-- modal pengabdian -->
    <div class="modal fade text-left" id="modalPengabdian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Detail Usulan Pengabdian</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-text">
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Judul</dt>
                            <dd class="col-sm-8">Pelatihan Teknologi Komputer Dasar DI Taman Belajar Anak Br Pedahan Kaja Desa Tianyar Tengah, Kecamatan Kubu, Karangasem</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Tim Peneliti</dt>
                            <dd class="col-sm-8">
                                <dl class="row">
                                    <dt class="col-sm-3 text-md-right">Ketua</dt>
                                    <dd class="col-sm-9">Airi Satou</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3 text-md-right">Anggota</dt>
                                    <dd class="col-sm-9">
                                        <ul class="list-unstyled">
                                            <li>Ashton Cox</li>
                                            <li class="mt-1">Cedric Kelly</li>
                                            <li class="mt-1">Garrett Winters</li>
                                            <li class="mt-1">Tiger Nixon</li>
                                        </ul>
                                    </dd>
                                </dl>
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Skema</dt>
                            <dd class="col-sm-8">PKM STIKI Peduli (Tahunan) Batch 1</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Tahun Usulan</dt>
                            <dd class="col-sm-8">2020</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Tahun Penelitian</dt>
                            <dd class="col-sm-8">2020</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Jenis Usulan</dt>
                            <dd class="col-sm-8">Pengabdian</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Proposal</dt>
                            <dd class="col-sm-8"><a href="#">Berkas Proposal</a></dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Laporan Kemajuan</dt>
                            <dd class="col-sm-8">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Laporan Akhir</dt>
                            <dd class="col-sm-8">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Laporan Anggaran</dt>
                            <dd class="col-sm-8">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Laporan Belanja</dt>
                            <dd class="col-sm-8">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Laporan Publikasi</dt>
                            <dd class="col-sm-8">-</dd>
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
@endsection

@section('js')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/cards/card-statistics.js') }}"></script>
    <!-- END: Page JS-->

    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#skema').DataTable();
            $('#penelitian').DataTable();
            $('#pengabdian').DataTable();
        });
    </script>
@endsection