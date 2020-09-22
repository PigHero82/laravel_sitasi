@extends('layout')

@section('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css"> --}}
@endsection

@section('judul')
    Persetujuan Personil
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
            {{ session('success') }}
        </div>
    @endif

    @if ($message = Session::get('danger'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
            {{ session('danger') }}
        </div>
    @endif

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">

          <!-- skema penelitian -->
          <!-- general form elements -->
          <div class="card bg-danger text-white">
            <div class="card-header">
              <h3 class="card-title text-white">Usulan Penelitian</h3>
              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                  <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                  </ul>
                </div>
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

          <!-- skema pengabdian -->
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Usulan Pengabdian</h3>
              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                  <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                  </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-content collapse show">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table zero-configuration table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="width: 50%">Judul</th>
                                    <th>Peran</th>
                                    <th>Nama Ketua</th>
                                    <th>Skema Usulan</th>
                                    <th>Tahun Pelaksanaan</th>
                                    <th colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="#modalPengabdian" data-toggle="modal">Pelatihan Teknologi Komputer Dasar DI Taman Belajar Anak Br Pedahan Kaja Desa Tianyar Tengah, Kecamatan Kubu, Karangasem</a></td>
                                    <td>Anggota</td>
                                    <td>Airi Satou</td>
                                    <td>PKM STIKI Peduli (Tahunan) Batch 1</td>
                                    <td>2020</td>
                                    <td>
                                        <a href="#"><div class="btn btn-success" id="confirm-pengabdian">Setuju</div></a>
                                    </td>
                                    <td>
                                        <a href="#"><div class="btn btn-danger" id="decline-pengabdian">Tidak Setuju</div></a>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Judul</th>
                                    <th>Peran</th>
                                    <th>Nama Ketua</th>
                                    <th>Skema Usulan</th>
                                    <th>Tahun Pelaksanaan</th>
                                    <th colspan="2">Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
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
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Detail Usulan Penelitian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#">
                        <div class="modal-body">
                            <div class="card-text">
                                <dl class="row">
                                    <dt class="col-sm-4 text-md-right">Judul</dt>
                                    <dd class="col-sm-8">Pelatihan Teknologi Komputer Dasar DI Taman Belajar Anak Br Pedahan Kaja Desa Tianyar Tengah, Kecamatan Kubu, Karangasem</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-4 text-md-right">Ketua Peneliti</dt>
                                    <dd class="col-sm-8">Airi Satou</dd>
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
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-success" id="confirm-penelitian-popup">Setuju</button>
                            <button type="button" class="btn btn-danger" id="decline-penelitian-popup">Tidak Setuju</button>
                        </div>
                    </form>
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
                    <form action="#">
                        <div class="modal-body">
                            <div class="card-text">
                                <dl class="row">
                                    <dt class="col-sm-4 text-md-right">Judul</dt>
                                    <dd class="col-sm-8">Pelatihan Teknologi Komputer Dasar DI Taman Belajar Anak Br Pedahan Kaja Desa Tianyar Tengah, Kecamatan Kubu, Karangasem</dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-4 text-md-right">Ketua Pengabdi</dt>
                                    <dd class="col-sm-8">Airi Satou</dd>
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
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-success" id="confirm-pengabdian-popup">Setuju</button>
                            <button type="button" class="btn btn-danger" id="decline-pengabdian-popup">Tidak Setuju</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('js')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/extensions/sweet-alerts.js') }}"></script>
    <!-- END: Page JS-->
@endsection