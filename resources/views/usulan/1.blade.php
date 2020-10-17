@extends('layout')

@section('judul')
    Usulan | {{ $usulan->tahun_skema }} - {{ $usulan->kode }}
@endsection

@section('content')
    @if(session()->get('success'))
        <div class ="alert alert-success">
            {{ session()->get('success') }}  
        </div><br />
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
                            <div class="col-md-10">
                                <p class="mb-0">{{ $usulan->rumpun_ilmu_1 }}</p>
                                @isset($usulan->rumpun_ilmu_2)
                                    <ul>
                                        <li>{{ $usulan->rumpun_ilmu_2 }}
                                            @isset($usulan->rumpun_ilmu_3)
                                                <ul>
                                                    <li>{{ $usulan->rumpun_ilmu_3 }}</li>
                                                </ul>
                                            @endisset
                                        </li>
                                    </ul>
                                @endisset
                            </div>
                        </div>
                    @endisset
                    <div class="form-group row">
                        <div class="col-md-2 text-md-right mt-1">
                            <span>Rumpun Ilmu :</span>
                        </div>
                        <div class="col-md-4">
                            <select name="rumpun_ilmu_1" class="form-control rumpun_ilmu_1" required>
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
                    <div class="form-group row">
                        <div class="col-md-2 text-md-right">
                            <span>Program :</span>
                        </div>
                        <div class="col-md-10">
                            <select name="program" class="form-control" required>
                                <option value="" hidden>--Pilih program</option>
                                <option value="Penelitian - Desentralisasi"
                                    @if ($usulan->program == 'Penelitian - Desentralisasi')
                                        selected
                                    @endif
                                >Penelitian - Desentralisasi</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2 text-md-right">
                            <span>Kategori SBK :</span>
                        </div>
                        <div class="col-md-10">
                            <select name="kategori_sbk" class="form-control" required>
                                <option value="" hidden>--Pilih kategori SBK</option>
                                <option value="SBK Riset Dasar"
                                    @if ($usulan->kategori_sbk == 'SBK Riset Dasar')
                                        selected
                                    @endif
                                >SBK Riset Dasar</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2 text-md-right">
                            <span>Lama Kegiatan :</span>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="waktu" class="form-control" min="1" max="30" value="{{ $usulan->waktu }}" required>
                        </div>
                        <div class="col-md-8">
                            <select name="satuan_waktu_id" class="form-control">
                                <option value="" hidden>--Pilih satuan waktu</option>
                                @foreach ($satuan as $item)
                                    <option value="{{ $item->id }}"
                                        @if ($usulan->satuan_waktu_id == $item)
                                            selected
                                        @endif    
                                    >{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2 text-md-right">
                            <span>Bidang Unggulan PT :</span>
                        </div>
                        <div class="col-md-10">
                            <select name="bidang_unggulan_pt" class="form-control" required>
                                <option value="" hidden>--Pilih bidang unggulan PT</option>
                                <option value="Pendidikan Karakter"
                                    @if ($usulan->bidang_unggulan_pt == 'Pendidikan Karakter')
                                        selected
                                    @endif
                                >Pendidikan Karakter</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2 text-md-right">
                            <span>Topik Unggulan PT :</span>
                        </div>
                        <div class="col-md-10">
                            <select name="topik_unggulan_pt" class="form-control" required>
                                <option value="" hidden>--Pilih topik unggulan PT</option>
                                <option value="Tingkat SD"
                                    @if ($usulan->topik_unggulan_pt == 'Tingkat SD')
                                        selected
                                    @endif
                                >Tingkat SD</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10 offset-md-2">
                            <button class="btn btn-primary px-1">Renstra Penelitian</button>
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