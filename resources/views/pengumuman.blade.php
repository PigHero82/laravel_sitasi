@extends('layout')

@section('judul')
    Pengumuman
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
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
            <h3 class="card-title">Semua Pengumuman</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#modal">
                    <i class="fas fa-plus"></i> Tambah
                </button>
            </div>
        </div>
        <!-- /.card-header -->

        <div class="card-body">

            @if (count($pengumuman) > 0)
                <div class="table-responsive">
                    <table id="pengumumanTable" class="table zero-configuration table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Jenis</th>
                                <th>Kata Kunci</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengumuman as $item)
                                <tr>
                                    <td><a href="#pengumumanModal" data-toggle="modal" data-value="{{ $item->id }}">{{ $item->judul }}</a></td>
                                    <td>
                                        @if ($item->jenis == 1)
                                            Penelitian
                                        @elseif ($item->jenis == 2)
                                            Pengabdian
                                        @endif
                                    </td>
                                    @php
                                        $keywords = explode(';', $item->katakunci);
                                    @endphp
                                    <td>
                                        @foreach ($keywords as $keyword)
                                            <div class="badge badge-pill badge-primary">{{ $keyword }}</div>
                                        @endforeach
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.pengumuman.destroy', $item->id)}}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus {{ $item->judul }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="padding: 0; border: none; background: none;" class="action-edit text-danger" title="Hapus"><i class="feather icon-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Judul</th>
                                <th>Jenis</th>
                                <th>Kata Kunci</th>
                                <th></th>
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
                    <h4 class="modal-title">Tambah Pengumuman</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.pengumuman.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <fieldset class="form-group">
                            <label for="jenis">Jenis</label>
                            <ul class="list-unstyled mb-0">
                                <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="vs-radio-con">
                                            <input type="radio" name="jenis" value="1" checked>
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="">Penelitian</span>
                                        </div>
                                    </fieldset>
                                </li>
                                <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="vs-radio-con">
                                            <input type="radio" name="jenis" value="2">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="">Pengabdian</span>
                                        </div>
                                    </fieldset>
                                </li>
                            </ul>
                        </fieldset>
                            
                        <fieldset class="form-label-group">
                            <input type="text" class="form-control" name="judul" placeholder="Judul" required>
                            <label>Judul</label>
                        </fieldset>
                            
                        <fieldset class="form-label-group">
                            <input type="text" class="form-control" name="katakunci" placeholder="Kata Kunci (pisahkan dengan tanda ;)" required>
                            <label>Kata Kunci (pisahkan dengan tanda ;)</label>
                        </fieldset>
                        
                        <fieldset class="form-label-group">
                            <textarea class="form-control" name="content" rows="3" placeholder="Deskripsi" required></textarea>
                            <label>Deskripsi</label>
                        </fieldset>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- pengumumanModal -->
    <div class="modal fade text-left" id="pengumumanModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="pengumumanTitle">Ubah Pengumuman</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" method="POST" id="pengumumanForm">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">

                        <fieldset class="form-group">
                            <label for="jenis">Jenis</label>
                            <ul class="list-unstyled mb-0">
                                <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="vs-radio-con">
                                            <input type="radio" name="jenis" value="1" id="pengumumanType-1" checked>
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="">Penelitian</span>
                                        </div>
                                    </fieldset>
                                </li>
                                <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="vs-radio-con">
                                            <input type="radio" name="jenis" value="2" id="pengumumanType-2">
                                            <span class="vs-radio">
                                                <span class="vs-radio--border"></span>
                                                <span class="vs-radio--circle"></span>
                                            </span>
                                            <span class="">Pengabdian</span>
                                        </div>
                                    </fieldset>
                                </li>
                            </ul>
                        </fieldset>
                            
                        <fieldset class="form-label-group">
                            <input type="text" class="form-control" id="pengumumanJudul" name="judul" placeholder="Judul" required>
                            <label for="pengumumanJudul">Judul</label>
                        </fieldset>
                            
                        <fieldset class="form-label-group">
                            <input type="text" class="form-control" id="pengumumanKeywords" name="katakunci" placeholder="Kata Kunci (pisahkan dengan tanda ;)" required>
                            <label for="pengumumanKeywords">Kata Kunci (pisahkan dengan tanda ;)</label>
                        </fieldset>
                        
                        <fieldset class="form-label-group">
                            <textarea class="form-control" id="pengumumanDescription" name="content" rows="3" placeholder="Deskripsi" required></textarea>
                            <label for="pengumumanDescription">Deskripsi</label>
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
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#pengumumanTable').DataTable({
                "columnDefs": [
                    { "orderable": false, "targets": 3 }
                ]
            });

            $(document).on('click', '#pengumumanTable tbody tr td a', function() {
                var id = $(this).attr('data-value')
                console.log(id)
                $.get( "/admin/pengumuman/" + id, function(data) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#pengumumanTitle').text(d.judul + ' - Pengumuman')
                    $('#pengumumanForm').attr('action', '{{ url("/admin/pengumuman") }}/' + d.id)
                    $('#pengumumanType-' + d.jenis).attr('checked', true)
                    $('#pengumumanJudul').val(d.judul)
                    $('#pengumumanKeywords').val(d.katakunci)
                    $('#pengumumanDescription').val(d.content)
                })
            })
        });
    </script>
@endsection