@extends('layout')

@section('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css"> --}}
@endsection

@section('judul')
    Data Master
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
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Dosen</h3>

              <div class="card-tools">

                
                {{-- <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#inlineForm">
                    Launch Modal
                </button> --}}
                <a href="#" class="btn btn-outline-success"><i class="fas fa-sync-alt"></i> Sinkronisasi Data Dosen</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="myTable" class="table zero-configuration table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>NIDN</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#inlineForm" data-toggle="modal">0898841078</a></td>
                            <td>Tiger Nixon</td>
                        </tr>
                        <tr>
                            <td><a href="#inlineForm" data-toggle="modal">0843098017</a></td>
                            <td>Garrett Winters</td>
                        </tr>
                        <tr>
                            <td><a href="#inlineForm" data-toggle="modal">0864093620</a></td>
                            <td>Ashton Cox</td>
                        </tr>
                        <tr>
                            <td><a href="#inlineForm" data-toggle="modal">0813584614</a></td>
                            <td>Cedric Kelly</td>
                        </tr>
                        <tr>
                            <td><a href="#inlineForm" data-toggle="modal">0894370767</a></td>
                            <td>Airi Satou</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>NIDN</th>
                            <th>Name</th>
                        </tr>
                    </tfoot>
                </table>
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
                        <h4 class="modal-title" id="myModalLabel33">0898841078 | Detail Dosen</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>NIDN</label>
                                    <div class="form-group">
                                        <input type="number" placeholder="NIDN" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label>Nama</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="Nama" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label>Alamat</label>
                                    <fieldset class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Alamat"></textarea>
                                    </fieldset>
                                </div>
                                
                                <div class="col-md-6">
                                    <label>Tempat Lahir</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="Tempat Lahir" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label>Tanggal Lahir</label>
                                    <div class="form-group">
                                        <input type="date" class="form-control" />
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label>Jabatan Fungsional</label>
                                    <fieldset class="form-group">
                                        <select class="form-control" id="basicSelect">
                                            <option value="" hidden>--Pilih Jabatan Fungsional</option>
                                            <option>IT</option>
                                            <option>Blade Runner</option>
                                            <option>Thor Ragnarok</option>
                                        </select>
                                    </fieldset>
                                </div>
                                
                                <div class="col-md-6">
                                    <label>No. KTP</label>
                                    <div class="form-group">
                                        <input type="number" placeholder="No. KTP" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label>No. Telepon</label>
                                    <div class="form-group">
                                        <input type="number" placeholder="No. Telepon" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label>No. HP</label>
                                    <div class="form-group">
                                        <input type="number" placeholder="No. HP" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label>Alamat Email</label>
                                    <div class="form-group">
                                        <input type="email" placeholder="Alamat Email" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label>Situs Web</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="Situs Web" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label>ID Sinta</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="ID Sinta" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label>ID Google Scholar</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="ID Google Scholar" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('js')

    {{-- <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/pickadate/legacy.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/pickers/dateTime/pick-a-datetime.js') }}"></script> --}}
    {{-- <script src="{{ asset('/app-assets/js/scripts/datatables/datatable.min.js') }}"></script> --}}
    {{-- <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script> --}}
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                responsive: true
            });
        } );
    </script>
@endsection