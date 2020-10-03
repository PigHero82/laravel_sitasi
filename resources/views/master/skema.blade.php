@extends('layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css"> --}}
@endsection

@section('judul')
    Data Master Skema
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="feather icon-check mr-1 align-middle"></i>
            <span>{{ $message }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
            </button>
        </div>
    @endif
    
    @if ($message = Session::get('danger'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="feather icon-x mr-1 align-middle"></i>
            <span>{{ $message }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
            </button>
        </div>
    @endif
    
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Error</h4>
            <p class="mb-0">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </p>
        </div>
    @endif

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">

          <!-- general form elements -->
        @if (count($data) > 0)
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Skema</h3>

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
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Jenis</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td><a href="#ubahmodal" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->kode }}</a></td>
                                    <td>{{ $item->nama }}</a></td>
                                    <td>
                                        @if ($item->jenis == 1)
                                            Penelitian
                                        @elseif ($item->jenis == 2)
                                            Pengabdian
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.master.skema.destroy', $item->id)}}" method="post">
                                          @csrf
                                          @method('DELETE')
                                          <div class="fonticon-wrap">
                                              <button style="padding: 0; border: none; background: none;" type="submit"><i class="feather icon-trash-2 text-danger"></i></button>
                                          </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Jenis</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        @else
            <!-- general form elements -->
            <div class="card bg-danger text-white">
                <div class="card-header">
                    <h3 class="card-title text-white">Skema</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal">
                            <i class="fas fa-plus"></i> Tambah
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-content">
                    <div class="card-body text-center">
                        <h1 class="text-white"><i class="feather icon-alert-octagon"></i></h1>
                        <h4 class="card-title text-white">Tidak ada data</h4>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        @endif

        </div>
        <!--/.col (left) -->
    </div>
    <!-- /.row -->

    <!-- modal -->
    <div class="modal fade text-left" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Tambah Skema</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.master.skema.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="kode">Nama</label>
                                    <input type="text" class="form-control" name="kode" required>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Nama">Deskripsi</label>
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Jenis</label>
                                <div class="form-group">
                                    <select class="form-control" name="jenis" required>
                                        <option value="" hidden>--Pilih Jenis Skema</option>
                                        <option value="1">Penelitian</option>
                                        <option value="2">Pengabdian</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade text-left" id="ubahmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Ubah Skema</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.master.skema.update', Auth::user()->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="kode">Nama</label>
                                    <input type="text" class="form-control" name="id" id="id" hidden required>
                                    <input type="text" class="form-control" name="kode" id="kode" required>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama">Deskripsi</label>
                                    <input type="text" class="form-control" name="nama" id="nama" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Jenis</label>
                                <div class="form-group">
                                    <select class="form-control" name="jenis" id="jenis" required>
                                        <option value="" hidden></option>
                                        <option value="1">Penelitian</option>
                                        <option value="2">Pengabdian</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready( function () {
            $(document).on('click', '#myTable tbody tr td a', function(e) {
                var id = $(this).attr('data-value');
                $.get( "/admin/master/skema/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#id').val(d.id);
                    $('#kode').val(d.kode);
                    $('#nama').val(d.nama);
                    $('#jenis').val(d.jenis);
                });
                console.log($(this).attr('data-value'));
            });
        } );
    </script>
@endsection