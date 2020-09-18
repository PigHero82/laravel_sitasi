@extends('layout')
@section('tambahactive')
    active
@endsection
@section('judul')
    Usulan | [Nama Skema]
@endsection
@section('content')
    @if(session()->get('success'))
        <div class ="alert alert-success">
            {{ session()->get('success') }}  
        </div><br />
    @endif
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Step 8 - Uji Kesamaan & Konfirmasi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <h3>Persetujuan Pengusul</h3>
                <hr>
                <p>Saya menyatakan dengan sesungguhnya bahwa semua informasi yang disampaikan dalam formulit serta lampiran-lampirannya adalah asli dan benar. Apabila diketemukan dan/atau dibuktikan adanya penipuan/pemalsuan atas informasi yang saya sampaikan, maka saya bersedia dikenakan dan menerima penerapan sanksi sesuai ketentuan dan hukum yang berlaku.</p>
                <li class="d-inline-block mr-2">
                    <fieldset>
                        <div class="vs-radio-con vs-radio-success">
                            <input type="radio" name="radiocolor" value="false">
                            <span class="vs-radio">
                                <span class="vs-radio--border"></span>
                                <span class="vs-radio--circle"></span>
                            </span>
                            <span class="">Setuju</span>
                        </div>
                    </fieldset>
                </li>
                <li class="d-inline-block mr-2">
                    <fieldset>
                        <div class="vs-radio-con vs-radio-danger">
                            <input type="radio" name="radiocolor" value="false">
                            <span class="vs-radio">
                                <span class="vs-radio--border"></span>
                                <span class="vs-radio--circle"></span>
                            </span>
                            <span class="">Tidak</span>
                        </div>
                    </fieldset>
                </li>                
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('dosen.usulan.7') }}" class="btn btn-warning px-1">Kembali</a>
                <div class="float-right">
                    <a href="#" class="btn btn-success px-1">Selesai & Simpan</a>
                </div>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
    <!-- general form elements -->

@endsection