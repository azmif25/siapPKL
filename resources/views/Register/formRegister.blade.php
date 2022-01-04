
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{config('app.name')}}</title>

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css')}}">
  </head>

<style media="screen">
body{
  background: -webkit-linear-gradient(left, #0072ff, #00c6ff);
}
</style>

  <body class="text-center">
    <div class="container contact-form">
                <div class="contact-image">
                    <img src="https://i.pinimg.com/originals/d9/c8/4a/d9c84abcf4b69b73c59b1c28682f47cd.png" alt="logo"/>
                </div>
                <div class="col-12">
                  @if(count($errors) > 0)
          				<div class="alert alert-danger">
          					@foreach ($errors->all() as $error)
          					{{ $error }} <br/>
          					@endforeach
          				</div>
          				@endif
                </div>
                <form action="{{url(action('RegisterController@postRegister'))}}" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="<?php echo csrf_token();  ?>">
                  <input type="hidden" name="status" value="tidak aktif">
                    <h3>Pendaftaran Peserta</h3>

                      <div class="row">
                        <div class="col-md-6">
                          <h4>Data Diri Pribadi</h4>
                          <input type="hidden" name="id_user" class="form-control" value="<?php echo(rand()) ?>">
                            <div class="form-group">
                                <label for=" ">NIK*</label>
                                <input type="text" name="nik" class="form-control" placeholder="Masukan NIK" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for=" ">Nomor Induk Siswa / Nomor Induk Mahasiswa*</label>
                                <input type="text" name="noin" class="form-control" placeholder="Masukan Nomor Induk Siswa / Nomor Induk Mahasiswa" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for=" ">Nama Lengkap*</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Lengkap" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for=" ">Tempat Lahir*</label>
                                <input type="text" name="tempatl" class="form-control" placeholder="Masukan Tempat Lahir" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for=" ">Tanggal Lahir*</label>
                                <input type="date" name="tanggall" class="form-control" placeholder="Masukan Tanggal Lahir" required autofocus>
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
                                <label for=" ">Nomor Telepon / WA*</label>
                                <input type="number" name="telp" class="form-control" placeholder="Masukan Nomor Telepon / WA" required autofocus>
                            </div><div class="form-group">
                                <label for=" ">Nomor Telepon / WA Orang Tua*</label>
                                <input type="number" name="telpot" class="form-control" placeholder="Masukan Nomor Telepon / WA Orang Tua" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat Lengkap</label>
                                <textarea name="alamat" class="form-control" placeholder="Masukan Alamat Lengkap" style="width: 100%; height: 150px;"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                          <h4>Data PKL</h4>
                          <div class="form-group">
                              <label for=" ">E-mail*</label>
                              <input type="email" name="email" class="form-control" placeholder="Masukan E-Mail" required autofocus>
                          </div>
                          <div class="form-group">
                              <label for=" ">Username*</label>
                              <input type="text" name="username" class="form-control" placeholder="Masukan Username" required autofocus>
                          </div>
                          <div class="form-group">
                              <label for=" ">Password*</label>
                              <input type="password" name="password" class="form-control" placeholder="Masukan Password" required autofocus>
                          </div>
                          <div class="form-group">
                              <label for=" ">Jurusan / Program Studi*</label>
                              <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan / Program Studi" required autofocus>
                          </div>
                          <div class="form-group">
                              <label for=" ">Asal Sekolah / Kampus*</label>
                              <input type="text" name="asal" class="form-control" placeholder="Masukan Nama Sekolah / Kampus" required autofocus>
                          </div>
                            <div class="form-group">
                              <label for="">Alamat Sekolah / Kampus*</label>
                                <textarea name="alamatasal" class="form-control" placeholder="Masukan Alamat Lengkap Sekolah / Kampus *" style="width: 100%; height: 150px;"></textarea>
                            </div>
                            <div class="form-group">
                                <label for=" ">Tanggal Masuk*</label>
                                <input type="date" name="tglmasuk" class="form-control" placeholder="Masukan Tanggal Masuk" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for=" ">Tanggal Keluar*</label>
                                <input type="date" name="tglkeluar" class="form-control" placeholder="Masukan Tanggal Keluar" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="">Surat Pengantar PKL</label>*scan berbentuk JPG
                                <input type="file" name="filename" class="form-control" required autofocus>
                            </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                              <input type="submit" name="btnSubmit" class="btnContact" value="Daftar" />
                          </div>
                          Sudah Mempunyai akun? <a href="{{ URL::to('login')}}">Login Disini</a>
                        </div>
                    </div>
                </form>
    </div>
  </body>
</html>
