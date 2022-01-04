@extends('admin/admin')
@section('content')

<div class="row">

  <div class="col-12">
    {{ Form::model($absensi,['route'=>['laporan.update',$absensi['id_absensi']], 'method'=>'PUT']) }}
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
        <input type="hidden" name="ids" value="{{ $absensi['id_user'] }}">
        <div class="form-group">
            {{ Form::label('tanggal', 'Tanggal') }}
            {{ Form::date('tanggal', $absensi['tanggal'], ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::label('jam', 'Jam') }}
            {{ Form::time('jam', $absensi['jam'], ['class'=>'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('status', 'Status Kehadiran') }}
          {{ Form::select('status_absensi', array('Masuk' => 'Masuk', 'Pulang' => 'Pulang'), $absensi['status_absensi'], ['class' => 'form-control']) }}
        </div>
          <div class="form-group">
            {{ Form::label('status', 'Status Kehadiran') }}
            {{ Form::select('status', array('Hadir' => 'Hadir', 'Izin' => 'Izin'), $absensi['status'], ['class' => 'form-control']) }}
          </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('keterangan_absensi', 'Keterangan Izin (*jika Izin)') }}
            {{ Form::textarea('keterangan_absensi', $absensi['keterangan_absensi'], ['class'=>'form-control', 'placeholder'=>'Masukan Keterangan..', 'rows'=>5]) }}
        </div>
        <div class="form-group">
            {{ Form::label('kegitaan', 'Kegiatan Harian (*jika ada)') }}
            {{ Form::textarea('kegiatan', $absensi['kegiatan'], ['class'=>'form-control', 'placeholder'=>'Masukan Keterangan..', 'rows'=>5]) }}
        </div>
        </div>
      </div>
      </div>

      <div class="card-footer">

        <div class="row">
          <div class="col-md-6">
            <a href="{{ URL::to('admin/laporan/detail?ids='.$absensi['id_user']) }}" class="btn btn-outline-info btn-block">Kembali</a>
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
