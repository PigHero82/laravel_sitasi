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
              <h3 class="card-title">Pimpinan & Koordinator</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal">
                    <i class="fas fa-plus"></i> Tambah
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="myTable" class="table zero-configuration" style="width:100%">
                    <thead>
                        <tr>
                            <th>Keterangan</th>
                            <th>NIDN</th>
                            <th>Dosen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#modal" data-toggle="modal">Pimpinan LPPM</a></td>
                            <td>0898841078</td>
                            <td>Tiger Nixon</td>
                        </tr>
                        <tr>
                            <td><a href="#modal" data-toggle="modal">Koordinator Penelitian</a></td>
                            <td>0843098017</td>
                            <td>Garrett Winters</td>
                        </tr>
                        <tr>
                            <td><a href="#modal" data-toggle="modal">Koordinator Pengabdian</a></td>
                            <td>0864093620</td>
                            <td>Ashton Cox</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Keterangan</th>
                            <th>NIDN</th>
                            <th>Dosen</th>
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

        <!-- modal -->
        <div class="modal fade text-left" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Tambah Pimpinan & Koordinator</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#">
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <label>Keterangan</label>
                                    <div class="form-group">
                                        <select class="form-control" name="" id="">
                                            <option value="" hidden>--Pilih Keterangan</option>
                                            <option value="">Pimpinan LPPM</option>
                                            <option value="">Koordinator Penelitian</option>
                                            <option value="">Koordinator Pengabdian</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label>Dosen</label>
                                    <div class="form-group">
                                        <select class="form-control" name="" id="">
                                            <option value="" hidden>--Pilih Dosen</option>
                                            <option value="">Airi Satou - 0894370767</option>
                                            <option value="">Ashton Cox - 0864093620</option>
                                            <option value="">Cedric Kelly - 0813584614</option>
                                            <option value="">Garrett Winters - 0843098017</option>
                                            <option value="">Tiger Nixon - 0898841078</option>
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