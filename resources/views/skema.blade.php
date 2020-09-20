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
              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                  <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                  </ul>
              </div>

              <div class="card-tools mr-3">
                  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalPenelitian">
                      <i class="fas fa-plus"></i> Tambah
                  </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-content collapse show">
                <div class="card-body">
                    <table id="myTable" class="table zero-configuration" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Skema</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#modalPenelitian" data-toggle="modal">Penelitian 1</a></td>
                            </tr>
                            <tr>
                                <td><a href="#modalPenelitian" data-toggle="modal">Penelitian 2</a></td>
                            </tr>
                            <tr>
                                <td><a href="#modalPenelitian" data-toggle="modal">Penelitian 3</a></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama Skema</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- skema pengabdian -->
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Skema Pengabdian</h3>
              <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                  <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                  </ul>
              </div>

              <div class="card-tools mr-3">
                  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modalPenelitian">
                      <i class="fas fa-plus"></i> Tambah
                  </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-content collapse show">
                <div class="card-body">
                    <table id="myTable" class="table zero-configuration" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama Skema</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="#modalPengabdian" data-toggle="modal">Pengabdian 1</a></td>
                            </tr>
                            <tr>
                                <td><a href="#modalPengabdian" data-toggle="modal">Pengabdian 2</a></td>
                            </tr>
                            <tr>
                                <td><a href="#modalPengabdian" data-toggle="modal">Pengabdian 3</a></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama Skema</th>
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

        <!-- modal penelitian -->
        <div class="modal fade text-left" id="modalPenelitian" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Tambah Skema Penelitian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#">
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-6">
                                    <label>Nama Skema</label>
                                    <div class="form-group">
                                        <select class="form-control" name="" id="">
                                            <option value="">Penelitian 1</option>
                                            <option value="">Penelitian 2</option>
                                            <option value="">Penelitian 3</option>
                                        </select>
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
                                    <label>Jabatan Minimal</label>
                                    <div class="form-group">
                                        <select class="form-control" name="" id="">
                                            <option value="">Tidak ada</option>
                                            <option value="">Dosen</option>
                                            <option value="">Guru Besar</option>
                                            <option value="">Ketua</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Jabatan Maksimal</label>
                                    <div class="form-group">
                                        <select class="form-control" name="" id="">
                                            <option value="">Tidak ada</option>
                                            <option value="">Dosen</option>
                                            <option value="">Guru Besar</option>
                                            <option value="">Ketua</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tambah</button>
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
                            <div class="row">

                                <div class="col-md-6">
                                    <label>Nama Skema</label>
                                    <div class="form-group">
                                        <select class="form-control" name="" id="">
                                            <option value="">Pengabdian 1</option>
                                            <option value="">Pengabdian 2</option>
                                            <option value="">Pengabdian 3</option>
                                        </select>
                                    </div>
                                </div>
    
                                <div class="col-md-6">
                                    <label>Jumlah Pengabdi</label>
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
                                    <div class="form-group">
                                        <label for="firstName1">Tahun Skema</label>
                                        <input type="number" class="form-control" id="firstName1">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstName1">Tahun Pengabdian</label>
                                        <input type="number" class="form-control" id="firstName1">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Jabatan Minimal</label>
                                    <div class="form-group">
                                        <select class="form-control" name="" id="">
                                            <option value="">Tidak ada</option>
                                            <option value="">Dosen</option>
                                            <option value="">Guru Besar</option>
                                            <option value="">Ketua</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>Jabatan Maksimal</label>
                                    <div class="form-group">
                                        <select class="form-control" name="" id="">
                                            <option value="">Tidak ada</option>
                                            <option value="">Dosen</option>
                                            <option value="">Guru Besar</option>
                                            <option value="">Ketua</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('js')
@endsection