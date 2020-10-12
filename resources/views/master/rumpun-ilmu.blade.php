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
                        @foreach ($data as $item)
                            <tr>
                                <td><a href="#modal" data-toggle="modal" data-value="{{ $item->kode }}">{{ $item->kode }}</a></td>
                                <td>{{ $item->rumpun }}</td>
                            </tr>
                        @endforeach
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
                        <h4 class="modal-title" id="myModalLabel33">Detail Rumpun Ilmu</h4>
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
                                        <input type="number" class="form-control" id="kode" min="100" max="900">
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="firstName1">Rumpun</label>
                                        <input type="text" class="form-control" id="rumpun">
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
                                        <tbody id="table-modal"></tbody>
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

        <!-- submodal -->
        <div class="modal fade text-left" id="submodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel332">Detail Rumpun Ilmu</h4>
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
                                        <input type="number" class="form-control" id="kode2" min="100" max="900">
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="firstName1">Rumpun</label>
                                        <input type="text" class="form-control" id="rumpun2">
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
                                        <tbody id="table-submodal"></tbody>
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

        <!-- submodal -->
        <div class="modal fade text-left" id="subsubmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel3322 ">Detail Rumpun Ilmu</h4>
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
                                        <input type="number" class="form-control" id="kode2" min="100" max="900">
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="firstName1">Rumpun</label>
                                        <input type="text" class="form-control" id="rumpun2">
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
                                        <tbody id="table-subsubmodal"></tbody>
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
    <script>
            $(document).on('click', '.abc', function() {
                var id = $(this).attr('data-value');
                $.get( "/admin/master/rumpun-ilmu/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#myModalLabel332').text(d.rumpun + " | Detail Rumpun Ilmu");
                    $('#kode2').val(d.kode);
                    $('#rumpun2').val(d.rumpun);
                    $('#table-submodal tr').remove();
                    for (let i = 0; i < d.sub.length; i++) {
                        $('#table-submodal').append(`<tr>
                                            <td><a href="#submodal" data-toggle="modal" data-value="`+ d.sub[i]['kode'] +`">`+ d.sub[i]['kode'] +`</a></td>
                                            <td>`+ d.sub[i]['rumpun'] +`</td>
                                            <td>
                                                <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
                                                    <i class="feather icon-trash-2 text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>`);
                    }
                });
                console.log($(this).attr('data-value'));
            });
    </script>
    <script>
            $(document).on('click', '.abc', function() {
                var id = $(this).attr('data-value');
                $.get( "/admin/master/rumpun-ilmu/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#myModalLabel332').text(d.rumpun + " | Detail Rumpun Ilmu");
                    $('#kode2').val(d.kode);
                    $('#rumpun2').val(d.rumpun);
                    $('#table-submodal tr').remove();
                    for (let i = 0; i < d.sub.length; i++) {
                        $('#table-submodal').append(`<tr>
                                            <td><a href="#submodal" data-toggle="modal" data-value="`+ d.sub[i]['kode'] +`">`+ d.sub[i]['kode'] +`</a></td>
                                            <td>`+ d.sub[i]['rumpun'] +`</td>
                                            <td>
                                                <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
                                                    <i class="feather icon-trash-2 text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>`);
                    }
                });
                console.log($(this).attr('data-value'));
            });
    </script>
    <script>
            $(document).on('click', '#myTable tbody tr td a', function(event) {
                var id = $(this).attr('data-value');
                $.get( "/admin/master/rumpun-ilmu/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#myModalLabel33').text(d.rumpun + " | Detail Rumpun Ilmu");
                    $('#kode').val(d.kode);
                    $('#rumpun').val(d.rumpun);
                    $('#table-modal tr').remove();
                    for (let i = 0; i < d.sub.length; i++) {
                        $('#table-modal').append(`<tr>
                                            <td><a class="abc" href="#submodal" data-toggle="modal" data-value="`+ d.sub[i]['kode'] +`" " data-dismiss="modal">`+ d.sub[i]['kode'] +`</a></td>
                                            <td>`+ d.sub[i]['rumpun'] +`</td>
                                            <td>
                                                <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
                                                    <i class="feather icon-trash-2 text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>`);
                    }
                });
                console.log($(this).attr('data-value'));
            });
    </script>
    <script>
            $(document).on('click', '#myTable tbody tr td a', function(event) {
                var id = $(this).attr('data-value');
                $.get( "/admin/master/rumpun-ilmu/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#myModalLabel33').text(d.rumpun + " | Detail Rumpun Ilmu");
                    $('#kode').val(d.kode);
                    $('#rumpun').val(d.rumpun);
                    $('#table-modal tr').remove();
                    for (let i = 0; i < d.sub.length; i++) {
                        $('#table-modal').append(`<tr>
                                            <td><a class="abc" href="#submodal" data-toggle="modal" data-value="`+ d.sub[i]['kode'] +`" " data-dismiss="modal">`+ d.sub[i]['kode'] +`</a></td>
                                            <td>`+ d.sub[i]['rumpun'] +`</td>
                                            <td>
                                                <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus">
                                                    <i class="feather icon-trash-2 text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>`);
                    }
                });
                console.log($(this).attr('data-value'));
            });
    </script>
@endsection