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
        <div class="col-xl-6 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                    <div>
                        <h2 class="text-bold-700 mb-0">1</h2>
                        <p>Jumlah Penelitian dan Pengabdian yang harus direview</p>
                    </div>
                    <div class="avatar bg-rgba-info p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-bar-chart-2 text-info font-medium-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <div class="col-xl-6 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                    <div>
                        <h2 class="text-bold-700 mb-0">0</h2>
                        <p>Jumlah yang telah direview</p>
                    </div>
                    <div class="avatar bg-rgba-warning p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-pie-chart text-warning font-medium-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title mb-0">Review Usulan</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">

            <!-- skema penelitian -->
            <!-- general form elements -->
            <div class="card bg-danger text-white">
              <div class="card-header">
                <h3 class="card-title text-white">Usulan Penelitian</h3>

                {{-- <div class="card-tools">
                    <a href="#" class="btn btn-outline-success">
                        Lihat Semua
                    </a>
                </div> --}}
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
            <!-- /.card -->
  
            <!-- skema pengabdian -->
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Usulan Pengabdian</h3>

                <div class="card-tools">
                    <a href="#" class="btn btn-outline-success">
                        Lihat Semua
                    </a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-content collapse show">
                  <div class="card-body">
                    <table id="myTable" class="table zero-configuration table-striped table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 60%">Judul</th>
                                <th>Skema Usulan</th>
                                <th>Tahun Pelaksanaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#modalPengabdian" data-toggle="modal">Pelatihan Teknologi Komputer Dasar DI Taman Belajar Anak Br Pedahan Kaja Desa Tianyar Tengah, Kecamatan Kubu, Karangasem</a></td>
                                <td>2020 - Pengabdian 1</td>
                                <td>2020</td>
                            </tr>
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
                        <h4 class="modal-title" id="myModalLabel33">Detail Usulan Penelitian</h4>
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
@endsection