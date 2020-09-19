@extends('layout')

@section('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css"> --}}
@endsection

@section('judul')
    Skema Usulan
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

          <!-- skema penelitian -->
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Skema Penelitian</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalPenelitian">
                    <i class="fas fa-plus"></i> Tambah
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="myTable" class="table zero-configuration" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Senior Javascript Developer</td>
                            <td>Edinburgh</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- skema pengabdian -->
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Skema Pengabdian</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalPengabdian">
                    <i class="fas fa-plus"></i> Tambah
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="myTable" class="table zero-configuration" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Senior Javascript Developer</td>
                            <td>Edinburgh</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
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

        <!-- modal penelitian -->
        <div class="modal fade text-left" id="modalPenelitian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Tambah Skema Penelitian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#">
                        <div class="modal-body">
                            <label>Nama Skema</label>
                            <div class="form-group">
                                <select class="form-control" name="" id="">
                                    <option value="">Penelitian 1</option>
                                    <option value="">Penelitian 2</option>
                                    <option value="">Penelitian 3</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName1">Tahun Skema</label>
                                        <input type="number" class="form-control" id="firstName1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName1">Tahun Penelitian</label>
                                        <input type="number" class="form-control" id="firstName1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Jumlah Peneliti</label>
                                    <div class="form-group">
                                        <select class="form-control" name="" id="">
                                            <option value="">1</option>
                                            <option value="">2</option>
                                            <option value="">3</option>
                                            <option value="">4</option>
                                            <option value="">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label>Jabatan Minimal</label>
                                    <div class="form-group">
                                        <select class="form-control" name="" id="">
                                            <option value="">Penelitian 1</option>
                                            <option value="">Penelitian 2</option>
                                            <option value="">Penelitian 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tambah Skema</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- modal pengabdian -->
        <div class="modal fade text-left" id="modalPengabdian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Tambah Skema Pengabdian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#">
                        <div class="modal-body">
                            <label>Email: </label>
                            <div class="form-group">
                                <input type="text" placeholder="Email Address" class="form-control">
                            </div>

                            <label>Password: </label>
                            <div class="form-group">
                                <input type="password" placeholder="Password" class="form-control">
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
@endsection