@extends('layout')

@section('judul')
    Profil Pengguna
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

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Informasi Pribadi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="basic-tab" data-toggle="tab" href="#basic" aria-controls="basic" role="tab" aria-selected="true">Informasi Umum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" aria-controls="contact" role="tab" aria-selected="false">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="citation-tab" data-toggle="tab" href="#citation" aria-controls="citation" role="tab" aria-selected="false">Account</a>
                    </li>
                </ul>
                <form action="{{ route('profil.store') }}" class="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="tab-content">
                        <div class="tab-pane active" id="basic" aria-labelledby="basic-tab" role="tabpanel">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3 col-12">
                                        @isset ($user->profile_photo_path)
                                            <img src="{{ asset($user->profile_photo_path) }}" class="img-fluid" alt="Profile picture">
                                        @else
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png" class="img-fluid" alt="Profile picture">
                                        @endisset
                                    </div>
                                    <div class="col-md-9 col-12">
                                        <fieldset class="form-group">
                                            <label for="basicInputFile">Ubah Foto <span class="text-secondary">*Maksimal Ukuran Foto 250Kb</span></label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="profile_photo_path" accept=".jpg,.jpeg,.png">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6 col-12 mt-md-2">
                                        <div class="form-label-group">
                                            <input type="number" id="id" class="form-control" placeholder="NIDN" name="nidn" value="{{ $user->nidn }}">
                                            <label for="id">NIDN</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12 mt-md-2">
                                        <div class="form-label-group">
                                            <input type="text" id="name" class="form-control" placeholder="Nama" name="nama" value="{{ $user->nama }}">
                                            <label for="name">Nama</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="text" id="birthPlace" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" value="{{ $user->tempat_lahir }}">
                                            <label for="birthPlace">Tempat Lahir</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="date" id="birthDate" class="form-control" placeholder="Country" name="tanggal_lahir" value="{{ $user->tanggal_lahir }}">
                                            <label for="birthDate">Tanggal Lahir</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <input type="hidden" name="jabatan_id" value="{{ $user->jabatan_id }}" required>
                                            <input type="hidden" name="prodi_id" value="{{ $user->prodi_id }}" required>
                                            <input type="hidden" name="status" value="{{ $user->status }}" required>
                                            <input type="number" id="citizenID" class="form-control" placeholder="No. KTP" name="ktp" value="{{ $user->ktp }}">
                                            <label for="citizenID">No. KTP</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-label-group">
                                            <textarea class="form-control" id="address" rows="3" placeholder="Alamat" name="alamat">{{ $user->alamat }}</textarea>
                                            <label for="address">Alamat</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="contact" aria-labelledby="contact-tab" role="tabpanel">
                          <div class="form-body mt-2">
                              <div class="row">
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                          <input type="tel" id="telephone" class="form-control" placeholder="No. Telepon" name="telepon" value="{{ $user->telepon }}">
                                          <label for="telephone">No. Telepon</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                          <input type="tel" id="phone" class="form-control" placeholder="No. Telepon" name="hp" value="{{ $user->hp }}">
                                          <label for="phone">No. HP</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                          <input type="email" id="email" class="form-control" placeholder="Alamat Email" name="email" value="{{ $user->email }}">
                                          <label for="email">Alamat Email</label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                          <input type="text" id="website" class="form-control" placeholder="Situs Web" name="web" value="{{ $user->web }}">
                                          <label for="website">Situs Web</label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="citation" aria-labelledby="citation-tab" role="tabpanel">
                          <div class="form-body mt-2">
                              <div class="row">
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                          <input type="number" id="sinta_id" class="form-control" placeholder="ID SINTA" name="sinta_id" value="{{ $user->sinta_id }}">
                                          <label for="sinta_id">ID SINTA <span class="text-secondary">(cth. 6113189)</span></label>
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-label-group">
                                          <input type="text" id="google_scholar_id" class="form-control" placeholder="ID Google Scholar" name="google_scholar_id" value="{{ $user->google_scholar_id }}">
                                          <label for="google_scholar_id">ID Google Scholar <span class="text-secondary">(cth. b1wUPgMAAAAJ)</span></label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
@endsection