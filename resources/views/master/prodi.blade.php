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
              <h3 class="card-title">Program Studi</h3>

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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#modal" data-toggle="modal">Teknik Informatika</a></td>
                        </tr>
                        <tr>
                            <td><a href="#modal" data-toggle="modal">Sistem Komputer</a></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Keterangan</th>
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
                        <h4 class="modal-title" id="myModalLabel33">Tambah Program Studi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#">
                        <div class="modal-body">
                            <div class="row">
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="firstName1">Nama</label>
                                        <input type="number" class="form-control" id="firstName1">
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