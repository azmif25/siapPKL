@extends('admin/admin')
@section('content')

<div class="container">
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                    {{-- @if ((Auth::user()->role->rolename == 'EndUser') && (Auth::user()->pesertadata['foto_peserta']))
                      <img src="{{ url('/storage/fotoProfile/'.Auth::user()->pesertadata['foto_peserta']) }}" alt="Admin" class="rounded-circle" width="150">
                    @else
                      <img src="https://img.icons8.com/bubbles/2x/user.png" alt="Admin" class="rounded-circle" width="150">
                    @endif --}}
                    <div class="mt-3">
                      @foreach ($user as $adm)

                        <h3>{{$adm->pegawai['nama_pegawai']}}</h3>

                      <p class="text-secondary mb-1">Bagian</p>
                      <p class="text-muted font-size-sm">{{ $adm->pegawai->dinas['nama_bagian'] }}</p>
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
                    {{ $adm->pegawai['nik'] }}
                    </div>
                  </div>
                  <hr><div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">NIP</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $adm->pegawai['nip'] }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $adm->pegawai['alamat_pegawai'] }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Jenis Kelamin</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ $adm->pegawai['jk'] }}
                    </div>
                  </div>
                  <hr><div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">No. Hp</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $adm->pegawai['no_hp_pegawai'] }}
                    </div>
                  </div>
                  @endforeach
                  <div class="row">
                    <div class="col-sm-12">
                      {{-- <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a> --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
