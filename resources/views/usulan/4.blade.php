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
        </div>
        <!-- /.card-header -->
        <form action="{{ route('dosen.usulan.update', $usulan->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="row">
                    <div class=" d-flex justify-content-center">
                        <div class="col-md-8">
                            <p class="font-weight-bold mb-2">Pada bagian ini, pengusul wajib mengisi luaran wajib & tambahan, tahun capaian, dan status pencapaiannya. Sama halnya seperti pada luaran penelitian, luaran publikasi pengabdian kepada masyarakat</p>
                            <h3>Informasi Luaran Wajib</h3>
                            <ul>
                                <li>Jurnal ilmiah nasional (minimal SINTA 6)
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Tahun :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <select class="form-control" name="tahun" required autofocus>
                                    <option value="" hidden>--Pilih tahun</option>
                                    @foreach ($tahun as $item)
                                        <option value="{{ $item }}"
                                        @isset($usulanLuaran)
                                            @if ($usulanLuaran->tahun == $item)
                                                selected
                                            @endif
                                        @endisset
                                    >Ke-{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Luaran :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <select name="luaran_luaran_id" class="form-control" id="luaranLuaranId" required>
                                    <option value="" hidden>--Pilih luaran</option>
                                    @foreach ($luaran as $item)
                                        <option value="{{ $item->id }}"
                                            @isset($usulanLuaran)
                                                @if ($usulanLuaran->luaran_luaran_id == $item->id)
                                                    selected
                                                @endif
                                            @endisset
                                        >{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Target :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <select name="luaran_target_id" class="form-control" id="luaranTargetId" required>
                                    <option value="" hidden>--Pilih target</option>
                                    @isset($usulanLuaran)
                                        @foreach ($target as $item)
                                            @if ($usulanLuaran->luaran_target_id == $item->id)
                                                <option value="{{ $item->id }}" selected>{{ $item->nama }}</option>
                                            @endif
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Jumlah :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <select name="jumlah" class="form-control" required>
                                    <option value="" hidden>--Pilih jumlah</option>
                                    @foreach ($jumlah as $item)
                                        <option value="{{ $item }}"
                                        @isset($usulanLuaran)
                                            @if ($usulanLuaran->jumlah == $item)
                                                selected
                                            @endif
                                        @endisset
                                    >{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-md-3 col-4 text-right">
                                <span>Keterangan :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="@isset($usulanLuaran){{ $usulanLuaran->keterangan }}@endisset">
                            </div>
                        </div>
                    </div>
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
        </form>
    </div>
        
    <form id="backward-form" action="{{ route('dosen.usulan.backward') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <!-- /.card -->
@endsection

@section('js')
    <script>
        $(document).ready( function () {
            $('form').submit(function() {
                $(this).find("button[type='submit']").prop('disabled', true);
            })

            $('#luaranLuaranId').change(function () {
                let luaranLuaranId = $('#luaranLuaranId option:selected').val()
                $.get("/luaran-target/" + luaranLuaranId, function( data ) {
                    var d = JSON.parse(data);
                    console.log(d)
                    $('#luaranTargetId').empty()
                    $('#luaranTargetId').append('<option value="" hidden>--Pilih target</option>')
                    for (let index = 0; index < d.length; index++) {
                        $('#luaranTargetId').append('<option value="' + d[index].id + '">' + d[index].nama + '</option>')
                    }
                });
            })
        });
    </script>
@endsection