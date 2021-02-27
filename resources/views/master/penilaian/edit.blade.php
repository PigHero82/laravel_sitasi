@extends('layout')

@section('judul')
    {{ $penilaian->nama }} - Tahap Penilaian
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

    <!-- detail penilaian -->
    <div class="card">

        <form action="{{ route('admin.master.penilaian.update', $penilaian->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="card-header">
                <h3 class="card-title">Ubah Penilaian</h3>
            </div>
            <!-- /.card-header -->
    
            <div class="card-body">
                            
                <div class="row">
                    <div class="col col-md-6">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="nama" value="{{ $penilaian->nama }}" required>
                        </div>
    
                        <div class="form-group">
                            <label for="status">Status</label>
                            <ul class="list-unstyled mb-0">
                                <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="vs-radio-con">
                                            <input type="radio" name="status" value="1"
                                                @if ($penilaian->status == 1)
                                                    checked
                                                @endif
                                            >
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="">Aktif</span>
                                        </div>
                                    </fieldset>
                                </li>
                                <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="vs-radio-con">
                                            <input type="radio" name="status" value="2" 
                                                @if ($penilaian->status == 2)
                                                    checked
                                                @endif
                                            >
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="">Tidak aktif</span>
                                        </div>
                                    </fieldset>
                                </li>
                            </ul>
                        </div>
                    </div>
    
                    <div class="col col-md-6">
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="description" cols="30" rows="3">{{ $penilaian->deskripsi }}</textarea>
                        </div>
                    </div>
                </div>
    
            </div>
            <!-- /.card-body -->
    
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
            <!-- /.card-footer -->
            
        </form>

    </div>
    <!-- /.card -->

    <!-- indikator penilaian -->
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">Indikator Penilaian</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#indikatorModal">
                    <i class="fas fa-plus"></i> Tambah
                </button>
            </div>
        </div>
        <!-- /.card-header -->

        <div class="card-body">

            @if (count($penilaian->indikator) > 0)
                <div class="table-responsive">
                    <table id="indikatorTable" class="table zero-configuration table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Deskripsi</th>
                                <th style="width: 5%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penilaian->indikator as $item)
                                <tr>
                                    <td><a href="#modal" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->nama }}</a></td>
                                    <td>
                                        @if ($item->jenis == 1)
                                            Penelitian
                                        @elseif ($item->jenis == 2)
                                            Pengabdian
                                        @endif
                                    </td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td class="text-center">
                                        @if ($item->status == 1)
                                            <i class="feather icon-eye text-primary"></i>
                                        @elseif ($item->status == 2)
                                            <i class="feather icon-eye-off"></i>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            @else
                <div class="text-center">
                    <h1><i class="feather icon-alert-octagon"></i></h1>
                    <h4 class="card-title">Tidak ada data</h4>
                </div>
            @endif

        </div>
        <!-- /.card-body -->

    </div>

    <!-- modal -->
    <div class="modal fade text-left" id="indikatorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Indikator Penilaian</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.master.indikator.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                            
                        <fieldset class="form-group">
                            <label for="indikatorName">Nama</label>
                            <input type="hidden" name="penilaian_tahap_id" value="{{ $penilaian->id }}" required>
                            <input type="text" class="form-control" name="nama" required>
                        </fieldset>
                        
                        <fieldset class="form-group">
                            <label for="indikatorDescription">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" cols="30" rows="3"></textarea>
                        </fieldset>
                        
                        <fieldset class="form-group">
                            <label for="indikatorType">Jenis</label>
                            <select class="form-control" name="jenis" required>
                                <option value hidden>--Pilih jenis</option>
                                <option value="1">Penelitian</option>
                                <option value="2">Pengabdian</option>
                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="status">Status</label>
                            <ul class="list-unstyled mb-0">
                                <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="vs-radio-con">
                                            <input type="radio" name="status" value="1" checked>
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="">Aktif</span>
                                        </div>
                                    </fieldset>
                                </li>
                                <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="vs-radio-con">
                                            <input type="radio" name="status" value="2">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="">Tidak aktif</span>
                                        </div>
                                    </fieldset>
                                </li>
                            </ul>
                        </fieldset>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal -->
    <div class="modal fade text-left" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="indikatorTitle">Detail Indikator Penilaian</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST" id="indikatorForm">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                            
                        <fieldset class="form-group">
                            <label for="indikatorName">Nama</label>
                            <input type="text" class="form-control" name="nama" id="indikatorName" required>
                        </fieldset>
                        
                        <fieldset class="form-group">
                            <label for="indikatorDescription">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="indikatorDescription" cols="30" rows="3"></textarea>
                        </fieldset>
                        
                        <fieldset class="form-group">
                            <label for="indikatorType">Jenis</label>
                            <select class="form-control" name="jenis" id="indikatorType" required>
                                <option value hidden>--Pilih jenis</option>
                                <option value="1">Penelitian</option>
                                <option value="2">Pengabdian</option>
                            </select>
                        </fieldset>

                        <fieldset class="form-group">
                            <label for="status">Status</label>
                            <ul class="list-unstyled mb-0">
                                <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="vs-radio-con">
                                            <input type="radio" id="indikatorStatus-1" name="status" value="1">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="">Aktif</span>
                                        </div>
                                    </fieldset>
                                </li>
                                <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="vs-radio-con">
                                            <input type="radio" id="indikatorStatus-2" name="status" value="2">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="">Tidak aktif</span>
                                        </div>
                                    </fieldset>
                                </li>
                            </ul>
                        </fieldset>

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
        $(document).ready(function() {
            $(document).on('click', '#indikatorTable tbody tr td a', function() {
                var id = $(this).attr('data-value')
                console.log(id)
                $.get( "/admin/master/penilaian/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#indikatorTitle').text(d.nama + ' - Indikator Penilaian')
                    $('#indikatorForm').attr('action', '{{ url("/admin/master/indikator") }}/' + d.id)
                    $('#indikatorName').val(d.nama)
                    $('#indikatorDescription').val(d.deskripsi)
                    $('#indikatorType').val(d.jenis)
                    $('#indikatorStatus-' + d.status).attr('checked', true)
                })
            })
        });
    </script>
@endsection