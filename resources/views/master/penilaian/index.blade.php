@extends('layout')

@section('judul')
    Data Master Penilaian
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

    <!-- general form elements -->
    <div class="card">

        <div class="card-header">
            <h3 class="card-title">Penilaian</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal">
                    <i class="fas fa-plus"></i> Tambah
                </button>
            </div>
        </div>
        <!-- /.card-header -->

        <div class="card-body">

            @if (count($penilaian) > 0)
                <div class="table-responsive">
                    <table id="tahapTable" class="table zero-configuration table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th style="width: 5%">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($penilaian as $item)
                                <tr>
                                    <td><a href="{{ route('admin.master.penilaian.edit', $item->id) }}">{{ $item->nama }}</a></td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td class="text-center">
                                        @if ($item->status == 1)
                                            <i class="feather icon-eye text-primary"></i>
                                        @elseif ($item->jenis == 2)
                                            <i class="feather icon-eye-off"></i>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
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
    <!-- /.card -->

    <!-- modal -->
    <div class="modal fade text-left" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Tahap Penilaian</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.master.penilaian.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                            
                        <fieldset class="form-group">
                            <label for="indikatorName">Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </fieldset>
                        
                        <fieldset class="form-group">
                            <label for="indikatorDescription">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" cols="30" rows="3"></textarea>
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
@endsection