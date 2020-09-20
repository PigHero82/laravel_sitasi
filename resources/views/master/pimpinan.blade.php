@extends('layout')

@section('css')
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css"> --}}
@endsection

@section('judul')
    Dosen Pimpinan & Koordinator
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
                            <td>0824048801</td>
                            <td>Ida Bagus Ary Indra Iswara, M.Kom.</td>
                        </tr>
                        <tr>
                            <td><a href="#modal" data-toggle="modal">Kaprodi Teknik Informatika</a></td>
                            <td>0822088901</td>
                            <td>Wayan Gede Suka Parwita, M.Cs.</td>
                        </tr>
                        <tr>
                            <td><a href="#modal" data-toggle="modal">Kaprodi Sistem Komputer</a></td>
                            <td>0822088902</td>
                            <td>I Nyoman Buda Hartawan, M.Kom.</td>
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
                                            <option value="">Kaprodi Teknik Informatika</option>
                                            <option value="">Kaprodi Sistem Komputer</option>
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