@extends('front.layout')

@section('judul')
    SITASI
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 order-1 order-lg-2 mb-md-0 mb-3" style="margin-left: 0%">
                <div class="col-md-12 text-center" style="padding-left: 0px; padding-right: 0px;">
                    <div class="card">
                        <div class="card-body">
                            <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                                <div class="avatar-content">
                                    <i class="feather icon-bar-chart-2 text-info font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">279</h2>
                            <p class="mb-0 line-ellipsis">Total Penelitian Internal</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center" style="padding-left: 0px; padding-right: 0px;">
                    <div class="card">
                        <div class="card-body">
                            <div class="avatar bg-rgba-warning p-50 m-0 mb-1">
                                <div class="avatar-content">
                                    <i class="feather icon-pie-chart text-warning font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700">0</h2>
                            <p class="mb-0 line-ellipsis">Total Penelitian Eksternal</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 order-2 order-lg-1">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Pengumuman</h3>
                        <table class="table" id="table-pengumuman">
                            <thead>
                                <tr>
                                    <th>
                                    Tanggal 
                                    </th>
                                    <th>
                                        Pengumuman
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pengumuman as $peng)
                                <tr>
                                    <td>
                                        {{ $peng->created_at->format('d-m-Y') }}
                                    </td>
                                    <td>
                                        {{ $peng->judul }}
                                    </td>
                                </tr>

                                @endforeach
                                <tr>
                                    <td colspan="2" style="text-align: center;">{{ $pengumuman->links() }}  </td>
                                </tr>
                            </tbody>
                        </table> 
                         
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="avatar bg-rgba-danger p-50 m-0 mb-1">
                            <div class="avatar-content">
                                <i class="feather icon-globe text-danger font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700">90</h2>
                        <p class="mb-0 line-ellipsis">Total Pengabdian Internal</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="avatar bg-rgba-primary p-50 m-0 mb-1">
                            <div class="avatar-content">
                                <i class="feather icon-users text-primary font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700">0</h2>
                        <p class="mb-0 line-ellipsis">Total Pengabdian Eksternal</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="avatar bg-rgba-success p-50 m-0 mb-1">
                            <div class="avatar-content">
                                <i class="feather icon-bar-chart-2 text-success font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700">243</h2>
                        <p class="mb-0 line-ellipsis">Total Penelitian</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="avatar bg-rgba-danger p-50 m-0 mb-1">
                            <div class="avatar-content">
                                <i class="feather icon-pie-chart text-danger font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700">90</h2>
                        <p class="mb-0 line-ellipsis">Total Pengabdian</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="avatar bg-rgba-info p-50 m-0 mb-1">
                            <div class="avatar-content">
                                <i class="feather icon-globe text-info font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700">1,17</h2>
                        <p class="mb-0 line-ellipsis">Rasio Penelitian</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="avatar bg-rgba-success p-50 m-0 mb-1">
                            <div class="avatar-content">
                                <i class="feather icon-users text-success font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700">0,43</h2>
                        <p class="mb-0 line-ellipsis">Rasio Pengabdian</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        $('#table-pengumuman').DataTable({
            responsive: true
        });
    </script>
@endsection