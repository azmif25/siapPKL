@extends('admin/admin')
@section('content')

<div class="row">

  <div class="col-12">
    {{ Form::model($user,['route'=>['peserta.update',$user['id_user']], 'method'=>'PUT']) }}
<div class="card">
  <div class="card-header">
    <h3 class="card-title"><b>Edit User Magang</b></h3>
  </div>

  <div class="card-body">
    @if(!empty($errors->all()))
    <div class="alert alert-danger">
        {{ Html::ul($errors->all())}}
    </div>
    @endif

    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('nik', 'NIK') }}
            {{ Form::text('nik', $user->pesertadata['nik'], ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('noin', 'Nomor Induk') }}
            {{ Form::text('noin', $user->pesertadata['nomor_induk'], ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('nama', 'Nama Lengkap') }}
            {{ Form::text('nama', $user->pesertadata['nama_peserta'], ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('tempatl', 'Tempat Lahir') }}
            {{ Form::text('tempatl', $user->pesertadata['tempat_lahir'], ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('tanggall', 'Tanggal Lahir') }}
            {{ Form::date('tanggall', $user->pesertadata['tanggal_lahir'], ['class'=>'form-control']) }}
        </div>
        <div class="form-group clearfix">
          <label for="">Jenis Kelamin*</label><br>
          <div class="icheck-primary d-inline">
            <input type="radio" id="radioPrimary1" name="jk" @if ($user->pesertadata['jk'] == 'Laki-Laki') checked=""@endif value="Laki-Laki">
            <label for="radioPrimary1">Laki - Laki
            </label>
          </div>&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="icheck-primary d-inline">
            <input type="radio" id="radioPrimary2" name="jk" @if ($user->pesertadata['jk'] == 'Perempuan') checked=""@endif value="Perempuan">
            <label for="radioPrimary2">Perempuan
            </label>
          </div>
        </div>
        <div class="form-group">
            {{ Form::label('telp', 'Nomor Telepon / WA') }}
              {{ Form::number('telp', $user->pesertadata['no_hp'], ['class'=>'form-control']) }}
          </div>
        <div class="form-group">
            {{ Form::label('telpot', 'Nomor Telepon / WA Orang Tua') }}
            {{ Form::number('telpot', $user->pesertadata['telp_ortu'], ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('alamat', 'Alamat') }}
            {{ Form::textarea('alamat', $user->pesertadata['alamat_peserta'], ['class'=>'form-control', 'rows'=>5]) }}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{ Form::label('username', 'Username') }}
          {{ Form::text('username', $user['username'], ['class' => 'form-control']) }}
        </div>

        <div class="form-group">
          {{ Form::label('email', 'E-mail') }}
          {{ Form::text('email', $user['email'], ['class' => 'form-control']) }}
        </div>

        {{-- <div class="form-group">
            {{ Form::label('password', 'Password') }}
            {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'Masukkan Password', 'autocomplete'=>'off', 'required'], '') }}
        </div> --}}

        <div class="form-group">
            {{ Form::label('jurusan', 'Jurusan / Program Studi') }}
            {{ Form::text('jurusan', $user->pesertadata['jurusan'], ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('asal', 'Nama Sekolah / Kampus') }}
            {{ Form::text('asal', $user->pesertadata['asal_peserta'], ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('alamatasal', 'Alamat Sekolah / Kampus') }}
            {{ Form::textarea('alamatasal', $user->pesertadata['alamat_asal'], ['class'=>'form-control', 'rows'=>5]) }}
        </div>
        <div class="form-group">
            {{ Form::label('tglmasuk', 'Tanggal Masuk') }}
            {{ Form::date('tglmasuk', $user->pesertadata['tanggal_masuk'], ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('tglkeluar', 'Tanggal Keluar') }}
            {{ Form::date('tglkeluar', $user->pesertadata['tanggal_keluar'], ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('bagian', 'Bagian') }}
            {{ Form::select('bagian', $bagian->pluck('nama_bagian', 'id_bagian'), '', ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('status', 'Status') }}
            {!! Form::select('status', [ 'tidak aktif' => 'Tidak Aktif', 'aktif' => 'Aktif' ], $user->pesertadata['status'], ['class' => 'form-control']) !!}
        </div>

      </div>
      </div>

      <div class="card-footer text-center">
        <div class="row">
          <div class="col-6">
            <a href="{{ URL::to('admin/peserta') }}" class="btn btn-outline-info btn-block">Kembali</a>

          </div>
          <div class="col-6">
            {{ Form::submit('Ubah', ['class' => 'btn btn-primary btn-block']) }}

          </div>
        </div>

      </div>
    </div>

    <!-- </form> -->
    {{ Form::close() }}

  </div>
  </div>
</div>

@endsection
