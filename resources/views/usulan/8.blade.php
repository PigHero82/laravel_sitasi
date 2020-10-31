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
        <form action="{{ route('dosen.usulan.update', $usulan->id) }}" method="POST">
            @csrf
            @method('PATCH')
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
                            <input type="radio" name="radiocolor" required>
                            <span class="vs-radio">
                                <span class="vs-radio--border"></span>
                                <span class="vs-radio--circle"></span>
                            </span>
                            <span class="">Saya setuju dengan pernyataan diatas</span>
                        </div>
                    </fieldset>
                </li>              
            </div>
            <!-- /.card-body -->
            <div class="card-footer row">
                <div class="col-6">
                    <a class="btn btn-warning px-1" href="{{ route('dosen.usulan.backward') }}" onclick="event.preventDefault();
                    document.getElementById('backward-form').submit();">Kembali</a>
                </div>
                <div class="col-6 text-right">
                    <input type="hidden" name="step" value="9">
                    <input type="hidden" name="usulan_id" value="{{ $usulan->id }}">
                    <button type="submit" class="btn btn-success px-1">Selesai & Simpan</button>
                </div>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
        
    <form id="backward-form" action="{{ route('dosen.usulan.backward') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <!-- /.card -->

@endsection