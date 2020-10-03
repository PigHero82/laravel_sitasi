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
                        <thead class="text-center">
                            <tr>
                                <th>NIDN</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td><a href="#inlineForm" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->nidn }}</a></td>
                                    <td>{{ $item->nama }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="text-center">
                            <tr>
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
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->

        <!-- Modal -->
        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33"> | Detail Dosen</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>NIDN</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="nidn" disabled>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label>Nama</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nama" disabled>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label>Alamat</label>
                                <fieldset class="form-group">
                                    <textarea class="form-control" rows="3" id="alamat" disabled></textarea>
                                </fieldset>
                            </div>
                            
                            <div class="col-md-6">
                                <label>Tempat Lahir</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="tempat_lahir" disabled>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label>Tanggal Lahir</label>
                                <div class="form-group">
                                    <input type="date" class="form-control" id="tanggal_lahir" disabled>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label>Jabatan Fungsional</label>
                                <fieldset class="form-group">
                                    <input type="text" class="form-control" id="jabatan_fungsional" disabled>
                                </fieldset>
                            </div>
                            
                            <div class="col-md-6">
                                <label>No. KTP</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="ktp" disabled>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label>No. Telepon</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="telepon" disabled>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label>No. HP</label>
                                <div class="form-group">
                                    <input type="number" class="form-control" id="hp" disabled>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label>Alamat Email</label>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" disabled>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label>Situs Web</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="web" disabled>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label>ID Sinta</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="sinta_id" disabled>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <label>ID Google Scholar</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="google_scholar_id" disabled>
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
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('.zero-configuration').DataTable();

            $(document).on('click', '#myTable tbody tr td a', function(e) {
                var id = $(this).attr('data-value');
                $.get( "/admin/master/dosen/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#myModalLabel33').val(d.nama + " | Detail Dosen");
                    $('#nidn').val(d.nidn);
                    $('#nama').val(d.nama);
                    $('#alamat').text(d.alamat);
                    $('#tempat_lahir').val(d.tempat_lahir);
                    $('#tanggal_lahir').val(d.tanggal_lahir);
                    $('#jabatan_fungsional').val(d.jabatan_fungsional_nama);
                    $('#ktp').val(d.ktp);
                    $('#telepon').val(d.telepon);
                    $('#hp').val(d.hp);
                    $('#email').val(d.email);
                    $('#web').val(d.web);
                    $('#sinta_id').val(d.sinta_id);
                    $('#google_scholar_id').val(d.google_scholar_id);
                });
                console.log($(this).attr('data-value'));
            });
        } );
    </script>
@endsection