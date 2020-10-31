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
            <h3 class="card-title">Step 5 - Rencana Anggaran</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h3>Tambah Item Anggaran Penelitian</h3>
            <hr>
            <form action="{{ route('dosen.usulan.rab.store') }}" method="post">
                <div class="row justify-content-end">
                    @csrf
                    <input type="hidden" name="usulan_id" value="{{ $usulan->id }}" required>
                    <div class="col-sm-8">
                        <div class="form-group row">
                            <div class="col-md-2 col-4 text-right">
                                <span>Jenis :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <select name="rab_jenis_id" class="form-control" required autofocus>
                                    <option value="" hidden>--Pilih jenis</option>
                                    @foreach ($rabJenis as $item)
                                        <option value="{{ $item->id }}"
                                        @isset($usulanLuaran)
                                            @if ($usulanLuaran->id == $item->id)
                                                selected
                                            @endif
                                        @endisset
                                    >{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 col-4 text-right">
                                <span>Penggunaan :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <input type="text" name="penggunaan" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 col-4 text-right">
                                <span>Nama Item :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 col-4 text-right">
                                <span>Detail Item :</span>
                            </div>
                            <div class="col-md-5 col-4">
                                <input type="text" name="item1" class="form-control" required>
                            </div>
                            <div class="col-md-4 col-4">
                                <input type="text" name="satuan1" class="form-control" placeholder="satuan"required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 col-4 text-right">
                            </div>
                            <div class="col-md-5 col-4">
                                <input type="text" name="item2" class="form-control">
                            </div>
                            <div class="col-md-4 col-4">
                                <input type="text" name="satuan2" class="form-control" placeholder="satuan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 col-4 text-right">
                            </div>
                            <div class="col-md-5 col-4">
                                <input type="text" name="item3" class="form-control">
                            </div>
                            <div class="col-md-4 col-4">
                                <input type="text" name="satuan3" class="form-control" placeholder="satuan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 col-4 text-right">
                                <span>Harga Satuan :</span>
                            </div>
                            <div class="col-md-9 col-8">
                                <input type="text" name="harga" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-2 col-4 text-right">
                                
                            </div>
                            <div class="col-md-9 col-8">
                                <button type="submit" class="btn btn-primary btn-block px-1"><i class="feather icon-plus"></i> Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <h3>Daftar Item Anggaran</h3>
            <hr>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center align-middle my-auto">Jenis Pembelanjaan</th>
                            <th rowspan="2" class="text-center align-middle my-auto">Penggunaan</th>
                            <th rowspan="2" class="text-center align-middle my-auto">Nama Item</th>
                            <th colspan="3" class="text-center">Volume</th>
                            <th rowspan="2" class="text-center align-middle my-auto">Harga Satuan (Rp)</th>
                            <th rowspan="2" class="text-center align-middle my-auto">Total (Rp)</th>
                            <th rowspan="2"></th>
                        </tr>
                        <tr>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usulanRab as $item)
                            <tr>
                                <td>{{ $item->nama_jenis }}</td>
                                <td>{{ $item->penggunaan }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->item1 }} {{ $item->satuan1 }}</td>
                                <td>
                                    @isset($item->satuan2)
                                        {{ $item->item2 }} {{ $item->satuan2 }}
                                    @else
                                        -
                                    @endisset
                                </td>
                                <td>
                                    @isset($item->satuan3)
                                        {{ $item->item3 }} {{ $item->satuan3 }}
                                    @else
                                        -
                                    @endisset
                                </td>
                                <td>{{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td>{{ number_format($item->total, 0, ',', '.') }}</td>
                                <td class="text-danger text-weight-bold">
                                    <form action="{{ route('dosen.usulan.rab.destroy', $item->id)}}" method="post">
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

                        <input type="hidden" name="step" value="6">
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
    <script>
        $(document).ready( function () {
            $('form').submit(function() {
                $(this).find("button[type='submit']").prop('disabled', true);
            });
        });
    </script>
@endsection