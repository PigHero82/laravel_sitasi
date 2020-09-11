@extends('layout')
{{-- @section('indexactive')
    active
@endsection --}}
@section('judul')
    Riwayat Publikasi
@endsection
@section('content')
    @if(session()->get('success'))
        <div class ="alert alert-success">
            {{ session()->get('success') }}  
        </div><br />
    @endif
    {{-- <div class="alert alert-primary">
        <i class="feather icon-info mr-1"></i> Click <a href="https://getbootstrap.com/docs/4.3/components/card/" target="_blank">here</a> for more info
        on
        cards.
    </div> --}}
    <!-- general form elements -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Riwayat Publikasi</h3>

            <div class="card-tools">
            <a href="#" class="btn btn-success">Tambah</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="text-primary font-weight-bold mb-1">Jurnal Internasional</h5>
                    <p class="text-secondary">Tahun : 2017 | International Journal of Business Information Systems | Volume : 26</p>
                    <p>Promoting the software industry in Ecuador</p>
                    <p>Peran Penulis : </p>
                    <p>Status : valid</p>
                    <hr>
                </div>
                <div class="col-sm-6">
                    <h5 class="text-primary font-weight-bold mb-1">Jurnal Nasional Terakreditasi</h5>
                    <p class="text-secondary">Tahun : 2010 | Jurnal Ekonomi Bisnis | Volume : 15</p>
                    <p>MINAT KARIR TERHADAP TEKNOLOGI</p>
                    <p>Peran Penulis : </p>
                    <p>Status : valid</p>
                    <hr>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection

{{-- @section('js')
    <script>
        $(document).ready(function() {
            $("#tambahbaris").on( "click", function() {
                $('#baris').append(`<div class="row mt-1">
                                        <div class="col-6">
                                            <input type="text" name="keterangan[]" class="form-control" placeholder="Keterangan">
                                        </div>
                                        <div class="col-3">
                                            <input type="text" name="debit[]" class="form-control" placeholder="Debit (Rp.)">
                                        </div>
                                        <div class="col-3">
                                            <input type="text" name="kredit[]" class="form-control" placeholder="Kredit (Rp.)">
                                        </div>
                                    </div>`);
            });

            $("#table tbody tr td button").on( "click", function() {
                var id = $(this).attr('data-value');
                console.log(id);
                $.get("data/" + id, function( data ) {
                    console.log(JSON.parse(data));
                    var d = JSON.parse(data);
                    $('#id').val(d.id);
                    $('#keterangan').val(d.keterangan);
                    $('#debit').val(d.debit);
                    $('#kredit').val(d.kredit);
                });
            });
        })
    </script>
@endsection --}}