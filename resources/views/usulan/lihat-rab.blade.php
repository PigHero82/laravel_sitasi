@extends('layout')

@section('judul')
    ASDADASD
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Item Anggaran</h3>
        </div>
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
            <br/>

            </div>
            <hr>
            <div class="row">
                <div class="col-6 text-left">
                    <h4>Total Anggaran: <span id="total-anggaran">0</span>,-</h4>
                </div>
                <div class="col-6 text-right">
                    <a id="tambah-anggaran" class="btn btn-primary" data-toggle="modal" href="#modal-RAB" ><i class="feather icon-edit-2" ></i> Tambah Anggaran</a>
                </div>
            </div>
            <br>
            
            <div class="table-responsive">
                <form action="{{ route('dosen.usulan.rab.update', $usulanId) }}" method="post">
                @csrf
                @method('PATCH')
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center align-middle my-auto">Jenis Pembelanjaan</th>
                            <th rowspan="2" class="text-center align-middle my-auto">Penggunaan</th>
                            <th rowspan="2" class="text-center align-middle my-auto">Nama Item</th>
                            <th colspan="3" class="text-center">Volume</th>
                            <th rowspan="2" class="text-center align-middle my-auto">Harga Satuan (Rp)</th>
                            <th rowspan="2" class="text-center align-middle my-auto">Total (Rp)</th>
                            <th rowspan="2" class="text-center align-middle my-auto"></th>
                        </tr>
                        <tr>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        
                        @php
                        $total = 0;
                        $indTable = 0;
                        @endphp
                        @foreach ($rab as $item)
                            <tr id="{{ $indTable + 1 }}">

                                <td>
                                    <input type="hidden" name="item[{{ $loop->index }}][rab_jenis_id]" value="{{$item->rab_jenis_id}}" id="">
                                    {{ $item->nama_jenis }}
                                </td>
                                <td>
                                    <input type="hidden" name="item[{{ $loop->index }}][penggunaan]" value="{{$item->penggunaan}}">
                                    {{ $item->penggunaan }}
                                </td>
                                <td>
                                    <input type="hidden" name="item[{{ $loop->index }}][nama]" value="{{$item->nama}}">
                                    {{ $item->nama }}
                                </td>
                                <td>
                                    <input type="hidden" name="item[{{ $loop->index }}][item1]" value="{{ $item->item1 }} {{ $item->satuan1 }}">
                                    {{ $item->item1 }} {{ $item->satuan1 }}
                                    @php
                                    $jumlah = $item->item1;
                                    @endphp
                                </td>
                                <td>
                                    @isset($item->satuan2)
                                        <input type="hidden" name="item[{{ $loop->index }}][item2]" value="{{ $item->item2 }} {{ $item->satuan2 }}">
                                    {{ $item->item2 }} {{ $item->satuan2 }}
                                    @php
                                    $jumlah *= $item->item2;
                                    @endphp
                                    @else
                                    <input type="hidden" name="item[{{ $loop->index }}][item2]">
                                        -
                                    @endisset
                                </td>
                                <td>
                                    @isset($item->satuan3)
                                        <input type="hidden" name="item[{{ $loop->index }}][item3]" value="{{ $item->item3 }} {{ $item->satuan3 }}">
                                    {{ $item->item3 }} {{ $item->satuan3 }}
                                    @php
                                    $jumlah *= $item->item3;
                                    @endphp
                                    @else
                                    <input type="hidden" name="item[{{ $loop->index }}][item3]">
                                        -
                                    @endisset
                                </td>
                                <td>
                                    <input type="hidden" name="item[{{ $loop->index }}][harga]" value="{{ $item->harga }}">
                                    {{ number_format($item->harga, 0, ',', '.') }}
                                </td>
                                <td class="table-subtotal">{{ number_format(($jumlah * $item->harga), 0, ',', '.') }}</td>
                                <td>
                                    <a data-toggle="modal" href="#modal-RAB" style="padding: 0; border: none; background: none;" class="action-edit text-primary" title="Edit" id="{{ $item->id }} {{ $indTable + 1 }}"><i class="feather icon-edit-2"></i></a>
                                    <a style="padding: 0; border: none; background: none;" class="action-delete text-danger" title="Hapus" href="#"><i class="feather icon-trash"></i></a>
                                </td>
                            </tr>
                            @php
                                $total += $jumlah * $item->harga;
                                $indTable++;
                            @endphp
                        @endforeach

                    
                    </tbody>
                </table>
                
            </div>
            <div class="row">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>

    {{-- <div class="card" id="ubah">
        <div class="card-header">
            <h3 class="card-title col-8">Ubah RAB</h3>
            <h4 class="col-4">Total Anggaran: <span id="total-anggaran">0</span>,-</h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            
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
    </div> --}}

    <!-- Modal -->
    <div class="modal fade text-left" id="modal-RAB" tabindex="-1" role="dialog" aria-labelledby="modal-RAB" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="label">Detail</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-text">
                        <form id="form-tambah">
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Jenis Pembelanjaan</dt>
                            <dd class="col-sm-8" id="jenis"><select class="input-modal form-control" required id="rab_jenis_id">
                                        <option value="" hidden>-- Pilih Jenis</option>
                                            @foreach ($jenis as $item)
                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                            @endforeach
                                    </select></dd>
                        </dl>
                        
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Penggunaan</dt>
                            <dd class="col-sm-8" ><input type="text" class="input-modal form-control" required id="penggunaan"></dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Nama Item</dt>
                            <dd class="col-sm-8" ><input type="text" class="input-modal form-control" required id="nama"></dd>
                        </dl>
                        <dt>Volume</dt>
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Detail Item 1</dt>
                            <dd class="col-sm-8" ><input type="text" class="input-modal form-control" required id="item1">
                                <small class="text-muted">Contoh: 5 Orang</small></dd>
                        </dl>
                       
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Detail Item 2</dt>
                            <dd class="col-sm-8" ><input type="text" class="input-modal form-control" id="item2">
                                <small class="text-muted">Contoh: 8 Bulan</small></dd>
                        </dl>
                     
                        <dl class="row">
                            <dt class="col-sm-4 text-md-right">Detail Item 3</dt>
                            <dd class="col-sm-8" ><input type="text" class="input-modal form-control" id="item3"></dd>
                        </dl>
                     
                        <dl class="row form-group">
                            <dt class="col-sm-4 text-md-right">Harga Satuan</dt>
                            <dd class="col-sm-8" ><input type="text" class="input-modal form-control" required id="harga">
                                <small class="text-muted">Harga per satuan</small></dd>
                        </dl>
                        <dl class="row text-center">
                            <div class="col-md-12 text-md-right">
                                <button class="btn btn-success text-center" id="modal-button-tambah">Tambah</button>
                            </div>
                            <div class="col-md-12 text-md-right">
                                <button class="btn btn-success text-center" id="modal-button-ubah">Ubah</button>
                            </div>  
                        </dl>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.Modal -->
