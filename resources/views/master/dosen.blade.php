@extends('layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css"> --}}
@endsection

@section('judul')
    Data Master Dosen
@endsection

@section('content')
    @if(session()->get('success'))
        <div class ="alert alert-success">
            {{ session()->get('success') }}  
        </div><br />
    @endif
    <div class="row justify-content-center">
        <!-- left column -->
        <div class="col-lg-8">
        @if (count($data) > 0)
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Dosen</h3>

              <div class="card-tools">
                <a href="#" class="btn btn-outline-success"><i class="fas fa-sync-alt"></i> Sinkronisasi Data Dosen</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table zero-configuration table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 30px"></th>
                                <th>NIDN</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>
                                        <div class="avatar text-center">
                                            @isset($item->profile_photo_path)
                                                <img src="{{ asset($item->profile_photo_path) }}" alt="{{ $item->nama }}" height="32" width="32">
                                            @else
                                                <span class="avatar-content">{{ $item->nama[0] }}</span>
                                            @endisset
                                        </div>
                                    </td>
                                    <td><a href="#inlineForm" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->nidn }}</a></td>
                                    <td>{{ $item->nama }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>NIDN</th>
                                <th>Name</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          @else
                <!-- general form elements -->
                <div class="card bg-danger text-white">
                    <div class="card-header">
                        <h3 class="card-title text-white">Dosen</h3>
          
                        <div class="card-tools">
                          <a href="#" class="btn btn-success"><i class="fas fa-sync-alt"></i> Sinkronisasi Data Dosen</a>
                        </div>
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
            @endif
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->

        <!-- Modal -->
        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Detail Dosen</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    
                    <div class="modal-body">
                        <div class="card-text">
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">NIDN</dt>
                                <dd class="col-sm-8" id="nidn"></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Nama</dt>
                                <dd class="col-sm-8" id="nama"></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Alamat</dt>
                                <dd class="col-sm-8" id="alamat"></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Tempat Lahir</dt>
                                <dd class="col-sm-8" id="tempat_lahir"></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Tanggal Lahir</dt>
                                <dd class="col-sm-8" id="tanggal_lahir"></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Jabatan Fungsional</dt>
                                <dd class="col-sm-8" id="jabatan_fungsional"></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">No. KTP</dt>
                                <dd class="col-sm-8" id="ktp"></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">No. Telepon</dt>
                                <dd class="col-sm-8" id="telepon"></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">No. HP</dt>
                                <dd class="col-sm-8" id="hp"></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Alamat Email</dt>
                                <dd class="col-sm-8" id="email"></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">Situs Web</dt>
                                <dd class="col-sm-8" id="web"></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">ID Sinta</dt>
                                <dd class="col-sm-8" id="sinta_id"></dd>
                            </dl>
                            <dl class="row">
                                <dt class="col-sm-4 text-md-right">ID Google Scholar</dt>
                                <dd class="col-sm-8" id="google_scholar_id"></dd>
                            </dl>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <form action="#" method="POST">
                            @csrf
                            <input type="text" name="nidn" id="nidn-field" hidden required>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Perbarui</button>
                        </form>
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
            $('.zero-configuration').DataTable({
                "order": [[ 1, "asc" ]],
                "columnDefs": [
                    { "orderable": false, "targets": 0 }
                ]
            });

            $(document).on('click', '#myTable tbody tr td a', function(e) {
                var id = $(this).attr('data-value');
                $.get( "/admin/master/dosen/" + id, function( data ) {
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