@extends('layout')

@section('judul')
    Data Master
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/css/plugins/forms/validation/form-validation.css') }}">
@endsection

@section('content')
    @if(session()->get('success'))
        <div class ="alert alert-success">
            {{ session()->get('success') }}  
        </div><br />
    @endif
    <div class="row justify-content-center">
        <!-- left column -->
        <div class="col-md-10">
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">User</h3>

              <div class="card-tools">                
                <a href="#createUser" data-toggle="modal" class="btn btn-outline-success"><i class="fas fa-plus"></i> Tambah</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table zero-configuration table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>NIDN</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>
                                        <div class="avatar text-center">
                                            @isset($item->profile_photo_path)
                                                <img src="{{ asset($item->profile_photo_path) }}" alt="{{ $item->nama }}" height="32" width="32">
                                            @else
                                                <span class="avatar-content">{{ strtoupper($item->nama[0]) }}</span>
                                            @endisset
                                        </div>
                                    </td>
                                    <td><a href="#inlineForm" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->nidn }}</a></td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        @if(count($item['roles']) > 0)
                                            <ul>
                                                @foreach ($item['roles'] as $role)
                                                    <li>{{ $role->description }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td><button class="btn btn-primary"><i class="fas fa-key"></i> Reset Password</button></td>
                                </tr>
                            @endforeach
                        </tbody>
    
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>NIDN</th>
                                <th>Nama</th>
                                <th>Role</th>
                                <th>Aksi</th>
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

        <!-- Modal -->
        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33"> | Detail User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#">
                        <div class="modal-body">
                            <dl class="row">
                                <dt class="col-sm-3">NIDN</dt>
                                <dd id="nidn-text" class="col-sm-9"></dd>
                                
                                <dt class="col-sm-3">Nama</dt>
                                <dd id="nama-text" class="col-sm-9"></dd>
                                
                                <dt class="col-sm-3">Role</dt>
                                <dd class="col-sm-9">
                                    <form action="{{ route('admin.master.user.update', 0)}}">
                                        <input type="text" id="id" hidden>
                                        <fieldset>
                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                <input class="input-role" id="admin" type="checkbox" value="1">
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
                                                <input class="input-role" id="pimpinan" type="checkbox" value="2">
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
                                                <input class="input-role" id="dosen" type="checkbox" value="3">
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
                                                <input class="input-role" id="penelitian" type="checkbox" value="4">
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
                                                <input class="input-role" id="pengabdian" type="checkbox" value="5">
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
                                                <input class="input-role" id="reviewer" type="checkbox" value="6">
                                                <span class="vs-checkbox">
                                                    <span class="vs-checkbox--check">
                                                        <i class="vs-icon feather icon-check"></i>
                                                    </span>
                                                </span>
                                                <span class="">Reviewer</span>
                                            </div>
                                        </fieldset>
                                    </form>
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

        <!-- Modal -->
        <div class="modal fade text-left" id="createUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Tambah User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="#" novalidate>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label>NIDN</label>
                                    <div class="form-group">
                                        <input type="number" placeholder="NIDN" class="form-control" data-validation-required-message="NIDN tidak boleh kosong">
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <label>Nama</label>
                                    <div class="form-group">
                                        <input type="text" placeholder="Nama" class="form-control" data-validation-required-message="Nama tidak boleh kosong">
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <label>Kata Sandi</label>
                                    <div class="form-group">
                                        <input type="password" placeholder="Kata Sandi" class="form-control" data-validation-required-message="Kata Sandi minimal berisi 8 karakter" minlength="8">
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
@endsection

@section('js')
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/validation/form-validation.js') }}"></script>

    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                responsive: true,
                "order": [[ 2, "asc" ]],
                "columnDefs": [
                    { "orderable": false, "targets": 0 }
                ]
            });

            $(document).on('click', '#myTable tbody tr td a', function(e) {
                var id = $(this).attr('data-value');
                $.get( "/admin/master/user/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#myModalLabel33').text(d.nama + " | Detail");
                    $('#nama-text').text(d.nama);
                    $('#nidn-text').text(d.nidn);
                    $('#id').val(d.id);
                    $('.input-role').each(function() {
                        $(this).removeAttr("checked")
                    });
                    for (var i = 0; i < d['roles'].length; i++) {
                        if ($('#admin').val()==d['roles'][i].id) {
                            $('#admin').attr( "checked","checked" );
                        }
                        if ($('#pimpinan').val()==d['roles'][i].id) {
                            $('#pimpinan').attr( "checked","checked" );
                        }
                        if ($('#dosen').val()==d['roles'][i].id) {
                            $('#dosen').attr( "checked","checked" );
                        }
                        if ($('#penelitian').val()==d['roles'][i].id) {
                            $('#penelitian').attr( "checked","checked" );
                        }
                        if ($('#pengabdian').val()==d['roles'][i].id) {
                            $('#pengabdian').attr( "checked","checked" );
                        }
                        if ($('#reviewer').val()==d['roles'][i].id) {
                            $('#reviewer').attr( "checked","checked" );
                        }
                    }
                });
                console.log($(this).attr('data-value'));
            });
        } );
    </script>
@endsection