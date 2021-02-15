@extends('layout')

@section('judul')
    ASDADASD
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Item Anggaran</h3>
            <div class="float-right">
                <a class="btn btn-primary" href="/ubah-rab" role="button"><i class="feather icon-edit-2"></i> Ubah RAB</a>
            </div>
        </div>
        <div class="card-body">
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
                        </tr>
                        <tr>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>HONOR OUTPUT KEGIATAN</td>
                            <td>Honor narasumber</td>
                            <td>Honor narasumber</td>
                            <td>3 Kegiatan</td>
                            <td>-</td>
                            <td>-</td>
                            <td>800.000</td>
                            <td>2.400.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.card -->
@endsection