@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><b>Laporan Riwayat Absensi @if (Auth::user()->role->rolename == 'PembimbingLapangan')
                      Peserta di {{ Auth::user()->pegawai->dinas['nama_bagian'] }}
                    @endif</b></h3>

                </div>
             <div class="card-body">

                @if (Session::has('message'))
                <div id="alert-msg" class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ Session::get('message') }}
                </div>
                @endif

                <div class="row">

                  <div class="col-md-6">
                    <form class="form" action="/laporan/search" method="GET">
            					<div class="input-group input-group-sm">
            						<input class="form-control" type="text" name="cari" placeholder="Cari berdasarkan Nama Peserta" value="{{ old('cari') }}">
            						<div class="input-group-append">
            							<button class="btn btn-info" type="submit">
            								<i class="fas fa-search"></i>
            							</button>
            						</div>
            					</div>
            				</form>
                  </div>

                    <div class="col-md-12">
                      <strong></strong>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    @php
                                      $nomor = 1;
                                    @endphp
                                    <th>No.</th>
                                    <th>Nama Peserta</th>
          													@if(Auth::user()->role->rolename != 'PembimbingLapangan')
          													<th>Bagian</th>
          													@endif
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($peserta as $a)
                                  {{-- @if ($a == null) --}}
                                <tr class="text-center">
                                    <td>{{ $nomor++ }}</td>
                                    <td>{{ $a['nama_peserta'] }}</td>
              											@if((Auth::user()->role->rolename != 'PembimbingLapangan')&&( $a->dinas['nama_bagian'] == null))
              											<td>-</td>
              										@elseif(Auth::user()->role->rolename != 'PembimbingLapangan')
              											<td>{{ $a->dinas['nama_bagian'] }}</td>
              											@endif
                                    {{-- <td class="text-center">
                                        <a href="/user/edit/{{ $us->id_user }}" class="btn btn-warning">Edit</a>
                                        <a href="/user/hapus/{{ $us->id_user }}" class="btn btn-danger">Hapus</a>


                                                <form method="POST" action="{{ URL::to('/admin/laporan/'.$a['id_absensi']) }}">
                                                  {{ csrf_field() }}
                      													<input type="hidden" name="_method" value="DELETE" />
                      													<div class="btn-group">
                      														<a class="btn btn-info" href="{{ URL::to('/admin/laporan/'.$a['id_user']) }}"><i class="fa fa-eye"></i></a>
                      													 <a class="btn btn-success" href="{{ URL::to('/admin/laporan/'.$a['id_absensi'].'/edit') }}"><i class="fa fa-edit"></i></a>
                      															<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                      													</div>
                      											</form>
                                    </td> --}}
                                    <form class="form" action="/admin/laporan/detail" method="GET">

                											<div class="input-group">
                												<td class="text-center" width="15%">
                												<input class="form-control" type="hidden" name="ids" value="{{ $a['id_user'] }}">
                												{{-- <div class="input-group-append"> --}}
                													<button class="btn btn-info rounded" type="submit">
                														Detail <i class="fas fa-server"></i>
                													</button>
                												</td>
                												{{-- </div> --}}
                											</div>
                										</form>

                                </tr>
                                {{-- @endif --}}
                                @endforeach
                            </tbody>
                        </table>
                        Halaman : {{ $peserta->currentPage() }} <br>
                        Jumlah Data : {{ $peserta->total() }} <br>
                        Data Per-Halaman : {{ $peserta->perPage() }} <br>

                        </div><div class="d-flex justify-content-center">
                            {{ $peserta->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



      <script type="text/javascript">
        function showTime() {
          var date = new Date(),
              utc = new Date(Date.UTC(
                date.getFullYear(),
                date.getMonth(),
                date.getDate(),
                date.getHours(),
                date.getMinutes(),
                date.getSeconds()
              ));
          document.getElementById('time').innerHTML = utc.toLocaleTimeString();
        }
        setInterval(showTime, 1000);
      </script>
@endsection
