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

    <form action="{{ route('dosen.usulan.update', $usulan->id) }}" method="post">
        <div class="card">
            @csrf
            @method('PATCH')
            <div class="card-header">
                <h3 class="card-title">Step 1 - Identitas Usulan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-2 text-md-right">
                        <span>Judul :</span>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="judul" class="form-control" maxlength="250" value="{{ $usulan->judul }}" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 text-md-right">
                        <span>Ringkasan :</span>
                    </div>
                    <div class="col-md-10">
                        <textarea name="ringkasan" cols="50" rows="5" class="form-control" placeholder="Ringkasan penelitian tidak lebih dari 500 kata." required >{{ $usulan->ringkasan }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2 text-md-right">
                        <span>Kata Kunci :</span>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="kata_kunci" class="form-control" placeholder="Pisahkan dengan tanda koma" value="{{ $usulan->kata_kunci }}" required>
                    </div>
                </div>
                @isset($usulan->rumpun_ilmu_1)
                    <div class="form-group row">
                        <div class="col-md-2 text-md-right">
                            <span>Rumpun Ilmu Saat Ini :</span>
                        </div>
                        @if ($rumpunIlmu[0] != NULL)
                            <div class="col-md-4">
                                <span>{{ $rumpunIlmu[0] }}</span>
                            </div>
                        @endif
                        @if ($rumpunIlmu[1] != NULL)
                            <div class="col-md-3">
                                <span>{{ $rumpunIlmu[1] }}</span>
                            </div>
                        @endif
                        @if ($rumpunIlmu[2] != NULL)
                            <div class="col-md-3">
                                <span>{{ $rumpunIlmu[2] }}</span>
                            </div>
                        @endif
                    </div>
                @endisset
                <div class="form-group row">
                    <div class="col-md-2 text-md-right mt-1">
                        <span>Rumpun Ilmu :</span>
                    </div>
                    <div class="col-md-4">
                        <select name="rumpun_ilmu_1" class="form-control rumpun_ilmu_1">
                            <option value="" hidden>--Pilih rumpun ilmu</option>
                            @foreach ($data as $item)
                                <option value="{{ $item->kode }}">{{ $item->rumpun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="rumpun_ilmu_2" id="rumpun_ilmu_2" class="form-control rumpun_ilmu_2">
                            <option value="" hidden>--Pilih sub rumpun ilmu</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="rumpun_ilmu_3" id="rumpun_ilmu_3" class="form-control rumpun_ilmu_3">
                            <option value="" hidden>--Pilih sub rumpun ilmu</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="float-right">
                    <input type="hidden" name="step" value="2">
                    <button type="submit" class="btn btn-success px-1">Lanjut</button>
                </div>
            </div>
            <!-- /.card-footer -->
        </div>
    </form>
    <!-- /.card -->
<!-- general form elements -->

@endsection

@section('js')
    <script>    
        $(function($){
            $('form').submit(function() {
                $(this).find("button[type='submit']").prop('disabled', true);
            });
            
            $( "select.rumpun_ilmu_1" ).change(function() {
                var id = $(this).children("option:selected").val();
                $.get( "/dosen/rumpun-ilmu/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#rumpun_ilmu_2').empty();
                    $('#rumpun_ilmu_3').empty();
                    $('#rumpun_ilmu_2').append('<option value="" hidden>--Pilih sub rumpun ilmu</option>');
                    $('#rumpun_ilmu_3').append('<option value="" hidden>--Pilih sub rumpun ilmu</option>');
                    for (var i = 0; i <= d['sub'].length; i++) {
                        $('#rumpun_ilmu_2').append('<option value="' + d['sub'][i].kode + '">' + d['sub'][i].rumpun + '</option>');
                    }
                });
                console.log($(this).children("option:selected").val());
            });

            $( "select.rumpun_ilmu_2" ).change(function() {
                var id = $(this).children("option:selected").val();
                $.get( "/dosen/rumpun-ilmu/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#rumpun_ilmu_3').empty();
                    $('#rumpun_ilmu_3').append('<option value="" hidden>--Pilih sub rumpun ilmu</option>');
                    for (var i = 0; i <= d['sub'].length; i++) {
                        $('#rumpun_ilmu_3').append('<option value="' + d['sub'][i].kode + '">' + d['sub'][i].rumpun + '</option>');
                    }
                });
                console.log($(this).children("option:selected").val());
            });
		});
    </script>
@endsection