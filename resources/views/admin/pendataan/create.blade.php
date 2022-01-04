

@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            {{ Form::open(array('url' => '/pendataan/store', 'method' => 'post')) }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Tambah Data Magang</b></h3>
                    </div>
                    <div class="card-body">
                        @if(!empty($errors->all()))
                        <div class="alert alert-danger">
                            {{ Html::ul($errors->all())}}
                        </div>
                        @endif

                                  {{ Form::hidden('id_user', $user['id'])}}


                        <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                  {{ Form::label('jk', 'Jenis Kelamin') }}
                                  {{ Form::select('jk', array('Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan'), 'Laki-Laki', ['class' => 'form-control']) }}
                              </div>
                                <div class="form-group">
                                    {{ Form::label('ttl', 'Tanggal Lahir') }}
                                    {{ Form::date('ttl', '', ['class'=>'form-control']) }}
                                </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                  {{ Form::label('telp_ortu', 'No. Telepon Ortu') }}
                                  {{ Form::text('telp_ortu', '', ['class'=>'form-control', 'placeholder'=>'Masukkan No.Telp Orang Tua']) }}
                              </div>
                              <div class="form-group">
                                  {{ Form::label('nomor_induk', 'Nomor Induk') }}
                                  {{ Form::text('nomor_induk', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Nomor Induk']) }}
                              </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-6">
                            <div class="form-group">
                                {{ Form::label('id_dinas', 'Dinas') }}
                                {{ Form::select('id_dinas', $dinas->pluck('nama_dinas', 'id_dinas'), '', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('status', 'Status Magang') }}
                                {{ Form::select('status', array('aktif' => 'Aktif', 'tidak aktif' => 'Tidak Aktif'), 'aktif', ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('jurusan', 'Jurusan') }}
                                {{ Form::text('jurusan', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Jurusan']) }}
                            </div>
                            <div class="form-group">
                                  {{ Form::label('tanggal_masuk', 'Tanggal Masuk') }}
                                  {{ Form::date('tanggal_masuk', '', ['class'=>'form-control']) }}
                              </div>
                              <div class="form-group">
                                  {{ Form::label('tanggal_keluar', 'Tanggal Keluar') }}
                                  {{ Form::date('tanggal_keluar', '', ['class'=>'form-control']) }}
                              </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                                {{ Form::label('asal_peserta', 'Asal Kampus') }}
                                {{ Form::text('asal_peserta', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Kampus']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('alamat_asal', 'Alamat Kampus') }}
                                {{ Form::textarea('alamat_asal', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Alamat Kampus']) }}
                            </div>
                          </div>
                        </div>
                        </div>
                    <div class="card-footer">
                        <a href="{{ URL::to('admin/peserta') }}" class="btn btn-outline-info">Kembali</a>
                        {{ Form::submit('Simpan', ['class' => 'btn btn-primary pull-right']) }}
                    </div>
                </div>
            <!-- </form> -->
            {{ Form::close() }}
        </div>
    </div>
@endsection
