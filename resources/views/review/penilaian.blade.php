@extends('layout')

@section('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css"> --}}
@endsection

@section('judul')
    Penilaian
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
            @if (count($penelitian))
                <!-- table -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Usulan Penelitian</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="text-warning">Menunggu review: {{ $datas->where('nilai',0)->where('jenis',1)->whereNotNull('judul')->count() }}</h5>
                            </div>
                            <div class="col-sm-6">
                                <h5 class="text-success">selesai: {{ $datas->where('nilai',1)->where('jenis',1)->whereNotNull('judul')->count() }}</h5>
                            </div>
                        </div>

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
                                <table id="table-penelitian" class="table zero-configuration table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            {{-- <th>Progress</th> --}}
                                            <th rowspan="2">Judul</th>
                                            <th rowspan="2">Ketua Pelaksana</th>
                                            <th rowspan="2">Anggota</th>
                                            <th rowspan="2">Skema Usulan</th>
                                            <th class="text-center" rowspan="1" colspan="3">Nilai</th>

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
                                                <td>
                                                    @forelse($item->anggota as $anggota)
                                                        <b>Anggota {{ $loop->index+1 }}: </b>{{ $anggota->dosen_nama }}
                                                    @empty
                                                        -
                                                    @endforelse
                                                </td>
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


                                                @if($total <= $item->skema_usulan->dana_maksimal)
                                                <td>{{ number_format((($nilai[0]/100) * $total), 0, '.', ',')}}</td>
                                                @else
                                                <td>{{ number_format((($nilai[0]/100) * $item->skema_usulan->dana_maksimal), 0, '.', ',')}}</td>
                                                @endif


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
                                            <th rowspan="2">Anggota</th>
                                            <th rowspan="2">Skema Usulan</th>
                                            <th class="text-center" rowspan="1" colspan="3">Nilai</th>

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
                <!-- /.table -->
            @else
                <!-- empty table -->
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
                <!-- /.empty table -->
            @endif

            <!-- skema pengabdian -->
            @if (count($pengabdian))
                <!-- table -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Usulan Pengabdian</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="text-warning">Menunggu review: {{ $datas->where('nilai',0)->where('jenis',2)->whereNotNull('judul')->count() }}</h5>
                            </div>
                            <div class="col-sm-6">
                                <h5 class="text-success">selesai: {{ $datas->where('nilai',1)->where('jenis',2)->whereNotNull('judul')->count() }}</h5>
                            </div>
                        </div>

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
                                <table id="table-pengabdian" class="table zero-configuration table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            {{-- <th>Progress</th> --}}
                                            <th rowspan="2">Judul</th>
                                            <th rowspan="2">Ketua Pelaksana</th>
                                            <th rowspan="2">Anggota</th>
                                            <th rowspan="2">Skema Usulan</th>
                                            <th class="text-center" rowspan="1" colspan="3">Nilai</th>

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
                                        @foreach ($pengabdian as $item)
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
<td>@forelse($item->anggota as $anggota)
<b>Anggota {{ $loop->index+1 }}: </b>{{ $anggota->dosen_nama }}
@empty
-
@endforelse</td>
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

                                                @if($total <= $item->skema_usulan->dana_maksimal)
                                                <td>{{ number_format((($nilai[0]/100) * $total), 0, '.', ',')}}</td>
                                                @else
                                                <td>{{ number_format((($nilai[0]/100) * $item->skema_usulan->dana_maksimal), 0, '.', ',')}}</td>
                                                @endif
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
                                            <th rowspan="2">Anggota</th>
                                            <th rowspan="2">Skema Usulan</th>
                                            <th class="text-center" rowspan="1" colspan="3">Nilai</th>
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
                <!-- /.table -->
            @else
                <!-- empty table -->
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
                <!-- /.empty table -->
            @endif

            <!-- modal -->
            <div class="modal fade text-left" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="label">Detail Usulan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card-text">
                                <form action="#" method="POST" id="modal-form">
                                    @csrf
                                    @method('PATCH')
                                    <dl class="row">
                                        <dt class="col-sm-4 text-md-right">Judul</dt>
                                        <dd class="col-sm-8" id="judul">-</dd>
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
                                        <dt class="col-sm-4 text-md-right">Tahun Pelaksanaan</dt>
                                        <dd class="col-sm-8" id="tahun-pelaksanaan"></dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-4 text-md-right">Jenis Usulan</dt>
                                        <dd class="col-sm-8" id="jenis">-</dd>
                                    </dl>
                                    {{-- <dl class="row">
                                        <dt class="col-sm-4 text-md-right">Progress</dt>
                                        <dd class="col-sm-8">
                                            <div class="progress progress-bar-success progress-lg mb-0">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="20" aria-valuemin="20" aria-valuemax="100" style="width:20%"></div>
                                            </div>
                                            <div class="badge badge-pill badge-glow badge-success block">20% | Lengkap</div>
                                        </dd>
                                    </dl> --}}
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
                                        <dt class="col-sm-4 text-md-right">Nilai</dt>
                                        <dd class="col-sm-8" id="nilai">-</dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-4 text-md-right">Komentar</dt>
                                        <dd class="col-sm-8" id="komentar">-</dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-4 text-md-right">Anggaran yang Diusulkan</dt>
                                        <dd class="col-sm-8" id="anggaran-diusulkan">-</dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-4 text-md-right">Anggaran yang Disetujui</dt>
                                        <dd class="col-sm-8" id="anggaran-disetujui">-</dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-4 text-md-right">Validasi Tahap Usulan</dt>
                                        <dd class="col-sm-8" id="anggaran-disetujui">
                                            <fieldset class="form-group">
                                                <select class="form-control" name="status" id="modal-status" required>
                                                    <option value hidden>--Pilih tahap</option>
                                                    @foreach ($tahap as $item)
                                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                    @endforeach
                                                </select>
                                            </fieldset>
                                        </dd>
                                    </dl>

                                    <div class="modal-footer">
                                        <div class="float-right">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/js/jszip.min.js') }}"></script>
<script src="{{ asset('js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready( function () {
        $('.anggota').each(function(){
            var txt = $.trim($(this).text());
            $(this).text(txt.replace(/  +/g,' '));
        });
        $('#table-penelitian').DataTable({
        responsive: true,
        dom: '<"top row" <"col-md-4"l><"col-md-4 text-center"p><"col-md-4 text-md-right"fB>>rt<"bottom row"<"col-md-4"l><"col-md-4"p>><"clear">',
        buttons: {
            buttons: [
                { extend: 'excel', className: 'excelButton btn btn-success btn-sm' }
            ]
        }
    });
        $('#table-pengabdian').DataTable({
        responsive: true,
        dom: '<"top row" <"col-md-4"l><"col-md-4 text-center"p><"col-md-4 text-md-right"fB>>rt<"bottom row"<"col-md-4"l><"col-md-4"p>><"clear">',
        buttons: {
            buttons: [
                { extend: 'excel', className: 'excelButton btn btn-success btn-sm' }
            ]
        }
    });
        $(document).on('click', '#table-penelitian tbody tr td a', function(e) {
            var id = $(this).attr('data-value');
            $.get( "/usulan/" + id, function( data ) {
                var d = JSON.parse(data);
                console.log(d);
                $('#label').text('Detail Penelitian');
                $('#jenis').text('Penelitian');
                $('#judul').html(d.judul);
                $('#skema').html(d.skema_usulan.nama);
                $('#tahun-usulan').html(d.skema_usulan.tahun_skema);
                $('#tahun-pelaksanaan').html(d.skema_usulan.tahun_pelaksanaan);
                var nilai = [0,0,0];
                var komentar = ['-','-','-'];
                for(var ni=0;ni<d.penilaian.length;ni++ ){
                    if(d.penilaian[ni].penilaian_tahap_id == 1){
                        nilai[0] += (d.penilaian[ni].nilai/5) *d.penilaian[ni].bobot;
                    }else if(d.penilaian[ni].penilaian_tahap_id == 2){
                        nilai[1] += (d.penilaian[ni].nilai/5) *d.penilaian[ni].bobot;
                    }else{
                        nilai[2] += (d.penilaian[ni].nilai/5) *d.penilaian[ni].bobot;
                    }

                }

                for (var i = d.komentar.length - 1; i >= 0; i--) {
                    if(d.komentar[i].penilaian_tahap_id == 1){
                        komentar[0] = d.komentar[i].komentar;
                    }else if(d.komentar[i].penilaian_tahap_id == 2){
                        komentar[1] = d.komentar[i].komentar;
                    }else{
                        komentar[2] = d.komentar[i].komentar;
                    }
                }
                var textnilai = '';
                var textkomentar = '';
                var tahap =['Proposal','Monev','Hasil'];
                for(var i=0; i<nilai.length;i++){
                    textnilai += '<b>Tahap '+ tahap[i] + ':</b> '+nilai[i] + '<br>';
                    textkomentar += '<b>Tahap '+tahap[i] + ':</b> '+komentar[i] + '<br>';
                }

                $('#nilai').html(textnilai);
                $('#komentar').html(textkomentar);


                var total = 0;
                for(var i=0;i<d.rab.length;i++){
                    total += d.rab[i].total;
                }
                var setuju =0;
                var bobot = 0;
                if(total <= d.skema_usulan.dana_maksimal){
                    setuju = Math.round((nilai[0]/100)*total);
                }else{
                    setuju = Math.round((nilai[0]/100)*d.skema_usulan.dana_maksimal);
                }
                $('#anggaran-diusulkan').text(formatRupiah(''+total, 'Rp. '));
                $('#anggaran-disetujui').text(formatRupiah(''+setuju, 'Rp. ')+ ' (' + nilai[0] +'%)');
                $('#modal-form').attr('action', '/admin/review/penilaian/' + id);
                $('#modal-status').val(d.nilai);
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

        $(document).on('click', '#table-pengabdian tbody tr td a', function(e) {
            var id = $(this).attr('data-value');
            $.get( "/usulan/" + id, function( data ) {
                console.log(JSON.parse(data));
                var d = JSON.parse(data);
                $('#label').text('Detail Pengabdian');
                $('#jenis').text('Pengabdian');
                $('#judul').html(d.judul);
                $('#skema').html(d.skema_usulan.nama);
                $('#tahun-usulan').html(d.skema_usulan.tahun_skema);
                $('#tahun-pelaksanaan').html(d.skema_usulan.tahun_pelaksanaan);
                var nilai = [0,0,0];
                var komentar = ['-','-','-'];
                for(var ni=0;ni<d.penilaian.length;ni++ ){
                    if(d.penilaian[ni].penilaian_tahap_id == 1){
                        nilai[0] += (d.penilaian[ni].nilai/5) *d.penilaian[ni].bobot;
                    }else if(d.penilaian[ni].penilaian_tahap_id == 2){
                        nilai[1] += (d.penilaian[ni].nilai/5) *d.penilaian[ni].bobot;
                    }else{
                        nilai[2] += (d.penilaian[ni].nilai/5) *d.penilaian[ni].bobot;
                    }

                }

                for (var i = d.komentar.length - 1; i >= 0; i--) {
                    if(d.komentar[i].penilaian_tahap_id == 1){
                        komentar[0] = d.komentar[i].komentar;
                    }else if(d.komentar[i].penilaian_tahap_id == 2){
                        komentar[1] = d.komentar[i].komentar;
                    }else{
                        komentar[2] = d.komentar[i].komentar;
                    }
                }
                var textnilai = '';
                var textkomentar = '';
                var tahap =['Proposal','Monev','Hasil'];
                for(var i=0; i<nilai.length;i++){
                    textnilai += '<b>Tahap '+ tahap[i] + ':</b> '+nilai[i] + '<br>';
                    textkomentar += '<b>Tahap '+tahap[i] + ':</b> '+komentar[i] + '<br>';
                }

                $('#nilai').html(textnilai);
                $('#komentar').html(textkomentar);


                var total = 0;
                for(var i=0;i<d.rab.length;i++){
                    total += d.rab[i].total;
                }
                var setuju =0;
                if(total <= d.skema_usulan.dana_maksimal){
                    setuju = Math.round((nilai[0]/100)*total);
                }else{
                    setuju = Math.round((nilai[0]/100)*d.skema_usulan.dana_maksimal);
                }
                $('#anggaran-diusulkan').text(formatRupiah(''+total, 'Rp. '));
                $('#anggaran-disetujui').text(formatRupiah(''+setuju, 'Rp. ')+ ' (' + nilai[0] +'%)');
                $('#modal-form').attr('action', '/admin/review/penilaian/' + id);
                $('#modal-status').val(d.nilai);
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
