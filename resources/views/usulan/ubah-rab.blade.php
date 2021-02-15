@extends('layout')

@section('judul')
    Ubah RAB
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
            <h3 class="card-title col-8">Ubah RAB</h3>
            <h4 class="col-4">Total Anggaran: <span id="total-anggaran">0</span>,-</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <h3>Keterangan:</h3>
            <div class="col-md-10 justify-content-end">
            <h5> <b>Jenis:</b> memilih jenis penggunaan anggaran yang meliputi : </h5>
            <ul>
                <li>HONOR OUTPUT KEGIATAN (Honorarium pelaksana non dosen)</li>
                <li>BELANJA BARANG NON OPERASIONAL LAINNYA (Penginapan/hotel)</li>
                <li>BELANJA BAHAN (ATK, bahan habis pakai, surat menyurat, photo copy, penggandaan, dokumentasi, dan pelaporan)</li>
                <li>BELANJA PERJALANAN LAINNYA (Perjalanan/transportasi)</li>    
            </ul>
            
            <h5><b>Penggunaan:</b> mengisi penggunaan anggaran, misalnya Jenis memilih BELANJA BAHAN maka dibagian penggunaan bisa dimasukan ATK.</h5>
            <h5><b>Nama Item:</b> mengisi Item dari penggunaan anggaran, misalnya dibagian Penggunaan tadi mengisi ATK maka di Nama Item bisa diisi Kertas A4</h5>
            <h5><b>Detail Item:</b> mengisi jumlah dan satuan dari Nama Item, tetapi tidak semuanya 3 detail item diisi. Misalnya mau mengisi penggunaan kertas A4 sebulan sebanyak 2 rim tiap bulan selama 3 bulan, maka cara mengisinya</h5>
            <ul>
                <li>Detail Item 1 : 2 rim</li>
                <li>Detail Item 2 : 3 bulan</li>
            </ul>
            <h5><b>Biaya Satuan:</b> mengisi harga tiap satuan misalnya harga kertas 1 rim nya 40.000 maka akan dikalikan : 40.000 x 2 rim x 3 bulan</h5>
            <h5><b>Total:</b> secara otomatis akan terisi dari hasil perkalian, contoh diatas akan menghasilkan 240.000</h5>
            </div>
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
                            <th rowspan="2"></th>
                        </tr>
                        <tr>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select class="form-control">
                                    <option value="">-- Pilih Jenis</option>
                                </select>
                            </td>
                            <td><input type="text" class="form-control"></td>
                            <td><input type="text" class="form-control"></td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" class="form-control" placeholder="Jumlah">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Satuan">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" class="form-control" placeholder="Jumlah">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Satuan">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col">
                                        <input type="number" class="form-control" placeholder="Jumlah">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Satuan">
                                    </div>
                                </div>
                            </td>
                            <td><input type="number" class="form-control"></td>
                            <td class="text-danger text-weight-bold">
                                <form action="#" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="padding: 0; border: none; background: none;" class="action-edit text-success"><i class="feather icon-check"></i></button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection