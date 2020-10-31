@extends('layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css"> --}}
@endsection

@section('judul')
    Riwayat Penelitian & Pengabdian
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
        <!-- left column -->
        <div class="col-md-12">

            <!-- skema penelitian -->
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Penelitian</h3>
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
                    <table id="table-penelitian" class="table zero-configuration table-striped table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 60%">Judul</th>
                                <th>Skema Usulan</th>
                                <th style="width: 15%">Tahun Pelaksanaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penelitian as $item)
                                <tr>
                                    <td><a href="#modalPenelitian" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->judul }}</a></td>
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
            <!-- /.card -->
  
            <!-- skema pengabdian -->
            <!-- general form elements -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Pengabdian</h3>
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
                    <table id="table-pengabdian" class="table zero-configuration table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 60%">Judul</th>
                                <th>Skema Usulan</th>
                                <th style="width: 15%">Tahun Pelaksanaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengabdian as $item)
                                <tr>
                                    <td><a href="#modalPengabdian" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->judul }}</a></td>
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
                    <h4 class="modal-title" id="penelitian-label">Detail Penelitian</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-text">
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Judul</dt>
                            <dd class="col-sm-8" id="judul-penelitian">Implementasi Komik Interaktif Cerita Rakyat Cupak Grantang dengan Bahasa Isyarat berbasis Mobile</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Tim Peneliti</dt>
                            <dd class="col-sm-8">
                                <dl class="row">
                                    <dt class="col-sm-3 text-md-right">Ketua</dt>
                                    <dd class="col-sm-9" id="ketua-penelitian"></dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-sm-3 mb-0 text-md-right">Anggota</dt>
                                    <dd class="col-sm-9 mb-0">
                                        <ul class="list-unstyled" id="anggota-penelitian">
                                      
                                        </ul>
                                    </dd>
                                </dl>
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Skema</dt>
                            <dd class="col-sm-8" id="skema-penelitian">PPDS Batch 1</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Tahun Usulan</dt>
                            <dd class="col-sm-8" id="tahun-usulan-penelitian">2020</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Tahun Penelitian</dt>
                            <dd class="col-sm-8" id="tahun-pelaksanaan-penelitian">2020</dd>
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
                            <dd class="col-sm-8" >Pelatihan Teknologi Komputer Dasar DI Taman Belajar Anak Br Pedahan Kaja Desa Tianyar Tengah, Kecamatan Kubu, Karangasem</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Tim Peneliti</dt>
                            <dd class="col-sm-8">
                                <dl class="row">
                                    <dt class="col-sm-3 text-md-right">Ketua</dt>
                                    <dd class="col-sm-9">Airi Satou</dd>
                                </dl>
                                <dl class="row mb-0">
                                    <dt class="col-sm-3 mb-0 text-md-right">Anggota</dt>
                                    <dd class="col-sm-9 mb-0">
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
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script>
        $('#table-penelitian').DataTable({
            responsive: true
        });

        $('#table-pengabdian').DataTable({
            responsive: true
        });

        $(document).ready( function () {
            $(document).on('click', '#table-penelitian tbody tr td a', function(e) {
                var id = $(this).attr('data-value');
                $.get( "/usulan/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);  
                    $('#judul-penelitian').html(d.judul);
                    $('#ketua-penelitian').html(d.ketua.nama);
                    for (var i = 0; i < d.anggota.length; i++) {
                        $('#anggota-penelitian').html('<li>'+d.anggota[i].dosen_nama+'</li>');
                    }
                    $('#skema-penelitian').html(d.skema_usulan.nama);
                    $('#tahun-usulan-penelitian').html(d.skema_usulan.tahun_skema);
                    $('#tahun-pelaksanaan-penelitian').html(d.skema_usulan.tahun_pelaksanaan);
                    
                });
            });

            $(document).on('click', '#table-pengabdian tbody tr td a', function(e) {
                var id = $(this).attr('data-value');
                $.get( "/usulan/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#myModalLabel33').text(d.nama + " | Detail Dosen");
                    $('#nidn-field').val(d.nidn);
                    $('#nidn').text(d.nidn);
                    $('#nama').text(d.nama);
                    $('#alamat').text(d.alamat);
                    $('#tempat_lahir').text(d.tempat_lahir);
                    $('#tanggal_lahir').text(d.tanggal_lahir);
                    $('#jabatan_fungsional').text(d.jabatan_fungsional_nama);
                    $('#ktp').text(d.ktp);
                    $('#telepon').text(d.telepon);
                    $('#hp').text(d.hp);
                    $('#email').text(d.email);
                    $('#web').text(d.web);
                    $('#sinta_id').text(d.sinta_id);
                    $('#google_scholar_id').html('<a href="https://scholar.google.com/citations?user=' + d.google_scholar_id + '&hl=id" target="_blank" rel="noopener noreferrer">' + d.google_scholar_id + '</a>');
                });
                console.log($(this).attr('data-value'));
            });
        } );
    </script>
@endsection