@extends('layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">
@endsection

@section('judul')
    RAB
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
                <div class="col-sm-2">
                    <b>Judul</b>  
                </div>
                <div class="col-sm-10">
                    : {{ $usulan->judul }}
                </div>
            </div>        
            <div class="row">
                <div class="col-sm-2">
                    <b>Jenis</b>  
                </div>
                <div class="col-sm-10">
                    : {{ $usulan->skema_usulan->nama }}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2">
                    <b>Total Anggaran</b>  
                </div>
                <div class="col-sm-10">
                    @php
                        $totalanggaran = 0;
                    @endphp
                    @foreach ($usulanRab as $item)
                        @php
                        $totalanggaran += $item->total;
                        @endphp
                    @endforeach
                    : Rp. {{ number_format($totalanggaran, 0, ',', '.') }}
                </div>
            </div>
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
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
</div>

@endsection