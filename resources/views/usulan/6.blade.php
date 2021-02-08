@extends('layout')

@section('judul')
    Usulan | {{ $usulan->tahun_skema }} - {{ $usulan->kode }}
@endsection

@section('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
            <h3 class="card-title">Step 6 - Jadwal</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h3>Daftar Kegiatan Penelitian</h3>
            <hr>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th style="width: 150px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($usulanKegiatan)
                            @foreach ($usulanKegiatan as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ Carbon\Carbon::parse($item->tanggal_mulai)->formatLocalized('%d %B %Y') }}</td>
                                    <td>{{ Carbon\Carbon::parse($item->tanggal_selesai)->formatLocalized('%d %B %Y') }}</td>
                                    <td>
                                        <form action="{{ route('dosen.usulan.kegiatan.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="padding: 0; border: none; background: none;" class="action-edit text-danger"><i class="feather icon-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endisset
                        <tr>
                            <form action="{{ route('dosen.usulan.kegiatan.store') }}" method="post">
                                @csrf
                                <td></td>
                                <td>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama kegiatan" required>
                                </td>
                                <td>
                                    <input type="text" name="tanggal_mulai" class="form-control date" placeholder="Tanggal mulai" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                </td>
                                <td>
                                    <input type="text" name="tanggal_selesai" class="form-control date" placeholder="Tanggal selesai" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                </td>
                                <td>
                                    <input type="hidden" name="usulan_id" value="{{ $usulan->id }}" required>
                                    <button type="submit" class="btn btn-success px-1"><i class="feather icon-plus"></i> Tambah</button>
                                </td>
                            </form>
                        </tr>
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
                <form action="{{ route('dosen.usulan.update', $usulan->id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <input type="hidden" name="step" value="7">
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
@endsection

@section('js')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready( function () {
            $(".date").datepicker({
                dateFormat: "yy-mm-dd"
            });
            
            $('form').submit(function() {
                $(this).find("button[type='submit']").prop('disabled', true);
            });
        });
    </script>
@endsection