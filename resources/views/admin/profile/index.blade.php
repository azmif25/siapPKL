@extends('admin/admin')
@section('content')

<div class="container">
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                @if (Session::has('message'))
               <div id="alert-msg" class="alert alert-success alert-dismissible">
                   <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                   {{ Session::get('message') }}
               </div>
               @endif
                <div class="card-body">

                  <div class="d-flex flex-column align-items-center text-center">
                    @if ((Auth::user()->role->rolename == 'EndUser') && (Auth::user()->pesertadata['foto_peserta']))
                    <img src="{{ url('/storage/fotoProfile/'.Auth::user()->pesertadata['foto_peserta']) }}" alt="Admin" class="img-fluid rounded-circle">
                    @elseif ((Auth::user()->role->rolename == 'EndUser') && (Auth::user()->pesertadata['foto_peserta'] == null))
                    <img src="https://p.kindpng.com/picc/s/78-786207_user-avatar-png-user-avatar-icon-png-transparent.png" alt="Admin" class="rounded-circle" width="150">
                    @else
                    <img src="https://img.icons8.com/bubbles/2x/user.png" alt="Admin" class="rounded-circle" width="150">
                    @endif
                    <div class="mt-3">
                      @if (Auth::user()->role->rolename == 'EndUser')
                      <h3> {{ Auth::user()->pesertadata['nama_peserta'] }}</h3>
                      @else
                      <h3> {{ Auth::user()->pegawai['nama_pegawai'] }} </h3>
                      @endif
                      <p class="text-secondary mb-1">Bagian</p>
                      <p class="text-muted font-size-sm">

                        @if (Auth::user()->role->rolename == 'EndUser')
                          {{ Auth::user()->pesertadata->dinas['nama_bagian'] }}
                        @else
                          {{ Auth::user()->pegawai->dinas['nama_bagian'] }}
                        @endif
                      </p>
                      @php
                        $id = Auth::user()->id_user;
                      @endphp
                      @if (Auth::user()->role->rolename == 'EndUser')
                      {{-- <form action="/upload/peserta" method="post" enctype="multipart/form-data"> --}}
                        <form method="POST" action="/upload/peserta/{{ $id }}" enctype="multipart/form-data">
                          {{-- <form action="{{url(action('RegisterController@postRegister'))}}" method="post" enctype="multipart/form-data"> --}}
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                          <input type="file" name="filename" class="form-control rounded" placeholder="Upload Foto Profile">
                          <button type="submit" class="btn btn-primary btn-sm btn-block">Upload</button>
                        </div>
                      </form>
                    {{-- @else
                      <form action="/upload/pegawai" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                          <input type="file" name="file" class="form-control rounded" placeholder="Upload Foto Profile">
                          <button type="submit" class="btn btn-primary btn-sm btn-block">Upload</button>
                        </div>
                      </form> --}}
                    @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">NIK</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    @if (Auth::user()->role->rolename == 'EndUser')
                      {{ Auth::user()->pesertadata['nik'] }}
                    @else
                      {{ Auth::user()->pegawai['nik'] }}
                    @endif
                    </div>
                  </div>
                  <hr>
                  @if (Auth::user()->role->rolename == 'EndUser')
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Nomor Induk</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                        {{ Auth::user()->pesertadata['nomor_induk'] }}
                      </div>
                    </div>
                  <hr>
                  @endif
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      @if (Auth::user()->role->rolename == 'EndUser')
                        {{ Auth::user()->pesertadata['alamat_peserta'] }}
                      @else
                        {{ Auth::user()->pegawai['alamat_pegawai'] }}
                      @endif
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Jenis Kelamin</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      @if (Auth::user()->role->rolename == 'EndUser')
                        {{ Auth::user()->pesertadata['jk'] }}
                      @else
                        {{ Auth::user()->pegawai['jk'] }}
                      @endif
                    </div>
                  </div>
                  <hr>
                  @if (Auth::user()->role->rolename == 'EndUser')
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tempat Lahir</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ Auth::user()->pesertadata['tempat_lahir'] }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tanggal Lahir</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ Auth::user()->pesertadata['tanggal_lahir'] }}
                    </div>
                  </div>
                  <hr>
                  @endif
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nomor HP</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      @if (Auth::user()->role->rolename == 'EndUser')
                        {{ Auth::user()->pesertadata['no_hp'] }}
                      @else
                        {{ Auth::user()->pegawai['no_hp_pegawai'] }}
                      @endif
                    </div>
                  </div>
                  <hr>
                  @if (Auth::user()->role->rolename == 'EndUser')
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nomor HP Orang Tua</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ Auth::user()->pesertadata['telp_ortu'] }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Asal Kampus/Sekolah</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ Auth::user()->pesertadata['asal_peserta'] }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat Kampus/Sekolah</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ Auth::user()->pesertadata['alamat_asal'] }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Jurusan</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ Auth::user()->pesertadata['jurusan'] }}
                    </div>
                  </div>
                  <hr>
                  @endif
                  @php
                    $id = Auth::user()->id_user;
                  @endphp
                  <form method="POST" action="/user/update/{{ $id }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                  <div class="row">
                    <div class="col-sm-3">
                      <b>Ganti Password</b>
                    </div>
                    <div class="col-sm-6 text-secondary">
                      <div class="form-group">
                        <input type="password" name="password" placeholder="Masukan Password Baru" class="form-control rounded">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <button type="submit" name="button" class="btn btn-primary btn-sm">Ubah Password</button>
                    </div>
                  </div>
                </form>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
