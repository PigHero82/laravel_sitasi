@extends('layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
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

          <!-- belum dikonfirmasi -->
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Belum Dikonfirmasi</h3>
              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                  <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                  </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-content collapse show">
                @if ($unconfirmed)
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="unconfirmedTable" class="table zero-configuration table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 50%">Judul</th>
                                        <th>Peran</th>
                                        <th>Nama Ketua</th>
                                        <th>Skema Usulan</th>
                                        <th>Tahun Pelaksanaan</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($unconfirmed as $item)
                                        <tr>
                                            <td><a href="#modal" data-toggle="modal" data-value="{{ $item['penelitian']['id'] }}" data-usulan="{{ $item->id }}">{{ $item['penelitian']['judul'] }}</a></td>
                                            <td>{{ $item['peran_nama'] }}</td>
                                            <td>{{ $item['penelitian']['ketua'] }}</td>
                                            <td>{{ $item['penelitian']['tahun_skema'] . ' - ' . $item['penelitian']['kode'] }}</td>
                                            <td>{{ $item['penelitian']['tahun_skema'] }}</td>
                                            <td>
                                                @if ($item->status == 0)
                                                    <i class="feather icon-clock text-warning"></i> {{ $item['status_nama'] }}
                                                @elseif ($item->status == 1)
                                                    <i class="feather icon-check text-success"></i> {{ $item['status_nama'] }}
                                                @elseif ($item->status == 2)
                                                    <i class="feather icon-x text-danger"></i> {{ $item['status_nama'] }}
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('dosen.persetujuan.update', $item->id)}}" method="post" onsubmit="return confirm('Apakah Anda yakin? Status yang terpilih tidak dapat diubah kembali');">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="1" required>
                                                    <button type="submit" class="btn btn-icon btn-icon rounded-circle btn-success mr-1 mb-1 waves-effect waves-light" title="Setuju"><i class="feather icon-check"></i></button>
                                                </form>
                                                <form action="{{ route('dosen.persetujuan.update', $item->id)}}" method="post" onsubmit="return confirm('Apakah Anda yakin? Status yang terpilih tidak dapat diubah kembali');">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="status" value="2" required>
                                                    <button type="submit" class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1 waves-effect waves-light" title="Tidak setuju"><i class="feather icon-x"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Peran</th>
                                        <th>Nama Ketua</th>
                                        <th>Skema Usulan</th>
                                        <th>Tahun Pelaksanaan</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="card-body text-center">
                        <i class="feather icon-alert-octagon"></i>
                        <h4 class="card-title">Tidak ada data</h4>
                    </div>
                @endif
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          
          <!-- riwayat penelitian & pengabdian -->
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Riwayat Penelitian & Pengabdian</h3>
              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                  <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                  </ul>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-content collapse show">
                @if ($confirmed)
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="confirmedTable" class="table zero-configuration table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th style="width: 50%">Judul</th>
                                        <th>Peran</th>
                                        <th>Nama Ketua</th>
                                        <th>Skema Usulan</th>
                                        <th>Tahun Pelaksanaan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($confirmed as $item)
                                        <tr>
                                            <td><a href="#modal" data-toggle="modal" data-value="{{ $item['penelitian']['id'] }}">{{ $item['penelitian']['judul'] }}</a></td>
                                            <td>{{ $item['peran_nama'] }}</td>
                                            <td>{{ $item['penelitian']['ketua'] }}</td>
                                            <td>{{ $item['penelitian']['tahun_skema'] . ' - ' . $item['penelitian']['kode'] }}</td>
                                            <td>{{ $item['penelitian']['tahun_skema'] }}</td>
                                            <td>
                                                @if ($item->status == 0)
                                                    <i class="feather icon-clock text-warning"></i> {{ $item['status_nama'] }}
                                                @elseif ($item->status == 1)
                                                    <i class="feather icon-check text-success"></i> {{ $item['status_nama'] }}
                                                @elseif ($item->status == 2)
                                                    <i class="feather icon-x text-danger"></i> {{ $item['status_nama'] }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Peran</th>
                                        <th>Nama Ketua</th>
                                        <th>Skema Usulan</th>
                                        <th>Tahun Pelaksanaan</th>
                                        <th>Status</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="card-body text-center">
                        <i class="feather icon-alert-octagon"></i>
                        <h4 class="card-title">Tidak ada data</h4>
                    </div>
                @endif
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
                            <div id="confirmation" class="modal-footer justify-content-between"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/extensions/polyfill.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/extensions/sweet-alerts.js') }}"></script>
    <script>
        $('document').ready(function () {
            $('form').submit(function() {
                $(this).find("button[type='submit']").prop('disabled', true);
            })

            $('#unconfirmedTable').DataTable({
                columnDefs: [
                    { orderable: false, targets: 6 }
                ]
            })

            $('#confirmedTable').DataTable()

            $('form').on('click', 'input[type=submit]', function(e) {
                $(this.form).data('clicked', this.value);
            })
    
            $(document).on('click', '#unconfirmedTable tbody tr td a', function(e) {
                var id = $(this).attr('data-value');
                var usulanId = $(this).attr('data-usulan');
                console.log(usulanId)
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
                    $("#confirmation form").remove()
                    $("#confirmation").append('<form action="#" class="usulanAnggota mb-0" method="post" onsubmit="">@csrf @method("PATCH")<input type="hidden" name="status" value="1" required><button type="submit" class="btn btn-success"><i class="feather icon-check"></i> Setuju</button></form><form action="#" class="usulanAnggota mb-0" method="post" onsubmit="">@csrf @method("PATCH")<input type="hidden" name="status" value="2" required><button type="submit" class="btn btn-danger"><i class="feather icon-x"></i> Tidak setuju</button></form>')
                    $(".usulanAnggota").attr('action', "{{ url('/dosen/persetujuan')}}/" + usulanId)
                    $(".usulanAnggota").attr('onsubmit', "return confirm('Apakah Anda yakin? Status yang terpilih tidak dapat diubah kembali');")
                    $("#confirmation").addClass('modal-footer')
                });
            });

            $(document).on('click', '#confirmedTable tbody tr td a', function(e) {
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
                    $("#confirmation button").remove()
                    $("#confirmation").removeClass('modal-footer')
                });
            });
        });
    </script>
    <!-- END: Page JS-->
@endsection