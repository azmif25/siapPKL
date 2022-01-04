@extends('admin/admin')
@section('content')
  <div class="row">
    <div class="col-12 text-center">
      @if (Session::has('message'))
      <div id="alert-msg" class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          {{ Session::get('message') }}
      </div>
      @endif
    </div>
    <div class="col-12 text-center">

    @if ((Auth::user()->role->rolename == 'EndUser') && (Auth::user()->pesertadata['status'] == 'tidak aktif') && (Auth::user()->pesertadata['status_penerimaan'] == 'Menunggu'))
      <h5 class="alert alert-warning">
      <b>Masih Menunggu Konfirmasi Penerimaan, Cek Email Anda.</b>
      {{-- <b>{{  }}</b> --}}
      </h5>
    @endif
    </div>
    @if (Auth::user()->role->rolename == 'SuperAdmin')
    <div class="col-lg-6">
      <!-- small box -->

      <div class="small-box bg-info">
        <div class="inner">
          <?php
          $count = DB::table('t_peserta_magang')->where('status', 'aktif')->count();
          echo '<h3>'.$count.'</h3>';
          ?>

          <p>Peserta Magang (Aktif)</p>
        </div>
        <div class="icon">
          <i class="fa fa-user-tie"></i>
        </div>
        <a href="/admin/peserta" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-6">
      <!-- small box -->

      <div class="small-box bg-warning">
        <div class="inner">
          <?php
          $count = DB::table('t_peserta_magang')->where('status_penerimaan', 'Menunggu')->count();
          echo '<h3>'.$count.'</h3>';
          ?>

          <p>Calon Peserta yang belum DiTerima</p>
        </div>
        <div class="icon">
          <i class="fa fa-user-edit"></i>
        </div>
        <a href="{{URL::to('admin/persetujuan')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  @endif
    <!-- ./col -->
    @if ((Auth::user()->role->rolename == 'EndUser') && (Auth::user()->pesertadata['status'] == 'aktif') && (Auth::user()->pesertadata['status_penerimaan'] == 'Diterima'))
    <div class="col-lg-6 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <?php
          $count = DB::table('t_absensi_magang')->where('id_user', Auth::user()->id_user)->count();
          echo '<h3>'.$count.'</h3>';
          ?>

          <p>Jumlah Absensi</p>
        </div>
        <div class="icon">
          <i class="fa fa-calendar-alt"></i>
        </div>
        <a href="/admin/absensi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    @endif

    <!-- ./col -->
    @if ((Auth::user()->role->rolename == 'EndUser') && (Auth::user()->pesertadata['status'] == 'aktif') && (Auth::user()->pesertadata['status_penerimaan'] == 'Diterima'))
    <div class="col-lg-6 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <?php
          $count = DB::table('t_absensi_magang')->where('id_user', Auth::user()->id_user)->where('status', 'Izin')->count();
          echo '<h3>'.$count.'</h3>';
          ?>

          <p>Jumlah Izin</p>
        </div>
        <div class="icon">
          <i class="fa fa-user-minus"></i>
        </div>
        <a href="/admin/absensi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    @endif
    <!-- ./col -->
    {{-- <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>0<sup style="font-size: 20px">hari</sup></h3>

          <p>Sisa Waktu Magang</p>
        </div>
        <div class="icon">
          <i class="fa fa-calendar"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div> --}}
    <!-- ./col -->
  </div>



@if (Auth::user()->role->rolename == 'Pimpinan')
  <div class="col-lg-4 col-4">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner text-center">
        <?php
        $count = DB::table('t_peserta_magang')->where('status', 'aktif')->count();
        echo '<h3>'.$count.'</h3>';
        ?>

        <p>Jumlah Peserta (Aktif)</p>
      </div>
      <div class="icon">
        <i class="fa fa-users"></i>
      </div>
    </div>
  </div>
@endif

@if (Auth::user()->role->rolename == 'PembimbingLapangan')
  <div class="col-lg-4 col-4">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner text-center">
        <?php
        $count = DB::table('t_peserta_magang')->where('status', 'aktif')->where('id_bagian', Auth::user()->pegawai->id_bagian)->count();
        echo '<h3>'.$count.'</h3>';
        ?>

        <p>Jumlah Peserta (Aktif) <br>
          Di {{ Auth::user()->pegawai->dinas['nama_bagian'] }}</p>
      </div>
      <div class="icon">
        <i class="fa fa-users"></i>
        {{-- <i class="fas fa-users-class"></i> --}}
      </div>
    </div>
  </div>
@endif


@endsection
