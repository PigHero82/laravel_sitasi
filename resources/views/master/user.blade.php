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
              <h3 class="card-title">User</h3>

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
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#inlineForm" data-toggle="modal">0898841078</a></td>
                            <td>Tiger Nixon</td>
                            <td>
                                <ul>
                                    <li>Admin</li>
                                </ul>
                            </td>
                            <td><button class="btn btn-success"><i class="fas fa-key"></i> Reset Password</button></td>
                        </tr>
                        <tr>
                            <td><a href="#inlineForm" data-toggle="modal">0843098017</a></td>
                            <td>Garrett Winters</td>
                            <td>
                                <ul>
                                    <li>Pimpinan</li>
                                    <li>Dosen</li>
                                </ul>
                            </td>
                            <td><button class="btn btn-success"><i class="fas fa-key"></i> Reset Password</button></td>
                        </tr>
                        <tr>
                            <td><a href="#inlineForm" data-toggle="modal">0864093620</a></td>
                            <td>Ashton Cox</td>
                            <td>
                                <ul>
                                    <li>Dosen</li>
                                    <li>Reviewer</li>
                                </ul>
                            </td>
                            <td><button class="btn btn-success"><i class="fas fa-key"></i> Reset Password</button></td>
                        </tr>
                        <tr>
                            <td><a href="#inlineForm" data-toggle="modal">0813584614</a></td>
                            <td>Cedric Kelly</td>
                            <td>
                                <ul>
                                    <li>Dosen</li>
                                    <li>Penelitian</li>
                                </ul>
                            </td>
                            <td><button class="btn btn-success"><i class="fas fa-key"></i> Reset Password</button></td>
                        </tr>
                        <tr>
                            <td><a href="#inlineForm" data-toggle="modal">0894370767</a></td>
                            <td>Airi Satou</td>
                            <td>
                                <ul>
                                    <li>Dosen</li>
                                    <li>Pengabdian</li>
                                </ul>
                            </td>
                            <td><button class="btn btn-success"><i class="fas fa-key"></i> Reset Password</button></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>NIDN</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Aksi</th>
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
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">0898841078 | Detail User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#">
                        <div class="modal-body">
                            <dl class="row">
                                <dt class="col-sm-3">NIDN</dt>
                                <dd id="name-text" class="col-sm-9">0898841078</dd>
                                
                                <dt class="col-sm-3">Nama</dt>
                                <dd id="code-text" class="col-sm-9">Tiger Nixon</dd>
                                
                                <dt class="col-sm-3">Role</dt>
                                <dd id="address-text" class="col-sm-9">
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" checked value="false">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">Admin</span>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" value="false">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">Pimpinan</span>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" value="false">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">Dosen</span>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" value="false">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">Koordinator Penelitian</span>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" value="false">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">Koordinator Pengabdian</span>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                            <input type="checkbox" value="false">
                                            <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                    <i class="vs-icon feather icon-check"></i>
                                                </span>
                                            </span>
                                            <span class="">Reviewer</span>
                                        </div>
                                    </fieldset>
                                </dd>
                            </dl>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Update</button>
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