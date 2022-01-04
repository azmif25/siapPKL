@extends('admin/admin')
@section('content')

<div class="row">

  <div class="col-12">
    {{ Form::model($user,['route'=>['pengguna.update',$user['id_user']], 'method'=>'PUT']) }}
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Edit User Admin</h3>
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
            {{ Form::text('nik', $user->pegawai['nik'], ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('nip', 'NIP') }}
            {{ Form::text('nip', $user->pegawai['nip'], ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('username', 'Username') }}
          {{ Form::text('username', $user['username'], ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('password', 'Password') }}
          {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Masukan Password Lama/Baru', 'required']) }}
        </div>
        <div class="form-group">
          {{ Form::label('email', 'E-mail') }}
          {{ Form::text('email', $user['email'], ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('role', 'Role') }}
            {{ Form::select('role', $rolename->pluck('rolename', 'id'), $user['rolename'], ['class' => 'form-control']) }}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {{ Form::label('nama', 'Nama Lengkap') }}
          {{ Form::text('nama', $user->pegawai['nama_pegawai'], ['class' => 'form-control']) }}
        </div>
        <div class="form-group clearfix">
          <label for="">Jenis Kelamin*</label><br>
          <div class="icheck-primary d-inline">
            <input type="radio" id="radioPrimary1" name="jk" @if ($user->pegawai['jk'] == 'Laki-Laki') checked=""@endif value="Laki-Laki">
            <label for="radioPrimary1">Laki - Laki
            </label>
          </div>&nbsp;&nbsp;&nbsp;&nbsp;
          <div class="icheck-primary d-inline">
            <input type="radio" id="radioPrimary2" name="jk" @if ($user->pegawai['jk'] == 'Perempuan') checked=""@endif value="Perempuan">
            <label for="radioPrimary2">Perempuan
            </label>
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('alamat', 'Alamat Lengkap') }}
          {{ Form::textarea('alamat', $user->pegawai['alamat_pegawai'], ['class' => 'form-control', 'rows'=>5]) }}
        </div>
        <div class="form-group">
          {{ Form::label('nohp', 'No. Telepon / WA') }}
          {{ Form::text('nohp', $user->pegawai['no_hp_pegawai'], ['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('bagian', 'Bagian') }}
            {{ Form::select('bagian', $bagian->pluck('nama_bagian', 'id_bagian'), $user['nama_bagian'], ['class' => 'form-control']) }}
        </div>
      </div>
      </div>

      <div class="card-footer">

        <div class="row">
          <div class="col-md-6">
            <a href="{{ URL::to('admin/pengguna') }}" class="btn btn-outline-info btn-block">Kembali</a>
          </div>
          <div class="col-md-6">
            {{ Form::submit('Ubah', ['class' => 'btn btn-primary pull-right btn-block']) }}
          </div>
        </div>
      </div>
      </div>
    </div>

    <!-- </form> -->
    {{ Form::close() }}

  </div>

</div>

@endsection
