@extends('layout')

@section('judul')
    Usulan | {{ $usulan->tahun_skema }} - {{ $usulan->kode }}
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
            {{ $message }}
        </div>
    @endif

    @if ($message = Session::get('danger'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
            {{ $message }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-block">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Step 4 - Luaran & Target</h3>

            <div class="card-tools">
                <a href="#inlineForm" class="btn btn-outline-success" data-toggle="modal"><i class="fas fa-plus"></i> Tambah</a>
            </div>
        </div>
        <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="d-flex justify-content-center">
                        <div class="col-md-8">
                            <p class="font-weight-bold mb-2">Pada bagian ini, pengusul wajib mengisi luaran wajib & tambahan, tahun capaian, dan status pencapaiannya. Sama halnya seperti pada luaran penelitian, luaran publikasi pengabdian kepada masyarakat</p>
                            <h3>Informasi Luaran Wajib</h3>
                            <ul>
                                <li>Jurnal ilmiah nasional (minimal SINTA 6)
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tahun</th>
                                <th>Luaran</th>
                                <th>Target</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usulanLuaran as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>Ke-{{ $item->tahun }}</td>
                                    <td><a href="#modalEdit" class="modal-edit" data-value="{{ $item->id }}" data-toggle="modal">{{ $item->nama_luaran }}</a></td>
                                    <td>{{ $item->nama_target }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>
                                        <form action="{{ route('luaran.destroy', $item->id)}}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{ $item->nama_luaran }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary mr-1 mb-1 waves-effect waves-light modal-edit" data-toggle="modal" data-target="#modalEdit" data-value="{{ $item->id }}" title="Ubah"><i class="feather icon-edit-2"></i></button>
                                            <button type="submit" class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1 waves-effect waves-light" title="Hapus"><i class="feather icon-trash-2"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer row">
                <div class="col-6">
                    <a class="btn btn-warning px-1" href="{{ route('dosen.usulan.backward') }}" onclick="event.preventDefault();
                    document.getElementById('backward-form').submit();">Kembali</a>
                </div>
                <div class="col-6 text-right">
                    <input type="hidden" name="step" value="5">
                    <input type="hidden" name="usulan_id" value="{{ $usulan->id }}">
                    <button type="submit" class="btn btn-success px-1">Lanjut</a>
                </div>
            </div>
            <!-- /.card-footer -->
    </div>
        
    <form id="backward-form" action="{{ route('dosen.usulan.backward') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <!-- /.card -->

    <!-- .modal-create -->
    <div class="modal fade text-left" id="inlineForm" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Tambah Luaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('luaran.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tahun</label>
                            <select class="form-control" name="tahun" required autofocus>
                                <option value="" hidden>--Pilih tahun</option>
                                @foreach ($tahun as $item)
                                    <option value="{{ $item }}">Ke-{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Luaran</label>
                            <select name="luaran_luaran_id" class="form-control" id="luaranLuaranCreate" required>
                                <option value="" hidden>--Pilih luaran</option>
                                @foreach ($luaran as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Target</label>
                            <select name="luaran_target_id" class="form-control" id="luaranTargetCreate" disabled required>
                                <option value="" hidden>--Pilih target</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Jumlah</label>
                            <select name="jumlah" class="form-control" required>
                                <option value="" hidden>--Pilih jumlah</option>
                                @foreach ($jumlah as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="usulan_id" value="{{ $usulan->id }}" required>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.modal-create -->

    <!-- .modal-edit -->
    <div class="modal fade text-left" id="modalEdit" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Ubah Luaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST" id="formUpdate">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tahun</label>
                            <select class="form-control" name="tahun" id="tahunUpdate" required autofocus>
                                <option value="" hidden>--Pilih tahun</option>
                                @foreach ($tahun as $item)
                                    <option value="{{ $item }}">Ke-{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Luaran</label>
                            <select name="luaran_luaran_id" class="form-control" id="luaranLuaranUpdate" required>
                                <option value="" hidden>--Pilih luaran</option>
                                @foreach ($luaran as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Target</label>
                            <select name="luaran_target_id" class="form-control" id="luaranTargetUpdate" readonly required>
                                <option value="" hidden>--Pilih target</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Jumlah</label>
                            <select name="jumlah" class="form-control" id="jumlahUpdate" required>
                                <option value="" hidden>--Pilih jumlah</option>
                                @foreach ($jumlah as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="keteranganUpdate" placeholder="Keterangan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.modal-edit -->
@endsection

@section('js')
    <script>
        $(document).ready( function () {
            $('form').submit(function() {
                $(this).find("button[type='submit']").prop('disabled', true);
            })

            $('#luaranLuaranCreate').change(function () {
                let luaranLuaranId = $('#luaranLuaranCreate option:selected').val()
                $.get("/luaran-target/" + luaranLuaranId, function( data ) {
                    var d = JSON.parse(data);
                    console.log(d)
                    $('#luaranTargetCreate').removeAttr('disabled')
                    $('#luaranTargetCreate').empty()
                    $('#luaranTargetCreate').append('<option value="" hidden>--Pilih target</option>')
                    for (let index = 0; index < d.length; index++) {
                        $('#luaranTargetCreate').append('<option value="' + d[index].id + '">' + d[index].nama + '</option>')
                    }
                });
            })

            $(document).on('click', '.modal-edit', function () {
                let id = $(this).attr('data-value')
                $.get("/luaran/" + id, function( data ) {
                    let d = JSON.parse(data);
                    console.log(d)
                    $('#formUpdate').attr('action', '{{ url("luaran") }}/' + id);
                    $('#tahunUpdate').val(d.tahun);
                    $('#luaranLuaranUpdate').val(d.luaran_luaran_id);
                    $('#luaranTargetUpdate').append('<option value="' + d.luaran_target_id + '" selected>' + d.nama_target + '</option>');
                    $('#jumlahUpdate').val(d.jumlah);
                    $('#keteranganUpdate').val(d.keterangan);
                });
            })

            $('#luaranLuaranUpdate').change(function () {
                let luaranLuaranId = $('#luaranLuaranUpdate option:selected').val()
                $.get("/luaran-target/" + luaranLuaranId, function( data ) {
                    var d = JSON.parse(data);
                    console.log(d)
                    $('#luaranTargetUpdate').removeAttr('disabled')
                    $('#luaranTargetUpdate').empty()
                    $('#luaranTargetUpdate').append('<option value="" hidden>--Pilih target</option>')
                    for (let index = 0; index < d.length; index++) {
                        $('#luaranTargetUpdate').append('<option value="' + d[index].id + '">' + d[index].nama + '</option>')
                    }
                });
            })
        });
    </script>
@endsection