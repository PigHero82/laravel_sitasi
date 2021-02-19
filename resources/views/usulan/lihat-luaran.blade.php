@extends('layout')

@section('judul')
    Revisi Luaran
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
            <h3 class="card-title">Revisi Luaran & Target</h3>

            <div class="card-tools">
                <a href="#modalCreate" class="btn btn-outline-success" data-toggle="modal"><i class="fas fa-plus"></i> Tambah</a>
            </div>
        </div>
        <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="d-flex justify-content-center">
                        <div class="col-md-8">
                            <p class="font-weight-bold mb-2">Pada bagian ini, pengusul wajib mengisi luaran wajib & tambahan, tahun capaian, dan status pencapaiannya. Sama halnya seperti pada luaran penelitian, luaran publikasi pengabdian kepada masyarakat</p>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <form action="{{ route('dosen.usulan.luaran.update', $usulanId) }}" method="post">
                @csrf
                @method('PATCH')

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tahun</th>
                                <th>Luaran</th>
                                <th>Target</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="table-luaran">
                            @php
                                $ind = 0;
                            @endphp
                            @foreach ($usulanLuaran as $item)
                                <tr id="{{ $loop->index }}">

                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <input type="hidden" name="item[{{ $loop->index }}][tahun]" value="{{ $item->tahun }}">
                                        Ke-{{ $item->tahun }}
                                    </td>
                                    <td>
                                        <input type="hidden" name="item[{{ $loop->index }}][luaran_luaran_id]" value="{{ $item->luaran_luaran_id }}">
                                        <a href="#modalEdit" class="modal-edit" data-value="{{ $item->id }}" data-toggle="modal">{{ $item->nama_luaran }}</a>
                                    </td>
                                    <td>
                                        <input type="hidden" name="item[{{ $loop->index }}][luaran_target_id]" value="{{ $item->luaran_target_id }}">
                                        {{ $item->nama_target }}
                                    </td>
                                    <td>
                                        <input type="hidden" name="item[{{ $loop->index }}][jumlah]" value="{{ $item->jumlah }}">
                                        {{ $item->jumlah }}
                                    </td>
                                    <td>
                                        <input type="hidden" name="item[{{ $loop->index }}][keterangan]" value="{{ $item->keterangan }}">
                                        {{ $item->keterangan }}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary mr-1 mb-1 waves-effect waves-light modal-edit action-edit" data-toggle="modal" data-target="#modalEdit" data-value="{{ $item->id }}" title="Ubah"><i class="feather icon-edit-2"></i></button>
                                        <button type="submit" class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1 waves-effect waves-light action-delete" title="Hapus"><i class="feather icon-trash-2"></i></button>
                                        
                                    </td>
                                </tr>
                            @php
                                $ind = $loop->index;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                
                </div>
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                    
                </div>
            </div>
            <!-- /.card-body -->
  
            </form>
            <!-- /.card-footer -->
    </div>
        

    <!-- /.card -->

    <!-- .modal-create -->
    <div class="modal fade text-left" id="modalCreate" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Tambah Luaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('luaran.store') }}" method="POST" id="formCreate">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tahun</label>
                            <select class="form-control" name="tahun" required id="tahunCreate" autofocus>
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
                            <select name="jumlah" class="form-control" id="jumlahCreate" required>
                                <option value="" hidden>--Pilih jumlah</option>
                                @foreach ($jumlah as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" id="keteranganCreate">
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <input type="hidden" name="usulan_id" value="{{ $usulanid }}" required> --}}
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
        function genHTML(ind,modal){
            var no = '<td>'+ (ind + 1) +'</td>';
            var tahun = '<td><input type="hidden" name="item['+ ind +'][tahun]" value="'+ $('#tahun'+modal).val() +'">ke-'+ $('#tahun'+modal).val() +'</td>';
            var luaran = '<td><input type="hidden" name="item['+ ind +'][luaran_luaran_id]" value="'+ $('#luaranLuaran'+modal).val() +'">'+ $('#luaranLuaran'+modal).find(':selected').text() +'</td>';
            var target = '<td><input type="hidden" name="item['+ ind +'][luaran_target_id]" value="'+ $('#luaranTarget'+modal).val() +'">'+ $('#luaranTarget'+modal).find(':selected').text() +'</td>';
            var jumlah = '<td><input type="hidden" name="item['+ ind +'][jumlah]" value="'+ $('#jumlah'+modal).val() +'">'+ $('#jumlah'+modal).find(':selected').text() +'</td>';
            var keterangan = '<td><input type="hidden" name="item['+ ind +'][keterangan]" value="'+ $('#keterangan'+modal).val() +'">'+ $('#keterangan'+modal).val() +'</td>';
            var aksi = '<td><button type="submit" class="btn btn-icon btn-icon rounded-circle btn-danger mr-1 mb-1 waves-effect waves-light action-delete" title="Hapus"><i class="feather icon-trash-2"></i></button></td>';

            return (no+tahun+luaran+target+jumlah+keterangan+aksi);
        }

        $(document).ready( function () {
            var trID;
            $('#luaranLuaranCreate').change(function () {
                let luaranLuaranId = $('#luaranLuaranCreate option:selected').val()
                $.get("/luaran-target/" + luaranLuaranId, function( data ) {
                    var d = JSON.parse(data);
                    $('#luaranTargetCreate').removeAttr('disabled')
                    $('#luaranTargetCreate').empty()
                    $('#luaranTargetCreate').append('<option value="" hidden>--Pilih target</option>')
                    for (let index = 0; index < d.length; index++) {
                        $('#luaranTargetCreate').append('<option value="' + d[index].id + '">' + d[index].nama + '</option>')
                    }
                });
            });
            $('.action-edit').on('click',function(){
                trID = $(this).parent().parent().attr('id');
            });
            $(document).on('click','.action-delete',function(e){
                $(this).parent().parent().remove();
                e.preventDefault(e);
            });

            $('#formUpdate').on('submit',function(e){
                e.preventDefault(e);
                var ind = parseInt(trID);
                $('tr#'+trID).empty();
                ap = genHTML(ind,'Update');
                
                $('tr#'+trID).append(ap);
                $('#modalEdit .form-control').val('');
                

                $('#modalEdit').modal('hide');
            });
            $('#formCreate').on('submit',function(e){
                e.preventDefault(e);

                var ind = {{ $ind + 1 }};
                var ap = '<tr id="'+ ind +'">';
                ap += genHTML(ind,'Create');
                ap += '</tr>';
                
                $('#table-luaran').append(ap);
                $('#modalCreate .form-control').val('');
                $('#modalCreate').modal('hide');
            });

            $(document).on('click', '.modal-edit', function () {
                let id = $(this).attr('data-value')
                $.get("/luaran/" + id, function( data ) {
                    let d = JSON.parse(data);
                    
                    $('#modalEdit .form-control').val('');
                    $('#tahunUpdate').val(d.tahun);
                    $('#luaranLuaranUpdate').val(d.luaran_luaran_id);
                    $('#luaranTargetUpdate').append('<option value="' + d.luaran_target_id + '" selected>' + d.nama_target + '</option>');
                    $('#jumlahUpdate').val(d.jumlah);
                    $('#keteranganUpdate').val(d.keterangan);
                });
            });

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
            });
        });
    </script>
@endsection