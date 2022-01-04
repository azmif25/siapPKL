@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            {{ Form::open(['route'=>'absensi.store', 'files'=>true, 'id' => 'form']) }}

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><b>Absensi Peserta Magang </b></h3>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12 text-center">

                            @if ((date('l')=="Saturday") || (date('l')=="Sunday"))
                            <h5 class="alert alert-warning">
                            <b>HARI INI LIBUR, Tidak Perlu ABSEN</b>
                            </h5>
                            @endif
                          @php
                          $mytime = date("Y-m-d");
                          @endphp
                          @foreach ($absensi as $tt)
                            @if (($tt['tanggal']==$mytime) &&($tt['status_absensi'] == "Pulang") == 1)
                              <h5 class="alert alert-success"><b>ANDA SUDAH ABSEN MASUK DAN PULANG</b></h5>
                            @endif
                          @endforeach
                        </div>
                      </div>
                        @if(!empty($errors->all()))
                        <div class="alert alert-danger">
                            {{ Html::ul($errors->all())}}
                        </div>
                        @endif
                        <div class="row">
                          <div class="col-3">
                            {{ Form::hidden('id_user', Auth::user()->id_user) }}
                          </div>
                        </div>
                        <div class="row">

                            <div class="col-3">
                              <div class="form-group">
                                  <b>Tanggal : </b>
                                  <div class="text-center">
                                    <h2>
                                      <!-- Menampilkan Hari, Bulan dan Tahun -->
                                      <script type='text/javascript'>
                                      <!--
                                      var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                      var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                                      var date = new Date();
                                      var day = date.getDate();
                                      var month = date.getMonth();
                                      var thisDay = date.getDay(),
                                          thisDay = myDays[thisDay];
                                      var yy = date.getYear();
                                      var year = (yy < 1000) ? yy + 1900 : yy;
                                      document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                                      //-->
                                      </script>
                                    </h2>
                                  </div>
                              </div>
                            </div>
                            <div class="col-3">
                              <b>Jam : </b>
                              <div class="text-center">
                                <h2 id="clock"></h2>
                              </div>
                            </div>
                            <div class="col-3">
                              <div class="form-group">
                                  {{ Form::label('status', 'Status Kehadiran') }}
                                  {{ Form::select('status', array('Hadir' => 'Hadir', 'Izin' => 'Izin'), '', ['class' => 'form-control']) }}
                              </div>
                            </div>
                            <div class="col-3">
                              <div class="form-group">
                                {{-- @if( ( (Auth::user()->absensi['tanggal']==date('Y-m-d')) && ($absensi['status_absensi'] == 'Pulang') ) == 1)
                                  <b>FUCK YOU</b>
                                @endif --}}
                                  <label for="">Status Absensi</label>
                                  <select id="select" class="form-control" name="status_absensi" style="pointer-events: none;">
                                    <option value="Masuk">Masuk</option>
                                    @foreach ($absensi as $ab)
                                  @if( ( ($ab['tanggal']==date('Y-m-d')) && ($ab['status_absensi'] == 'Masuk') ) == 1)
                                    <option value="Pulang" selected="selected">Pulang</option>
                                  {{-- @elseif (($ab['tanggal']==date('Y-m-d')) &&($ab['status_absensi'] == "Pulang") == 1)
                                    <option value="" disabled>ANDA SUDAH ABSEN HARINI</option> --}}
                                  @else
                                    <option value="Masuk">Masuk</option>
                                  @endif
                                    @endforeach
                                  </select>
                              </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {{ Form::label('keterangan_absensi', 'Keterangan Izin (*jika Izin)') }}
                                    {{ Form::textarea('keterangan_absensi', '', ['class'=>'form-control', 'placeholder'=>'Masukan Keterangan..', 'rows'=>5]) }}
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {{ Form::label('kegitaan', 'Kegiatan Harian (*jika ada)') }}
                                    {{ Form::textarea('kegiatan', '', ['class'=>'form-control', 'placeholder'=>'Masukan Keterangan..', 'rows'=>5]) }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                      @if ((date('l')=="Saturday") || (date('l')=="Sunday"))
                        {{ Form::submit('Submit', ['class' => 'btn btn-primary pull-right', 'disabled']) }}
                      @else
                        {{ Form::submit('Submit', ['class' => 'btn btn-primary pull-right']) }}
                      @endif
                    </div>
                    {{-- <script>
                      var msg = '{{Session::get('alert')}}';
                      var exist = '{{Session::has('alert')}}';
                      if(exist){
                        alert(msg);
                      }
                    </script> --}}
                </div>
            <!-- </form> -->
            {{ Form::close() }}
            <script>
            $("select :selected").each(function(){
                $(this).parent().data("default", this);
            });

            $("select").change(function(e) {
                $($(this).data("default")).prop("selected", true);
            });
            </script>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Riwayat Absensi</h3>

                </div>
             <div class="card-body table-responsive p-0">

               @if (Session::has('message'))
              <div id="alert-msg" class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  {{ Session::get('message') }}
              </div>
              @endif


                <div class="row">

                  <div class="col-md-3">
                  <form class="form">
                    <div class="input-group input-group-sm">
                      {{-- <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                      <div class="input-group-append">
                        <button class="btn btn-info" type="submit">
                          <i class="fas fa-search"></i>
                        </button>
                      </div> --}}
                    </div>
                  </form>
                  </div>

                    <div class="col-md-12">
                      <strong></strong>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Absensi</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($absensi as $a)
                                <tr class="text-center">
                                    <td>{{ $a['tanggal'] }}</td>
                                    <td>{{ $a['jam'] }}</td>
                                    <td>{{ $a['status_absensi'] }}</td>
                                    <td>{{ $a['status'] }}</td>
                                    {{-- <td>{{ $a->user['id_user'] }}</td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <script type="text/javascript">
    <!--
    function showTime() {
        var a_p = "";
        var today = new Date();
        var curr_hour = today.getHours();
        var curr_minute = today.getMinutes();
        var curr_second = today.getSeconds();
        if (curr_hour < 12) {
            a_p = "AM";
        } else {
            a_p = "PM";
        }
        if (curr_hour == 0) {
            curr_hour = 12;
        }
        if (curr_hour > 12) {
            curr_hour = curr_hour - 12;
        }
        curr_hour = checkTime(curr_hour);
        curr_minute = checkTime(curr_minute);
        curr_second = checkTime(curr_second);
    document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
        }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(showTime, 500);
    //-->
    </script>


@endsection