@endsection

@section('js')
    <script>
        function genHTML(indTable){
            
            var jenis = '<td> <input type="hidden" name="item['+indTable+'][rab_jenis_id]" value="'+$('#rab_jenis_id').val()+'">'+ $('#rab_jenis_id').find(':selected').text() + '</td>';
            var penggunaan = '<td> <input type="hidden" name="item['+indTable+'][penggunaan]" value="'+$('#penggunaan').val()+'">'+ $('#penggunaan').val() + '</td>';
            var nama = '<td> <input type="hidden" name="item['+indTable+'][nama]" value="'+$('#nama').val()+'">'+ $('#nama').val() + '</td>';
            var detailItem1 = '<td> <input type="hidden" name="item['+indTable+'][item1]" value="'+$('#item1').val()+'">'+ $('#item1').val() + '</td>';
            var detailItem2 = '<td> <input type="hidden" name="item['+indTable+'][item2]" value="'+$('#item2').val()+'">'+ $('#item2').val() + '</td>';
            var detailItem3 = '<td> <input type="hidden" name="item['+indTable+'][item3]" value="'+$('#item3').val()+'">'+ $('#item3').val() + '</td>';
            var harga = '<td> <input type="hidden" name="item['+indTable+'][harga]" value="'+$('#harga').val()+'">'+ $('#harga').val() + '</td>';
            var item1 = $('#item1').val();
            var item2 = $('#item2').val();
            var item3 = $('#item3').val();
            if(!$('#item2').val()){
                item2="1 ";
                detailItem2 = '<td> <input type="hidden" name="item['+indTable+'][item2]">-</td>';
            }
            if(!$('#item3').val()){
                item3="1 ";
                detailItem3 = '<td> <input type="hidden" name="item['+indTable+'][item3]">-</td>';
            }
            
            var total = '<td class="table-subtotal">' + (item1.split(" ")[0] * item2.split(" ")[0] * item3.split(" ")[0] * $('#harga').val()) + '</td>';
            var aksi = '<td> <a style="padding: 0; border: none; background: none;" class="action-delete text-danger" title="Hapus" href="#"><i class="feather icon-trash"></i></a></td>';

            return (jenis+penggunaan+nama+detailItem1+detailItem2+detailItem3+harga+total+aksi);
        }


        function totalAnggaran(){
            var total = 0;
            $('.table-subtotal').each(function(){
                var t = $(this).text();
                sub = t.split('.').join('');
                total += parseInt(sub);
    
            });
            
            return total;
        }
        $(document).on('click','.action-delete',function(e){
                $(this).parent().parent().remove();
                e.preventDefault(e);
            });
        $(document).ready(function () {
            let i = 0;
            var indTable = {{ $indTable }};
            var tdID;
            $('#total-anggaran').html(formatRupiah('{{ $total }}', 'Rp. '));
            $('#form-tambah').submit(function(e){
                e.preventDefault(e);
                
            });
            $('#modal-button-tambah').on('click',function(e){
                e.preventDefault(e);
                var ap = '<tr id="'+ (indTable+1) +'">';
                ap += genHTML((indTable));
                ap += '</tr>';
                $('#table-body').append(ap);
                $('#modal-RAB').modal('hide'); 
            });

            $('#modal-button-ubah').on('click',function(e){
                e.preventDefault(e);
                $('tr#'+trID).empty();
                var ap = genHTML((trID - 1));
                $('tr#'+trID).append(ap);
                $('#total-anggaran').html(formatRupiah(''+totalAnggaran(), 'Rp. '));
                $('#modal-RAB').modal('hide');
            });

            $('#tambah-anggaran').on('click',function(e){
                e.preventDefault(e);
                $('.input-modal').val('');
                $("#modal-button-tambah").show();
                $("#modal-button-ubah").hide();
            });

            $('.action-edit').on('click',function(e){
                var id = this.id;
                
                trID = $(this).parent().parent().attr('id');
                

                $("#modal-button-tambah").hide();
                $("#modal-button-ubah").show();
                $('.input-modal').val('');
                $.get("detail/" + id, function(data){
                    var d = JSON.parse(data);
                    
                    $('#rab_jenis_id').val(d.rab_jenis_id);
                    $('#penggunaan').val(d.penggunaan);
                    $('#nama').val(d.nama);
                    $('#harga').val(d.harga);
                    $('#item1').val(d.item1 + ' ' +d.satuan1);
                    if(d.satuan2 != null){
                        $('#item2').val(d.item2 + ' ' +d.satuan2);
                    }
                    if(d.satuan3 != null){
                        $('#item3').val(d.item3 + ' ' +d.satuan3);
                    }
                });
            });
        });
    </script>
@endsection