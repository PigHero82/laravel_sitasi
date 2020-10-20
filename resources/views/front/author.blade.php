@extends('front.layout')

@section('judul')
    Author
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                SITASI merupakan sistem yang dapat melakukan pengajuan Penelitian, Pengabdian Dosen dan membantu proses yang terlibat didalamnya seperti progres pengajuan, mengelola data pengajuan, dll. sistem ini dibuat dengan tujuan meringankan pekerjaan ketua LPPM, mencegah hilangnya file karena virus atau bencana alam, dengan menggunakan tempat penyimpanan yang lebih terstruktur dan efektif seperti database, memperkecil kesalahan dalam penulisan nama dosen, dll.
                <table id="myTable" class="table zero-configuration table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Author</th>
                            <th>Total Penelitian</th>
                            <th>Total Pengabdian</th>
                            <th>H-Index Scopus</th>
                            <th>H-Index <br>GoogleScholars</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-sm-4 col-md-2 text-center">
                                        <img class="img-responsive img-rounded pull-right" src="https://sitasidev.manuaba.id/assets/img/user.png" style="max-height: 100%; max-width: 100%;">
                                    </div>
                                    <div class="col-sm-8 col-md-10">
                                        0804018605
                                        <br>I Dewa Putu Gede Wiyata Putra, S.Kom., M.M.
                                        <br><a href="#" class="badge badge-success badge-sm">Lihat Detail Penelitian</a>
                                        <br><a href="#" class="badge badge-primary badge-sm">Lihat Google Scholar</a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">2</td>
                            <td class="text-center">0</td>
                            <td class="text-center">20</td>
                            <td class="text-center">25</td>
                        </tr>
                        <tr>
                            <td>
                            <div class="row">
                                <div class="col-sm-4 col-md-2 text-center">
                                    <img class="img-responsive img-rounded pull-right" src="https://sitasidev.manuaba.id/assets/img/user.png" style="max-height: 100%; max-width: 100%;">
                                </div>
                                <div class="col-sm-8 col-md-10">
                                    0807038701
                                        <br>I Dewa Gede Agung Pandawana, S.Kom., M.Si
                                        <br><a href="#" class="badge badge-success badge-sm">Lihat Detail Penelitian</a>
                                        <br><a href="#" class="badge badge-primary badge-sm">Lihat Google Scholar</a>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">4</td>
                            <td class="text-center">0</td>
                            <td class="text-center">30</td>
                            <td class="text-center">35</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                "order": [[ 1, "asc" ]]
            });
        });
    </script>
@endsection