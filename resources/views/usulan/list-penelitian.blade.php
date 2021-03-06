@extends('layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css"> --}}
@endsection

@section('judul')
    Riwayat Penelitian
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
                    <div id="filter">
                        <div class="form-group" id="select-filter-skema">
                        <label>Pilih Skema Penelitian: </label>
                        <select class="form-control" id="filter-skema">
                            <option value="">Semua skema</option>
                            @foreach($skema->reverse() as $s)
                            <option value="{{ $s->tahun_skema . ' - ' . $s->kode }}">{{ $s->tahun_skema . ' - ' . $s->kode }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="col-md-12 text-md-right" >
                        <h4> Jumlah usulan: <span id="jumlah-data"></span></h4>
                    </div>
                    <div class="table-responsive">
                    <table id="table-penelitian" class="table zero-configuration table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            {{-- <th>Progress</th> --}}
                                            <th rowspan="2">Judul</th>
                                            <th rowspan="2">Ketua Pelaksana</th>
                                            <th rowspan="2">Skema Usulan</th>
                                            <th class="text-center" rowspan="1" colspan="3">Nilai</th>
                                            <th rowspan="2">Anggaran yang Diusulkan</th>
                                            <th rowspan="2">Anggaran yang Disetujui</th>
                                            <th rowspan="2">Tahun Pelaksanaan</th>
                                            <th rowspan="2">Status Review</th>
                                        </tr>
                                        <tr>
                                            <th>Seminar Proposal</th>
                                            <th>Monev</th>
                                            <th>Seminar Hasil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penelitian as $item)
                                            @php
                                            $nilai = [
                                                0 => 0,
                                                1 => 0,
                                                2 => 0
                                            ];
                                            $total = 0;
                                            foreach ($item->rab as $key => $value) {
                                                $total  += $value->total;
                                            }
                                            @endphp
                                            @foreach($item->penilaian as $it)
                                                @if($it->penilaian_tahap_id == 1)
                                                @php
                                                    $nilai[0] += ($it->nilai/5)*$it->bobot;
                                                @endphp
                                                @endif
                                                @if($it->penilaian_tahap_id == 2)
                                                @php
                                                    $nilai[1] += ($it->nilai/5)*$it->bobot;
                                                @endphp
                                                @endif
                                                @if($it->penilaian_tahap_id == 3)
                                                @php
                                                    $nilai[2] += ($it->nilai/5)*$it->bobot;
                                                @endphp
                                                @endif
                                            @endforeach
                                            <tr>
                                                {{-- <td>
                                                    <div class="progress progress-bar-success progress-lg mb-0">
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="20" aria-valuemin="20" aria-valuemax="100" style="width:20%"></div>
                                                    </div>
                                                    <div class="badge badge-pill badge-glow badge-success block">20% | Lengkap</div>
                                                </td> --}}
                                                <td><a href="#modal" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->judul }}</a></td>
                                                <td>{{ $item->ketua }}</td>
                                                <td>{{ $item->skema_usulan->tahun_skema . ' - ' . $item->skema_usulan->kode }}</td>

                                                @if($nilai[0] == 0)
                                                    <td>-</td>
                                                @else
                                                    <td>{{ $nilai[0] }}/100</td>
                                                @endif
                                                @if($nilai[1] == 0)
                                                    <td>-</td>
                                                @else
                                                    <td>{{ $nilai[1] }}/100</td>
                                                @endif
                                                @if($nilai[2] == 0)
                                                    <td>-</td>
                                                @else
                                                    <td>{{ $nilai[2] }}/100</td>
                                                @endif

                                                <td>{{ number_format($total, 0, '.', ',') }}</td>
                                                <td>{{ number_format((($nilai[0]/100) * $item->dana_maksimal), 0, '.', ',')}}</td>

                                                <td>{{ $item->skema_usulan->tahun_pelaksanaan }}</td>
                                                <td>
                                                    @if ($item->nilai == 0)
                                                        <h5 class="text-warning"><i class="feather icon-clock"></i>Menunggu review</h5>
                                                    @elseif ($item->nilai == 1)
                                                        <h5 class="text-success"><i class="feather icon-check"></i>Selesai</h5>
                                                    @endif
                                                </td>
                                                {{-- <td><h3 class="text-danger"><i class="feather icon-x"></i></h3></td> --}}
                                                {{-- <td><h3 class="text-warning"><i class="feather icon-clock"></i></h3></td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            {{-- <th>Progress</th> --}}
                                            <th rowspan="2">Judul</th>
                                            <th rowspan="2">Ketua Pelaksana</th>
                                            <th rowspan="2">Skema Usulan</th>
                                            <th class="text-center" rowspan="1" colspan="3">Nilai</th>
                                            <th rowspan="2">Anggaran yang Diusulkan</th>
                                            <th rowspan="2">Anggaran yang Disetujui</th>
                                            <th rowspan="2">Tahun Pelaksanaan</th>
                                            <th rowspan="2">Status Review</th>
                                        </tr>
                                        <tr>
                                            <th>Seminar Proposal</th>
                                            <th>Monev</th>
                                            <th>Seminar Hasil</th>
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
                            <dt class="col-sm-4 text-md-right">Nilai Proposal</dt>
                            <dd class="col-sm-8" id="nilai-proposal">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Nilai Monev</dt>
                            <dd class="col-sm-8" id="nilai-monev">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Nilai Hasil</dt>
                            <dd class="col-sm-8" id="nilai-hasil">-</dd>
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
@endsection

@section('js')
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script>
        var tabel = $('#table-penelitian').DataTable({
            responsive: true,
            "order": [[2, "desc"]],
            dom: '<"top row" <"col-md-4"l><"col-md-4 text-center"p><"col-md-4 text-md-right"fB>>rt<"bottom row"<"col-md-4"l><"col-md-4"p>><"clear">',
            buttons: {
                buttons: [
                    { extend: 'excel', className: 'excelButton btn btn-success btn-sm' }
                ]
            }
        });

        $('#filter-skema').on('change',function(){
            var val = $(this).val();
            tabel.column(2).search( val ? '^'+$(this).val()+'$' : val, true, false ).draw();
            var info = tabel.page.info();
      
            $("#jumlah-data").html(info.recordsDisplay);
        });

        $(document).ready( function () {
            var info = tabel.page.info();
      
            $("#jumlah-data").html(info.recordsDisplay);
            $(document).on('click', '#table-penelitian tbody tr td a', function(e) {
                var id = $(this).attr('data-value');
                $.get( "/usulan/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#label').text('Detail Penelitian');
                    $('#jenis').text('Penelitian');
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
                    for (var i = 0; i < d.berkas.length; i++) {
                        if (d.berkas[i]['jenis_berkas_id'] == 1) {
                            $('#berkas-proposal').html('<a href="/' + d.berkas[i]['berkas'] + '">Berkas Proposal</a>')
                        } else if (d.berkas[i]['jenis_berkas_id'] == 2) {
                            $('#berkas-laporan-kemajuan').html('<a href="/' + d.berkas[i]['berkas'] + '">Berkas Laporan Kemajuan</a>')
                        } else if (d.berkas[i]['jenis_berkas_id'] == 3) {
                            $('#berkas-laporan-akhir').html('<a href="/' + d.berkas[i]['berkas'] + '">Berkas Laporan Akhir</a>')
                        } else if (d.berkas[i]['jenis_berkas_id'] == 4) {
                            $('#berkas-laporan-anggaran').html('<a href="/' + d.berkas[i]['berkas'] + '">Berkas Laporan Anggaran</a>')
                        }
                    }
                });
            });
        });
    </script>
@endsection