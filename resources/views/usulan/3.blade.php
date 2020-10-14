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
                <h3 class="card-title">Step 3 - Atribut Usulan</h3>
            </div>
            <!-- /.card-header -->
            
            <div class="card-body">
                    <p>Unggah file berdasarkan template dibawah</p>
                    <button type="button" class="btn btn-success">Unduh Template</button>
                    <hr>
                    <form action="#">
                        <div class="form-group row mt-2">
                            <div class="col-md-2 text-md-right">
                                <span>Unggah File :</span>
                            </div>
                            <div class="col-md-7">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-block btn-primary">Unggah</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <form action="#">
                    <div class="form-group row">
                        <div class="col-md-2 text-md-right">
                            <span>Latar Belakang :</span>
                        </div>
                        <div class="col-md-9">
                            <textarea name="latar_belakang" cols="50" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2 text-md-right">
                            <span>Tinjauan Pustaka :</span>
                        </div>
                        <div class="col-md-9">
                            <textarea name="tinjauan_pustaka" cols="50" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2 text-md-right">
                            <span>Metode :</span>
                        </div>
                        <div class="col-md-9">
                            <textarea name="metode" cols="50" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2 text-md-right">
                            <span>Daftar Pustaka :</span>
                        </div>
                        <div class="col-md-9">
                            <textarea name="daftar_pustaka" cols="50" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="{{ route('dosen.usulan.2') }}" class="btn btn-warning px-1">Kembali</a>
                    <div class="float-right">
                        <a href="{{ route('dosen.usulan.4') }}" class="btn btn-success px-1">Lanjut</a>
                    </div>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
        <!-- /.card -->
    <!-- general form elements -->
@endsection

@section('js')
    <script src="https://cdn.tiny.cloud/1/olfhj3rf0nv614r4qvs2ucba6fhe2x0lnpupaok0wjecbn91/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak wordcount',
            selector: 'textarea',
            toolbar_mode: 'floating',
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright | outdent indent | wordcount'
        });
    </script>
@endsection