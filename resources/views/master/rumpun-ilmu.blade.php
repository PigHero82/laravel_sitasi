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
              <h3 class="card-title">Rumpun Ilmu</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal">
                    <i class="fas fa-plus"></i> Tambah
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="myTable" class="table zero-configuration table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Rumpun</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="#modal" data-toggle="modal">100</a></td>
                            <td>MATEMATIKA DAN ILMU PENGETAHUAN ALAM (MIPA)</td>
                        </tr>
                        <tr>
                            <td><a href="#modal" data-toggle="modal">140</a></td>
                            <td>ILMU TANAMAN</td>
                        </tr>
                        <tr>
                            <td><a href="#modal" data-toggle="modal">200</a></td>
                            <td>ILMU HEWANI</td>
                        </tr>
                        <tr>
                            <td><a href="#modal" data-toggle="modal">260</a></td>
                            <td>ILMU KEDOKTERAN</td>
                        </tr>
                        <tr>
                            <td><a href="#modal" data-toggle="modal">340</a></td>
                            <td>ILMU KESEHATAN</td>
                        </tr>
                        <tr>
                            <td><a href="#modal" data-toggle="modal">410</a></td>
                            <td>ILMU TEKNIK</td>
                        </tr>
                        <tr>
                            <td><a href="#modal" data-toggle="modal">500</a></td>
                            <td>ILMU BAHASA</td>
                        </tr>
                        <tr>
                            <td><a href="#modal" data-toggle="modal">550</a></td>
                            <td>ILMU EKONOMI</td>
                        </tr>
                        <tr>
                            <td><a href="#modal" data-toggle="modal">580</a></td>
                            <td>ILMU SOSIAL HUMANIORA</td>
                        </tr>
                        <tr>
                            <td><a href="#modal" data-toggle="modal">630</a></td>
                            <td>AGAMA DAN FILSAFAT</td>
                        </tr>
                        <tr>
                            <td><a href="#modal" data-toggle="modal">660</a></td>
                            <td>ILMU SENI, DESAIN DAN MEDIA</td>
                        </tr>
                        <tr>
                            <td><a href="#modal" data-toggle="modal">710</a></td>
                            <td>ILMU PENDIDIKAN</td>
                        </tr>
                        <tr>
                            <td><a href="#modal" data-toggle="modal">900</a></td>
                            <td>RUMPUN ILMU LAINNYA</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Kode</th>
                            <th>Rumpun</th>
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
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">MATEMATIKA DAN ILMU PENGETAHUAN ALAM (MIPA) | Detail Rumpun Ilmu</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#">
                        <div class="modal-body">
                            <div class="row">
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="firstName1">Kode</label>
                                        <input type="number" class="form-control" min="100" max="900">
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="firstName1">Rumpun</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <label for="firstName1">Sub Rumpun Ilmu</label>
                                    <table id="myTable" class="table zero-configuration table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Rumpun</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>110</td>
                                                <td>ILMU IPA</td>
                                                <td>
                                                    <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
                                                        <i class="feather icon-trash-2 text-danger"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>120</td>
                                                <td>MATEMATIKA</td>
                                                <td>
                                                    <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
                                                        <i class="feather icon-trash-2 text-danger"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>130</td>
                                                <td>KEBUMIAN DAN ANGKASA</td>
                                                <td>
                                                    <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
                                                        <i class="feather icon-trash-2 text-danger"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Rumpun</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('js')
@endsection