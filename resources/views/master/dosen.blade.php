@extends('layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css"> --}}
@endsection

@section('judul')
    Data Master Dosen
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
                                <th>Nama</th>
                                <th>Jabatan</th>
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
                                    <td>{{ $item->jabatan }}</td>
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

                    <form id="form" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            <div class="card-text">
                                <div class="form-group" id="nidn">
                                    <label>NIDN</label>
                                    <input type="number" class="form-control" name="nidn" required>
                                </div>
                                <div class="form-group" id="nama">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                                <div class="form-group" id="alamat">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="alamat">
                                </div>
                                <div class="form-group" id="tempat_lahir">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir">
                                </div>
                                <div class="form-group" id="tanggal_lahir">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir">
                                </div>
                                <div class="form-group" id="jabatan_id">
                                    <label>Jabatan Fungsional</label>
                                    <select class="form-control" name="jabatan_id">
                                        @foreach ($jabatan as $item)
                                            <option value="{{ $item->level }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group" id="ktp">
                                    <label>No. KTP</label>
                                    <input type="number" class="form-control" name="ktp">
                                </div>
                                <div class="form-group" id="telepon">
                                    <label>No. Telepon</label>
                                    <input type="number" class="form-control" name="telepon">
                                </div>
                                <div class="form-group" id="hp">
                                    <label>No. HP</label>
                                    <input type="number" class="form-control" name="hp">
                                </div>
                                <div class="form-group" id="email">
                                    <label>Alamat Email</label>
                                    <input type="email" class="form-control" name="email">
                                </div>
                                <div class="form-group" id="web">
                                    <label>Situs Web</label>
                                    <input type="text" class="form-control" name="web">
                                </div>
                                <div class="form-group" id="sinta_id">
                                    <label>ID Sinta</label>
                                    <input type="text" class="form-control" name="sinta_id">
                                </div>
                                <div class="form-group" id="google_scholar_id">
                                    <label>ID Google Scholar</label>
                                    <input type="text" class="form-control" name="google_scholar_id">
                                </div>
                                <div class="form-group" id="status">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="1">Aktif</option>
                                        <option value="2">Tidak aktif</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                        </div>
                    </form>
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
                    var d = JSON.parse(data);
                    $('#myModalLabel33').text(d.nama + " | Detail Dosen");
                    $('#nidn-field').val(d.nidn);
                    $('#form').attr('action','{{ url("/admin/master/dosen") }}/' + d.id);
                    $('#nidn input').val(d.nidn);
                    $('#nama input').val(d.nama);
                    $('#alamat input').val(d.alamat);
                    $('#tempat_lahir input').val(d.tempat_lahir);
                    $('#tanggal_lahir input').val(d.tanggal_lahir);
                    $('#jabatan_id select').val(d.jabatan_id);
                    $('#ktp input').val(d.ktp);
                    $('#telepon input').val(d.telepon);
                    $('#hp input').val(d.hp);
                    $('#email input').val(d.email);
                    $('#web input').val(d.web);
                    $('#sinta_id input').val(d.sinta_id);
                    $('#google_scholar_id input').val(d.google_scholar_id);
                    $('#status select').val(d.status);
                });
            });

            $('form').submit(function() {
                $(this).find("button[type='submit']").prop('disabled',true);
            });
        } );
    </script>
@endsection