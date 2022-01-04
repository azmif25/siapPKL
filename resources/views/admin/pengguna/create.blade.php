@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            {{ Form::open(['route'=>'pengguna.store']) }}
            {{ Form::token() }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Tambah Pegawai</b></h3>
                    </div>
                    <div class="card-body">
                        {{-- @if(!empty($errors->all()))
                        <div class="alert alert-danger">
                            {{ Html::ul($errors->all())}}
                        </div>
                        @endif --}}
                        <div class="row">
                            <div class="col-6">
                              <input type="hidden" name="id_user" class="form-control" value="<?php echo(rand()) ?>">
                                <div class="form-group">
                                    {{ Form::label('nik', 'NIK') }}
                                    {{ Form::text('nik', '', ['class'=>'form-control', 'placeholder'=>'Masukkan NIK']) }}
                                    @if($errors->has('nik'))
  			                                <div class="text-danger">
                                            *
  			                                    {{ $errors->first('nik')}}
  																					{{-- <h2>SALAhs</h2> --}}
  			                                </div>
  			                            @endif
                                </div>
                                    <div class="form-group">
                                        {{ Form::label('nip', 'NIP') }}
                                        {{ Form::text('nip', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Lengkap']) }}
                                        @if($errors->has('nip'))
      			                                <div class="text-danger">
                                                *
      			                                    {{ $errors->first('nip')}}
      																					{{-- <h2>SALAhs</h2> --}}
      			                                </div>
      			                            @endif
                                    </div>
                                <div class="form-group">
                                    {{ Form::label('username', 'Username') }}
                                    {{ Form::text('username', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Username']) }}
                                    @if($errors->has('username'))
  			                                <div class="text-danger">
                                            *
  			                                    {{ $errors->first('username')}}
  																					{{-- <h2>SALAhs</h2> --}}
  			                                </div>
  			                            @endif
                                </div>
                                <div class="form-group">
                                    {{ Form::label('password', 'Password') }}
                                    {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'Masukkan Password', 'autocomplete'=>'off', 'pattern' => '.{4,}', 'required', 'tittle' => 'Minimal 4 Karakter'], '') }}
                                </div>
                                  <div class="form-group">
                                      {{ Form::label('email', 'E-Mail') }}
                                      {{ Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'Masukkan E-Mail']) }}
                                      @if($errors->has('email'))
    			                                <div class="text-danger">
                                              *
    			                                    {{ $errors->first('email')}}
    																					{{-- <h2>SALAhs</h2> --}}
    			                                </div>
    			                            @endif
                                  </div>
                                  <div class="form-group">
                                      {{ Form::label('role', 'Role') }}
                                      {{ Form::select('role', $rolename->pluck('rolename', 'id'), '', ['class' => 'form-control']) }}
                                  </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {{ Form::label('nama', 'Nama Pegawai') }}
                                    {{ Form::text('nama', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Username']) }}
                                    @if($errors->has('nama'))
  			                                <div class="text-danger">
                                            *
  			                                    {{ $errors->first('nama')}}
  																					{{-- <h2>SALAhs</h2> --}}
  			                                </div>
  			                            @endif
                                </div>
                                <div class="form-group clearfix">
                                  <label for="">Jenis Kelamin*</label><br>
                                  <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" name="jk" checked="" value="Laki-Laki">
                                    <label for="radioPrimary1">Laki - Laki
                                    </label>
                                  </div>&nbsp;&nbsp;&nbsp;&nbsp;
                                  <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" name="jk" value="Perempuan">
                                    <label for="radioPrimary2">Perempuan
                                    </label>
                                  </div>
                                </div>
                              <div class="form-group">
                                  {{ Form::label('alamat', 'Alamat Lengkap') }}
                                  {{ Form::textarea('alamat', '', ['class'=>'form-control', 'placeholder'=>'Masukan Alamat', 'rows'=>5]) }}
                                  @if($errors->has('alamat'))
                                      <div class="text-danger">
                                          *
                                          {{ $errors->first('alamat')}}
                                          {{-- <h2>SALAhs</h2> --}}
                                      </div>
                                  @endif
                              </div>
                              <div class="form-group">
                                  {{ Form::label('nohp', 'No. Telepon / WA') }}
                                  {{ Form::text('nohp', '', ['class'=>'form-control', 'placeholder'=>'Masukkan No. Telepon']) }}
                                  @if($errors->has('nohp'))
                                      <div class="text-danger">
                                          *
                                          {{ $errors->first('nohp')}}
                                          {{-- <h2>SALAhs</h2> --}}
                                      </div>
                                  @endif
                              </div>
                              <div class="form-group">
                                  {{ Form::label('bagian', 'Bagian') }}
                                  {{ Form::select('bagian', $bagian->pluck('nama_bagian', 'id_bagian'), '', ['class' => 'form-control']) }}
                                  @if($errors->has('bagian'))
                                      <div class="text-danger">
                                          *
                                          {{ $errors->first('bagian')}}
                                          {{-- <h2>SALAhs</h2> --}}
                                      </div>
                                  @endif
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                      <div class="row">
                        <div class="col-md-6">
                          <a href="{{ URL::to('admin/pengguna') }}" class="btn btn-outline-info btn-block">Kembali</a>
                        </div>
                        <div class="col-md-6">
                          {{ Form::submit('Simpan', ['class' => 'btn btn-primary pull-right btn-block']) }}
                        </div>
                      </div>
                    </div>
                </div>
            <!-- </form> -->
            {{ Form::close() }}
        </div>
    </div>
@endsection
