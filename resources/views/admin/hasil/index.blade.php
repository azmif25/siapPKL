@extends('admin/admin')
@section('content')

	<div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><b>Daftar Hasil Magang @if (Auth::user()->role->rolename == 'PembimbingLapangan')
										Peserta di {{ Auth::user()->pegawai->dinas['nama_bagian'] }}
									@endif</b></h3>
                  <div class="card-tools">
					        </div>
                </div>

                <!-- /.card-header -->
	         <div class="card-body table-responsive p-0" style="height: 450px;">

						 @if (Session::has('message'))
						 <div id="alert-msg" class="alert alert-success alert-dismissible">
								 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								 {{ Session::get('message') }}
						 </div>
						 @endif

			<div class="col-md-6">

				<form class="form" action="/hasil/search" method="GET">
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
						{{-- <strong>{{ Auth::user()->name }}<br></strong> --}}<br>
							<table class="table table-bordered table-striped table-hover">
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
						@foreach($peserta as $p)
						<tr class="text-center">
							<td>{{ $nomor++ }}</td>
							<td>{{ $p['nama_peserta'] }}</td>
							@if((Auth::user()->role->rolename != 'PembimbingLapangan')&&( $p->dinas['nama_bagian'] == null))
							<td>-</td>
						@elseif(Auth::user()->role->rolename != 'PembimbingLapangan')
							<td>{{ $p->dinas['nama_bagian'] }}</td>
							@endif


										{{-- <a class="btn btn-info" href="{{ URL::to('/admin/hasil/'.$p['id_user']) }}"><i class="fa fa-eye"></i></a> --}}
										{{-- <a class="btn btn-success" href="{{ URL::to('/admin/hasil/detail/'.$p->id_user) }}"><i class="fa fa-plus"></i></a> --}}
										<form class="form" action="/admin/hasil/detail" method="GET">

											<div class="input-group">
												<td class="text-center" width="15%">
												<input class="form-control" type="hidden" name="ids" value="{{ $p['id_user'] }}">
												{{-- <div class="input-group-append"> --}}
													<button class="btn btn-info rounded" type="submit">
														Detail <i class="fas fa-server"></i>
													</button>
												</td>
												{{-- </div> --}}
											</div>
										</form>
						</tr>
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

@endsection
