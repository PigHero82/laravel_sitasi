@extends('layout')

@section('judul')
    SITASI
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

    {{-- <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                    <div>
                        <h2 class="text-bold-700 mb-0">{{ $unreviewed }}</h2>
                        <p>Jumlah Penelitian dan Pengabdian yang harus direview</p>
                    </div>
                    <div class="avatar bg-rgba-info p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-bar-chart-2 text-info font-medium-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex align-items-start pb-0">
                    <div>
                        <h2 class="text-bold-700 mb-0">{{ $reviewed }}</h2>
                        <p>Jumlah yang telah direview</p>
                    </div>
                    <div class="avatar bg-rgba-warning p-50 m-0">
                        <div class="avatar-content">
                            <i class="feather icon-pie-chart text-warning font-medium-5"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title mb-0">Review Usulan</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">

            <!-- skema penelitian -->
            @if(count($penelitian))
                <!-- table -->
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Usulan Penelitian</h3>

                    <div class="card-tools">
                        <a href="{{ route('reviewer.review.index') }}" class="btn btn-outline-success">
                            Lihat Semua
                        </a>
                    </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-content collapse show">
                        <div class="card-body">
                        <table id="table-penelitian" class="table zero-configuration table-striped table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    {{-- <th>Progress</th> --}}
                                    <th style="width: 50%">Judul</th>
                                    <th>Skema Usulan</th>
                                    <th>Tahun Pelaksanaan</th>
                                    <th>Status Review</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penelitian as $item)
                                    <tr>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->skema_usulan->tahun_skema . ' - ' . $item->skema_usulan->kode }}</td>
                                        <td>{{ $item->skema_usulan->tahun_pelaksanaan }}</td>
                                        <td>
                                            <div class="badge badge-pill badge-md badge-warning">
                                                <i class="feather icon-clock"></i> Belum direview
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    {{-- <th>Progress</th> --}}
                                    <th>Judul</th>
                                    <th>Skema Usulan</th>
                                    <th>Tahun Pelaksanaan</th>
                                    <th>Status Review</th>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.table -->
            @else
                <!-- empty table -->
                <div class="card bg-danger text-white">
                <div class="card-header">
                    <h3 class="card-title text-white">Usulan Penelitian</h3>

                    {{-- <div class="card-tools">
                        <a href="#" class="btn btn-outline-success">
                            Lihat Semua
                        </a>
                    </div> --}}
                </div>
                <!-- /.card-header -->
                <div class="card-content">
                    <div class="card-body text-center">
                        <h1 class="text-white"><i class="feather icon-alert-octagon"></i></h1>
                        <h4 class="card-title text-white">Tidak ada data</h4>
                    </div>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.empty table -->
            @endif

            <!-- skema pengabdian -->
            @if(count($pengabdian))
                <!-- table -->
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Usulan Pengabdian</h3>

                    <div class="card-tools">
                        <a href="{{ route('reviewer.review.index') }}" class="btn btn-outline-success">
                            Lihat Semua
                        </a>
                    </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-content collapse show">
                        <div class="card-body">
                        <table id="table-pengabdian" class="table zero-configuration table-striped table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    {{-- <th>Progress</th> --}}
                                    <th style="width: 50%">Judul</th>
                                    <th>Skema Usulan</th>
                                    <th>Tahun Pelaksanaan</th>
                                    <th>Status Review</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengabdian as $item)
                                    <tr>
                                        <td>{{ $item->judul }}</td>
                                        <td>{{ $item->skema_usulan->tahun_skema . ' - ' . $item->skema_usulan->kode }}</td>
                                        <td>{{ $item->skema_usulan->tahun_pelaksanaan }}</td>
                                        <td><div class="badge badge-pill badge-md badge-warning">
                                                <i class="feather icon-clock"></i> Belum direview
                                            </div></td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    {{-- <th>Progress</th> --}}
                                    <th>Judul</th>
                                    <th>Skema Usulan</th>
                                    <th>Tahun Pelaksanaan</th>
                                    <th>Status Review</th>
                                </tr>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.table -->
            @else
                <!-- empty table -->
                <div class="card bg-danger text-white">
                <div class="card-header">
                    <h3 class="card-title text-white">Usulan Penelitian</h3>

                    {{-- <div class="card-tools">
                        <a href="#" class="btn btn-outline-success">
                            Lihat Semua
                        </a>
                    </div> --}}
                </div>
                <!-- /.card-header -->
                <div class="card-content">
                    <div class="card-body text-center">
                        <h1 class="text-white"><i class="feather icon-alert-octagon"></i></h1>
                        <h4 class="card-title text-white">Tidak ada data</h4>
                    </div>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.empty table -->
            @endif
        </div>
    </div>
@endsection

@section('js')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/cards/card-statistics.js') }}"></script>
    <!-- END: Page JS-->
@endsection