@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            {{ Form::open(['route'=>'peserta.store', 'enctype'=>'multipart/form-data']) }}
            {{ Form::token() }}
            {{ Form::hidden('status', 'aktif') }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Daftar Peserta PKL</b></h3>
                    </div>
                    <div class="card-body">
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
                                    {{ Form::label('noin', 'Nomor Induk') }}
                                    {{ Form::text('noin', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Nomor Induk Siswa / Mahasiswa']) }}
                                    @if($errors->has('noin'))
                                        <div class="text-danger">
                                            *
                                            {{ $errors->first('noin')}}
                                            {{-- <h2>SALAhs</h2> --}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    {{ Form::label('nama', 'Nama Lengkap') }}
                                    {{ Form::text('nama', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Lengkap']) }}
                                    @if($errors->has('nama'))
                                        <div class="text-danger">
                                            *
                                            {{ $errors->first('nama')}}
                                            {{-- <h2>SALAhs</h2> --}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    {{ Form::label('tempatl', 'Tempat Lahir') }}
                                    {{ Form::text('tempatl', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Tempat Lahir']) }}
                                    @if($errors->has('tempatl'))
                                        <div class="text-danger">
                                            *
                                            {{ $errors->first('tempatl')}}
                                            {{-- <h2>SALAhs</h2> --}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    {{ Form::label('tanggall', 'Tanggal Lahir') }}
                                    {{ Form::date('tanggall', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Tanggal Lahir']) }}
                                    @if($errors->has('tanggall'))
                                        <div class="text-danger">
                                            *
                                            {{ $errors->first('tanggall')}}
                                            {{-- <h2>SALAhs</h2> --}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    {{ Form::label('jk', 'Jenis Kelamin') }}<br>
                                    {{ Form::radio('jk', 'Laki-Laki', ['class'=>'form-control']) }}Laki-Laki &emsp;
                                    {{ Form::radio('jk', 'Perempuan', ['class'=>'form-control']) }}Perempuan
                                    @if($errors->has('jk'))
                                        <div class="text-danger">
                                            *
                                            {{ $errors->first('jk')}}
                                            {{-- <h2>SALAhs</h2> --}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    {{ Form::label('telp', 'Nomor Telepon / WA') }}
                                    {{ Form::number('telp', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Nomor Telepon / WA']) }}
                                    @if($errors->has('telp'))
                                        <div class="text-danger">
                                            *
                                            {{ $errors->first('telp')}}
                                            {{-- <h2>SALAhs</h2> --}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    {{ Form::label('telpot', 'Nomor Telepon / WA Orang Tua') }}
                                    {{ Form::number('telpot', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Nomor Telepon / WA Orang Tua']) }}
                                    @if($errors->has('telpot'))
                                        <div class="text-danger">
                                            *
                                            {{ $errors->first('telpot')}}
                                            {{-- <h2>SALAhs</h2> --}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    {{ Form::label('alamat', 'Alamat') }}
                                    {{ Form::textarea('alamat', '', ['class'=>'form-control', 'placeholder'=>'Masukan Alamat Lengkap', 'rows'=>3]) }}
                                    @if($errors->has('alamat'))
                                        <div class="text-danger">
                                            *
                                            {{ $errors->first('alamat')}}
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
                              <div class="col-md-6">
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
                                    {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'Masukkan Password', 'autocomplete'=>'off'], '') }}
                                    @if($errors->has('password'))
                                        <div class="text-danger">
                                            *
                                            {{ $errors->first('password')}}
                                            {{-- <h2>SALAhs</h2> --}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    {{ Form::label('jurusan', 'Jurusan / Program Studi') }}
                                    {{ Form::text('jurusan', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Jurusan / Program Studi']) }}
                                    @if($errors->has('jurusan'))
                                        <div class="text-danger">
                                            *
                                            {{ $errors->first('jurusan')}}
                                            {{-- <h2>SALAhs</h2> --}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    {{ Form::label('asal', 'Nama Sekolah / Kampus') }}
                                    {{ Form::text('asal', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Sekolah / Kampus']) }}
                                    @if($errors->has('asal'))
                                        <div class="text-danger">
                                            *
                                            {{ $errors->first('asal')}}
                                            {{-- <h2>SALAhs</h2> --}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    {{ Form::label('alamatasal', 'Alamat Sekolah / Kampus') }}
                                    {{ Form::textarea('alamatasal', '', ['class'=>'form-control', 'placeholder'=>'Masukan Alamat Sekolah / Kampus', 'rows'=>6]) }}
                                    @if($errors->has('alamat_asal'))
                                        <div class="text-danger">
                                            *
                                            {{ $errors->first('alamatasal')}}
                                            {{-- <h2>SALAhs</h2> --}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    {{ Form::label('tglmasuk', 'Tanggal Masuk') }}
                                    {{ Form::date('tglmasuk', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Tanggal Lahir']) }}
                                    @if($errors->has('tglmasuk'))
                                        <div class="text-danger">
                                            *
                                            {{ $errors->first('tglmasuk')}}
                                            {{-- <h2>SALAhs</h2> --}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    {{ Form::label('tglkeluar', 'Tanggal Keluar') }}
                                    {{ Form::date('tglkeluar', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Tanggal Lahir']) }}
                                    @if($errors->has('tglkeluar'))
                                        <div class="text-danger">
                                            *
                                            {{ $errors->first('tglkeluar')}}
                                            {{-- <h2>SALAhs</h2> --}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    {{ Form::label('filename', 'Surat Pengantar') }}*scan berbentuk JPG
                                    {{ Form::file('filename', ['class'=>'form-control', 'autofocus']) }}
                                    @if($errors->has('filename'))
                                        <div class="text-danger">
                                            *
                                            {{ $errors->first('filename')}}
                                            {{-- <h2>SALAhs</h2> --}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                      <div class="row">
                        <div class="col-6">
                          <a href="{{ URL::to('admin/peserta') }}" class="btn btn-outline-info btn-block">Kembali</a>
                        </div>
                        <div class="col-6">
                          {{ Form::submit('Simpan', ['class' => 'btn btn-primary btn-block']) }}
                        </div>
                      </div>
                    </div>
                </div>
            <!-- </form> -->
            {{ Form::close() }}
        </div>
    </div>
@endsection
