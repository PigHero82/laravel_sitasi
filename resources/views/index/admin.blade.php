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
        <div class="col-md-6">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12">
                    <div class="card text-center">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="avatar bg-rgba-success p-50 m-0 mb-1">
                                    <div class="avatar-content">
                                        <i class="feather icon-bar-chart-2 text-success font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700">{{ $jum[0] }}</h2>
                                <p class="mb-0 line-ellipsis">Total Penelitian</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-md-12 col-sm-12">
                    <div class="card text-center">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="avatar bg-rgba-warning p-50 m-0 mb-1">
                                    <div class="avatar-content">
                                        <i class="feather icon-users text-warning font-medium-5"></i>
                                    </div>
                                </div>
                                <h2 class="text-bold-700">{{ $jum[1] }}</h2>
                                <p class="mb-0 line-ellipsis">Total Pengabdian</p>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

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
                                            @isset ($composerUser->profile_photo_path)
                                                @if (file_exists(asset($composerUser->profile_photo_path)))
                                                    <img src="{{ asset($composerUser->profile_photo_path) }}" alt="Profile picture" height="250">
                                                @endif
                                            @else
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png" alt="Profile picture" height="250">
                                            @endisset
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
                                <dd class="col-sm-9">{{ $composerUser->nama }}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3 text-right">NIDN</dt>
                                <dd class="col-sm-9">{{ $composerUser->nidn }}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3 text-right">Email</dt>
                                <dd class="col-sm-9">{{ $composerUser->email }}</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-3 text-right">Link Google Scholar</dt>
                                <dd class="col-sm-9">
                                    @isset ($composerUser->google_scholar_id)
                                        <a href="https://scholar.google.com/citations?user={{ $composerUser->google_scholar_id }}&hl=id">{{ $composerUser->google_scholar_id }}</a>
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
        <div class="card col-md-12">
            <div class="card-body row">
                <div class="col-md-6">
                <canvas  id="chart-penelitian"></canvas> 
                </div>
                <div class="col-md-6">
                <canvas  id="chart-pengabdian"></canvas>
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
            @if(count($penelitian))
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Usulan Penelitian</h3>

                        <div class="card-tools">
                            <a href="{{ route('admin.usulan') }}" class="btn btn-success">
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
                                        <th>Reviewer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($penelitian as $item)
                                            <tr>
                                                <td><a href="#modalPenelitian" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->judul }}</a></td>
                                                <td>{{ $item->skema_usulan->tahun_skema . ' - ' . $item->skema_usulan->kode }}</td>
                                                <td>{{ $item->skema_usulan->tahun_pelaksanaan }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
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
            @else
                <div class="card bg-danger text-white">
                    <div class="card-header">
                        <h3 class="card-title text-white">Usulan Penelitian</h3>
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
  
            <!-- skema pengabdian -->
            <!-- general form elements -->
            @if(count($pengabdian))
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Usulan Pengabdian</h3>

                        <div class="card-tools">
                            <a href="{{ route('admin.usulan') }}" class="btn btn-success">
                                Lihat Semua
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <table id="myTable2" class="table zero-configuration table-striped table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 60%">Judul</th>
                                        <th>Skema Usulan</th>
                                        <th>Tahun Pelaksanaan</th>
                                        <th>Reviewer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengabdian as $item)
                                        <tr>
                                            <td><a href="#modalPenelitian" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->judul }}</a></td>
                                            <td>{{ $item->skema_usulan->tahun_skema . ' - ' . $item->skema_usulan->kode }}</td>
                                            <td>{{ $item->skema_usulan->tahun_pelaksanaan }}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
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
            @else
                <div class="card bg-danger text-white">
                    <div class="card-header">
                        <h3 class="card-title text-white">Usulan Pengabdian</h3>
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
                                <dd class="col-sm-8" id="penelitian-judul">Implementasi Komik Interaktif Cerita Rakyat Cupak Grantang dengan Bahasa Isyarat berbasis Mobile</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Reviewer</dt>
                                <dd class="col-sm-8" id="penelitian-reviewer">-</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Skema</dt>
                                <dd class="col-sm-8" id="penelitian-skema">PPDS Batch 1</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Tahun Usulan</dt>
                                <dd class="col-sm-8" id="penelitian-usulan">2020</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Tahun Penelitian</dt>
                                <dd class="col-sm-8" id="penelitian-pelaksanaan">2020</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Jenis Usulan</dt>
                                <dd class="col-sm-8" id="penelitian-jenis">Penelitian</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Proposal</dt>
                                <dd class="col-sm-8" id="penelitian-">-</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Laporan Kemajuan</dt>
                                <dd class="col-sm-8" id="penelitian-">-</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Laporan Akhir</dt>
                                <dd class="col-sm-8" id="penelitian-">-</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Laporan Anggaran</dt>
                                <dd class="col-sm-8" id="penelitian-">-</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Laporan Belanja</dt>
                                <dd class="col-sm-8" id="penelitian-">-</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Laporan Publikasi</dt>
                                <dd class="col-sm-8" id="penelitian-">-</dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Link Publikasi/Google Scholar</dt>
                                <dd class="col-sm-8" id="penelitian-">-</dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
    <script>
        var label = [
        @foreach($tahun_penelitian as $tp)
            '{{ $tp->tahun_pelaksanaan }}',
        @endforeach
        ];
        var data = [
        @foreach($tahun_penelitian as $tp)
            '{{ $tp->jumlah }}',
        @endforeach
        ]
        var ctx = document.getElementById('chart-penelitian').getContext('2d');
        var chartPenelitian = new Chart(ctx, {
            type:'line',
            data:{
                labels: label,
                datasets: [{
                    label:'Perkembangan penelitian STIKI',
                    data: data,
                    backgroundColor: 'blue',
                    borderColor: 'lightblue'
                }]
            },
            options: {
                elements:{
                    line:{
                        fill:false,
                        lineTension: 0
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        var label1 = [
        @foreach($tahun_pengabdian as $tp)
            '{{ $tp->tahun_pelaksanaan }}',
        @endforeach
        ];
        var data1 = [
        @foreach($tahun_pengabdian as $tp)
            '{{ $tp->jumlah }}',
        @endforeach
        ]
        var ctx1 = document.getElementById('chart-pengabdian').getContext('2d');
        var chartPenelitian = new Chart(ctx1, {
            type:'line',
            data:{
                labels: label1,
                datasets: [{
                    label:'Perkembangan pengabdian STIKI',
                    data: data1,
                    backgroundColor: 'red',
                    borderColor: 'pink'
                }]
            },
            options: {
                elements:{
                    line:{
                        fill:false,
                        lineTension: 0
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        $(document).on('click', '#myTable tbody tr td a', function(e) {
            var id = $(this).attr('data-value');
            $.get( "/usulan/" + id, function( data ) {
                console.log(JSON.parse(data));
                var d = JSON.parse(data);
                $('#penelitian-judul').text(d.judul);
                $('#penelitian-skema').text(d['skema_usulan'].kode);
                $('#penelitian-usulan').text(d['skema_usulan'].tahun_skema);
                $('#penelitian-pelaksanaan').text(d['skema_usulan'].tahun_pelaksanaan);
                $('#penelitian-jenis').text("XXX");
                if (d.jenis == 1) {
                    $('#myModalLabel33').text("Detail Penelitian");   
                } else {
                    $('#myModalLabel33').text("Detail Pengabdian");   
                }
            });
        });
    </script>
@endsection