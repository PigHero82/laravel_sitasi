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
            <h3 class="card-title mb-2">Step 7 - Kelengkapan Lain</h3>
        </div>
        <!-- /.card-header -->
    </div>
    <!-- account setting page start -->
    <section id="page-account-settings">
        <div class="row">
            <!-- left menu section -->
            <div class="col-md-3 mb-2 mb-md-0">
                <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75 active" id="dana-pt-pill" data-toggle="pill" href="#dana-pt-vertical" aria-expanded="true">
                            <i class="feather icon-file-text mr-50 font-medium-3"></i>
                            Dana Perguruan Tinggi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75" id="mitra-pill" data-toggle="pill" href="#mitra-vertical" aria-expanded="false">
                            <i class="feather icon-clipboard mr-50 font-medium-3"></i>
                            Tambah Mitra @if (Cookie::get('jenis') == 1)Penelitian @elseif (Cookie::get('jenis') == 2)Pengabdian @endif
                        </a>
                    </li>
                </ul>
            </div>
            <!-- right content section -->
            <div class="col-md-9">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="dana-pt-vertical" aria-labelledby="dana-pt-pill" aria-expanded="true">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="{{ route('dosen.usulan.dana') }}" method="POST">
                                        @csrf
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <label for="usulan_dana">Usulan Dana (Rp.)
                                                <br>
                                                <span class="text-danger">Dana maksimal Rp. {{ number_format($skema->dana_maksimal, 0, ',', '.') }}</span>
                                            </label>
                                            <input type="hidden" name="usulan_id" value="{{ $usulan->id }}" required>
                                            <input type="number" class="form-control" name="usulan_dana" placeholder="" max="{{ $skema->dana_maksimal }}" value="{{ $usulan->usulan_dana }}" required>
                                            <div class="form-control-position">
                                                <p class="text-muted font-small-3 ml-1 pt-3">Rp.</p>
                                            </div>
                                        </fieldset>
                                        <div class="row">
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mb-1 mb-sm-0">Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="mitra-vertical" role="tabpanel" aria-labelledby="mitra-pill" aria-expanded="false">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="{{ route('dosen.usulan.mitra.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <div class="controls">
                                                    <label for="nama">Nama Mitra <span class="text-danger">*</span></label>
                                                    <input type="hidden" name="usulan_id" value="{{ $usulan->id }}" required>
                                                    <input type="text" class="form-control" name="nama" placeholder="Nama Mitra" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="controls">
                                                    <label for="pimpinan">Nama Pimpinan <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="pimpinan" placeholder="Nama Pimpinan" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="controls">
                                                    <label for="jenis">Jenis <span class="text-danger">*</span></label>
                                                    @if ($mitraJenis->isNotEmpty())
                                                        <select class="form-control" name="mitra_jenis_id" required>
                                                            <option value="" hidden>--Pilih jenis mitra</option>
                                                            @foreach ($mitraJenis as $item)
                                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                            @endforeach
                                                        </select>
                                                    @else
                                                        <input type="text" value="Tidak ada jenis mitra">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="controls">
                                                    <label for="institusi">Institusi <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="institusi" placeholder="Institusi" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="controls">
                                                    <label for="provinsi">Provinsi <span class="text-danger">*</span></label>
                                                    <select class="form-control provinsi_create" id="provinsi_create" name="provinsi_id" required>
                                                        <option value="" hidden>--Pilih provinsi</option>
                                                        @foreach ($provinsi as $item)
                                                            <option value="{{ $item->id }}">{{ $item->nama_provinsi }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="controls">
                                                    <label for="kabupaten">Kabupaten/Kota <span class="text-danger">*</span></label>
                                                    <select class="form-control kabkota_create" id="kabkota_create" name="kabkota_id" required>
                                                        <option value="" hidden>--Pilih kabupaten/kota</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="controls">
                                                    <label for="kecamatan">Kecamatan <span class="text-danger">*</span></label>
                                                    <select class="form-control kecamatan_create" id="kecamatan_create" name="kecamatan_id" required>
                                                        <option value="" hidden>--Pilih kecamatan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="controls">
                                                    <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="controls">
                                                    <label for="telepon">No. Telepon <span class="text-danger">*</span></label>
                                                    <input type="tel" class="form-control" name="tlp" placeholder="No. Telepon" value="" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="controls">
                                                    <label for="hp">No. HP</label>
                                                    <input type="tel" class="form-control" name="hp" placeholder="No. HP" value="">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="controls">
                                                    <label for="fax">No. Fax</label>
                                                    <input type="tel" class="form-control" name="fax" placeholder="No. Fax" value="">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="controls">
                                                    <label for="email">Alamat Email</label>
                                                    <input type="email" class="form-control" name="email" placeholder="Alamat Email" value="">
                                                </div>
                                            </div>
                                            <fieldset class="form-group position-relative has-icon-left col-md-6">
                                                <label for="dana_mitra">Dana Mitra (Rp.)</label>
                                                <input type="number" class="form-control" name="dana" placeholder="" max="{{ $skema->dana_maksimal }}">
                                                <div class="form-control-position">
                                                    <p class="text-muted font-small-3 ml-1" style="padding-top: 25px">Rp.</p>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group col-md-6">
                                                <label for="surat">Surat Pernyataan Mitra (pdf, maksimal 5 MB) <span class="text-danger">*</span></label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="surat_path" id="inputGroupFile01" required>
                                                    <label class="custom-file-label" for="inputGroupFile01">Pilih berkas</label>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mb-1 mb-sm-0">Tambah</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- account setting page end -->

    <div class="card">
        <div class="card-body">
            <div class="card-text">
                <dl class="row">
                    <dt class="col-sm-2">Usulan Dana</dt>
                    @isset($usulan->usulan_dana)
                        <dd class="col-sm-10">Rp. {{ number_format($usulan->usulan_dana, 0, ',', '.') }}</dd>
                    @else
                        <dd class="col-sm-10">-</dd>
                    @endisset
                </dl>
                <dl class="row">
                    <dt class="col-sm-2">Mitra</dt>
                    <dd class="col-sm-10">
                        <div class="table-responsive">
                            <table class="table text-center" id="mitraTable">
                                <thead>
                                    <tr>
                                        <th>Nama Mitra</th>
                                        <th>Dana (Rp.)</th>
                                        <th style="width: 100px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usulanMitra as $item)
                                        <tr>
                                            <td><a href="#modal" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->nama }}</a></td>
                                            <td>
                                                @if ($item->dana == NULL || $item->dana == 0)
                                                    -
                                                @else
                                                    Rp. {{ number_format($item->dana, 0, ',', '.') }}
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('dosen.usulan.mitra.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="padding: 0; border: none; background: none;" class="action-edit text-danger"><i class="feather icon-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </dd>
                </dl>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer row">
            <div class="col-6">
                <a class="btn btn-warning px-1" href="{{ route('dosen.usulan.backward') }}" onclick="event.preventDefault();
                document.getElementById('backward-form').submit();">Kembali</a>
            </div>
            <div class="col-6 text-right">
                <form action="{{ route('dosen.usulan.update', $usulan->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="step" value="8">
                    <input type="hidden" name="usulan_id" value="{{ $usulan->id }}">
                    <button type="submit" class="btn btn-success px-1">Lanjut</button>
                </form>
            </div>
        </div>
        <!-- /.card-footer -->
    </div>
        
    <form id="backward-form" action="{{ route('dosen.usulan.backward') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <!-- /.card -->

    <!-- modal -->
    <div class="modal fade text-left" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33"> | Detail Mitra</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-text">
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Nama Mitra</dt>
                            <dd class="col-sm-8" id="nama_update"></dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Nama Pimpinan</dt>
                            <dd class="col-sm-8" id="pimpinan_update"></dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Jenis</dt>
                            <dd class="col-sm-8" id="jenis_update"></dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Institusi</dt>
                            <dd class="col-sm-8" id="institusi_update"></dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Alamat Mitra</dt>
                            <dd class="col-sm-8">
                                <dl class="row">
                                    <dt class="col-sm-3 text-md-right">Alamat</dt>
                                    <dd class="col-sm-9" id="alamat_update"></dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3 text-md-right">Kecamatan</dt>
                                    <dd class="col-sm-9" id="kecamatan_update"></dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3 text-md-right">Kabupaten</dt>
                                    <dd class="col-sm-9" id="kabkota_update"></dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-sm-3 text-md-right">Provinsi</dt>
                                    <dd class="col-sm-9" id="provinsi_update"></dd>
                                </dl>
                            </dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">No. Telepon</dt>
                            <dd class="col-sm-8" id="tlp_update"></dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">No. HP</dt>
                            <dd class="col-sm-8" id="hp_update"></dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">No. Fax</dt>
                            <dd class="col-sm-8" id="fax_update"></dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Alamat Email</dt>
                            <dd class="col-sm-8" id="email_update">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Dana Mitra</dt>
                            <dd class="col-sm-8" id="dana_update">-</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Surat Pernyataan Mitra</dt>
                            <dd class="col-sm-8" id="surat_update"></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->
@endsection

@section('js')
    <script>
        $(function($){
            $(document).on('click', '#mitraTable tbody tr td a', function(e) {
                var id = $(this).attr('data-value');
                $.get("/dosen/usulan/mitra/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#myModalLabel33').text(d.nama + " | Ubah Mitra");
                    $('#nama_update').text(d.nama);
                    $('#pimpinan_update').text(d.pimpinan);
                    $('#mitra_jenis_id_update').text(d.mitra_jenis_id);
                    $('#institusi_update').text(d.institusi);
                    $('#alamat_update').text(d.alamat);
                    $('#kecamatan_update').text(d.nama_kecamatan);
                    $('#kabkota_update').text(d.nama_kabkota);
                    $('#provinsi_update').text(d.nama_provinsi);
                    $('#tlp_update').text(d.tlp);
                    $('#hp_update').text(d.hp);
                    $('#fax_update').text(d.fax);
                    $('#email_update').text(d.email);
                    $('#dana_update').text(d.dana);
                });

                console.log($(this).attr('data-value'));
            });

            $( "select.provinsi_create" ).change(function() {
                var id = $(this).children("option:selected").val();
                $.get( "/kabkota/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#kabkota_create').empty();
                    $('#kecamatan_create').empty();
                    $('#kabkota_create').append('<option value="" hidden>--Pilih kabupaten/kota</option>');
                    $('#kecamatan_create').append('<option value="" hidden>--Pilih kecamatan</option>');
                    for (var i = 0; i < d.length; i++) {
                        $('#kabkota_create').append('<option value="' + d[i].id + '">' + d[i].nama_kabkota + '</option>');
                    }
                });
            });

            $( "select.kabkota_create" ).change(function() {
                var id = $(this).children("option:selected").val();
                $.get( "/kecamatan/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#kecamatan_create').empty();
                    $('#kecamatan_create').append('<option value="" hidden>--Pilih kecamatan</option>');
                    for (var i = 0; i < d.length; i++) {
                        $('#kecamatan_create').append('<option value="' + d[i].id + '">' + d[i].nama_kecamatan + '</option>');
                    }
                });
            });

            $( "select.provinsi_update" ).change(function() {
                var id = $(this).children("option:selected").val();
                $.get( "/kabkota/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#kabkota_update').empty();
                    $('#kecamatan_update').empty();
                    $('#kabkota_update').append('<option value="" hidden>--Pilih kabupaten/kota</option>');
                    $('#kecamatan_update').append('<option value="" hidden>--Pilih kecamatan</option>');
                    for (var i = 0; i < d.length; i++) {
                        $('#kabkota_update').append('<option value="' + d[i].id + '">' + d[i].nama_kabkota + '</option>');
                    }
                });
                console.log($(this).children("option:selected").val());
            });

            $( "select.kabkota_update" ).change(function() {
                var id = $(this).children("option:selected").val();
                $.get( "/kecamatan/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#kecamatan_update').empty();
                    $('#kecamatan_update').append('<option value="" hidden>--Pilih kecamatan</option>');
                    for (var i = 0; i < d.length; i++) {
                        $('#kecamatan_update').append('<option value="' + d[i].id + '">' + d[i].nama_kecamatan + '</option>');
                    }
                });
                console.log($(this).children("option:selected").val());
            });
        });
    </script>
@endsection