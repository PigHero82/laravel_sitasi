@extends('layout')

@section('judul')
    ASDADASD
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Item Anggaran</h3>
            <div class="float-right">
                <a class="btn btn-primary" href="#ubah" role="button"><i class="feather icon-edit-2"></i> Ubah RAB</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped text-center">
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
                        @foreach ($rab as $item)
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

    <div class="card" id="ubah">
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
            <form action="{{ route('dosen.usulan.rab.update', $usulanId) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="table-responsive">
                    <table class="table text-center" id="tambahTable">
                        <thead>
                            <tr>
                                <th rowspan="2" class="text-center align-middle my-auto">Jenis Pembelanjaan</th>
                                <th rowspan="3" class="text-center align-middle my-auto">Penggunaan</th>
                                <th rowspan="3" class="text-center align-middle my-auto">Nama Item</th>
                                <th colspan="3" class="text-center">Volume (format: [Jumlah] [Satuan])</th>
                                <th rowspan="2" class="text-center align-middle my-auto">Harga Satuan (Rp)</th>
                                <th rowspan="2" class="text-center align-middle my-auto"></th>
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
                                    <select class="form-control"name="item[0][rab_jenis_id]" required>
                                        <option value="" hidden>-- Pilih Jenis</option>
                                            @foreach ($jenis as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                    </select>
                                </td>
                                <td><input type="text" name="item[0][penggunaan]" class="form-control" required></td>
                                <td><input type="text" name="item[0][nama]" class="form-control" required></td>
                                <td><input type="text" name="item[0][item1]" class="form-control" placeholder="[Jumlah] [Satuan]" required></td>
                                <td><input type="text" name="item[0][item2]" class="form-control" placeholder="[Jumlah] [Satuan]"></td>
                                <td><input type="text" name="item[0][item3]" class="form-control" placeholder="[Jumlah] [Satuan]"></td>
                                <td><input type="number" name="item[0][harga]" class="form-control" required></td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-success btn-block" id="tambahButton"><i class="feather icon-plus"></i> Tambah item</button>
                </div>
                <button type="submit" class="btn btn-primary float-right mt-2">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            let i = 0
            $(document).on('click', '#tambahButton', function(e) {
                i++
                $('#tambahTable tbody').append('<tr id="' + i + '"><td><select class="form-control"name="item[' + i + '][rab_jenis_id]" required><option value="" hidden>-- Pilih Jenis</option>@foreach ($jenis as $item)<option value="{{ $item->id }}">{{ $item->nama }}</option>@endforeach</select></td><td><input type="text" name="item[' + i + '][penggunaan]" class="form-control" required></td><td><input type="text" name="item[' + i + '][nama]" class="form-control" required></td><td><input type="text" name="item[' + i + '][item1]" class="form-control" placeholder="[Jumlah] [Satuan]" required></td><td><input type="text" name="item[' + i + '][item2]" class="form-control" placeholder="[Jumlah] [Satuan]"></td><td><input type="text" name="item[' + i + '][item3]" class="form-control" placeholder="[Jumlah] [Satuan]"></td><td><input type="number" name="item[' + i + '][harga]" class="form-control" required></td><td><button style="padding: 0; border: none; background: none;" class="action-edit text-danger hapusButton" data-value="' + i + '"><i class="feather icon-trash"></i></button></td></tr>')
            })

            $(document).on('click', '.hapusButton', function(e) {
                var id = $(this).attr('data-value')
                console.log('Button ' + id + ' clicked')
                $('#' + id).remove()
            })
        });
    </script>
@endsection