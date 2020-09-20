@extends('layout')

@section('judul')
    SITASI
@endsection

@section('content')
    @if(session()->get('success'))
        <div class ="alert alert-success">
            {{ session()->get('success') }}  
        </div><br />
    @endif

    <div class="row">
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-content">
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
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-content">
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
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-content">
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
        </div>
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-content">
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
        </div>
    </div>

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Informasi Pribadi</h3>

              <div class="card-tools">
                <a href="#" class="btn btn-success">Ubah Profil</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="card-text">
                    <dl class="row">
                        <dt class="col-sm-3">Foto Profil</dt>
                        <dd class="col-sm-9">
                            <div class="row">
                                <div class="col-12">
                                    <img src="{{ asset('app-assets/images/portrait/small/avatar-s-11.jpg') }}" alt="Profile picture">
                                </div>
                                <div class="col-12">
                                    <form action="#" method="post">
                                        <fieldset class="form-group">
                                            <label for="basicInputFile"><strong>Ubah Foto</strong> *Maksimal Ukuran Foto 250Kb</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Unggah</button>
                                </div>
                            </div>
                        </dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Nama</dt>
                        <dd class="col-sm-9">John Doe</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">NIDN</dt>
                        <dd class="col-sm-9">0843098017</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Email</dt>
                        <dd class="col-sm-9">john@example.com</dd>
                    </dl>
                    <dl class="row">
                        <dt class="col-sm-3">Link Google Scholar</dt>
                        <dd class="col-sm-9 text-danger">Ubah Biodata Untuk Setting Link Google Scholar</dd>
                    </dl>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
@endsection

@section('js')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/cards/card-statistics.js') }}"></script>
    <!-- END: Page JS-->
@endsection