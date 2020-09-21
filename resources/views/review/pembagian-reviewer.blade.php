@extends('layout')

@section('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css"> --}}
@endsection

@section('judul')
    Pembagian Reviewer
@endsection

@section('content')
    @if(session()->get('success'))
        <div class ="alert alert-success">
            {{ session()->get('success') }}  
        </div><br />
    @endif
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">

          <!-- skema penelitian -->
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Usulan Penelitian</h3>
              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                  <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                  </ul>
              </div>

              <div class="card-tools mr-3">
                <a href="#" class="btn btn-outline-success"><i class="fas fa-sync-alt"></i> Acak Reviewer</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-content collapse show">
                <div class="card-body">
                    <table id="myTable" class="table zero-configuration table-striped table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 50%">Judul</th>
                                <th>Skema Usulan</th>
                                <th>Tahun Pelaksanaan</th>
                                <th>Reviewer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#modalPenelitian" data-toggle="modal">Implementasi Komik Interaktif Cerita Rakyat Cupak Grantang dengan Bahasa Isyarat berbasis Mobile</a></td>
                                <td>2020 - Penelitian 1</td>
                                <td>2020</td>
                                <td>Airi Satou</td>
                            </tr>
                            <tr>
                                <td><a href="#modalPenelitian" data-toggle="modal">Penerapan Extreme Programming pada Sistem Pengarsipan Lembaga Penelitian dan Pengabdian Masyarakat STMIK STIKOM Indonesia</a></td>
                                <td>2020 - Penelitian 1</td>
                                <td>2020</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td><a href="#modalPenelitian" data-toggle="modal">Analisa Prosodi Lirik Pupuh Pucung pada Software Speech Synthesis Mbrola</a></td>
                                <td>2020 - Penelitian 1</td>
                                <td>2020</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td><a href="#modalPenelitian" data-toggle="modal">Implementasi Metode Certainty Factor Untuk Diagnosa Penyakit Mata Merah Visus Turun Pada Manusia</a></td>
                                <td>2020 - Penelitian 1</td>
                                <td>2020</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td><a href="#modalPenelitian" data-toggle="modal">Education Data Mining pada E-Learning STMIK STIKOM Indonesia Menggunakan Metode Fuzzy C-Means dan Algoritma Apriori</a></td>
                                <td>2020 - Penelitian 1</td>
                                <td>2020</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Judul</th>
                                <th>Skema Usulan</th>
                                <th>Tahun Pelaksanaan</th>
                                <th>Reviewer</th>
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
              <h3 class="card-title">Usulan Pengabdian</h3>
              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                  <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                  </ul>
              </div>

              <div class="card-tools mr-3">
                <a href="#" class="btn btn-outline-success"><i class="fas fa-sync-alt"></i> Acak Reviewer</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-content collapse show">
                <div class="card-body">
                    <table id="myTable" class="table zero-configuration table-striped table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 50%">Judul</th>
                                <th>Skema Usulan</th>
                                <th>Tahun Pelaksanaan</th>
                                <th>Reviewer</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#modalPengabdian" data-toggle="modal">Pelatihan Teknologi Komputer Dasar DI Taman Belajar Anak Br Pedahan Kaja Desa Tianyar Tengah, Kecamatan Kubu, Karangasem</a></td>
                                <td>2020 - Pengabdian 1</td>
                                <td>2020</td>
                                <td>Garrett Winters</td>
                            </tr>
                            <tr>
                                <td><a href="#modalPengabdian" data-toggle="modal">Implementasi dan Pengelolaan Mobile Based E-complaint System Bagi Masyarakat Desa Kukuh Kecamatan Kerambitan Kabupaten Tabanan</a></td>
                                <td>2020 - Pengabdian 1</td>
                                <td>2020</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td><a href="#modalPengabdian" data-toggle="modal">Pelatihan Media Pembelajaran Guru SD 1 Pesaban berbasis daring</a></td>
                                <td>2020 - Pengabdian 1</td>
                                <td>2020</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td><a href="#modalPengabdian" data-toggle="modal">PKM Perbekel Desa Kukuh Kecamata Kerambitan Kabupaten Tabanan</a></td>
                                <td>2020 - Pengabdian 1</td>
                                <td>2020</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td><a href="#modalPengabdian" data-toggle="modal">PKM Penerapan Sistem Informasi Manajemen Dalam Peningkatan Kualitas Pengelolaan Data Penjualan BUMDes Kukuh Winangun</a></td>
                                <td>2020 - Pengabdian 1</td>
                                <td>2020</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Judul</th>
                                <th>Skema Usulan</th>
                                <th>Tahun Pelaksanaan</th>
                                <th>Reviewer</th>
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
                                <dt class="col-sm-4 text-md-right">Reviewer</dt>
                                <dd class="col-sm-8">Airi Satou</dd>
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
                        <hr/>
                        <form action="#" method="POST">
                            <dl class="row mb-0">
                                <dt class="col-sm-4 text-md-right">Reviewer</dt>
                                <dd class="col-sm-8">
                                    <div class="form-group">
                                        <select class="form-control" name="" id="">
                                            <option value="" hidden="">--Pilih Reviewer</option>
                                            <option value="">Airi Satou - 0894370767</option>
                                            <option value="">Ashton Cox - 0864093620</option>
                                            <option value="">Cedric Kelly - 0813584614</option>
                                            <option value="">Garrett Winters - 0843098017</option>
                                            <option value="">Tiger Nixon - 0898841078</option>
                                        </select>
                                    </div>
                                </dd>
                            </dl>

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Pilih Acak</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Ubah</button>
                            </div>
                        </form>
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
                                <dt class="col-sm-4 text-md-right">Reviewer</dt>
                                <dd class="col-sm-8">Garrett Winters</dd>
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
                        <hr/>
                        <form action="#" method="POST">
                            <dl class="row mb-0">
                                <dt class="col-sm-4 text-md-right">Reviewer</dt>
                                <dd class="col-sm-8">
                                    <div class="form-group">
                                        <select class="form-control" name="" id="">
                                            <option value="" hidden="">--Pilih Reviewer</option>
                                            <option value="">Airi Satou - 0894370767</option>
                                            <option value="">Ashton Cox - 0864093620</option>
                                            <option value="">Cedric Kelly - 0813584614</option>
                                            <option value="">Garrett Winters - 0843098017</option>
                                            <option value="">Tiger Nixon - 0898841078</option>
                                        </select>
                                    </div>
                                </dd>
                            </dl>

                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Pilih Acak</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Ubah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')
@endsection