@extends('admin/admin')
@section('content')

	<div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><b> Data Peserta Magang @if (Auth::user()->role->rolename == 'PembimbingLapangan')
										Peserta di {{ Auth::user()->pegawai->dinas['nama_bagian'] }}
									@endif </b></h3>
                  <div class="card-tools">
										<div class="">@if(Auth::user()->role->rolename == 'SuperAdmin')
                   <a href="{{ URL::to('/admin/peserta/create')}}" class="btn btn-primary btn-sm">
                       <i class="fa fa-plus"></i>
                       &nbsp; Tambah Peserta
                   </a>@endif
										</div>
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

				<form class="form" action="/peserta/search" method="GET">
					<div class="input-group input-group-sm">
						<input class="form-control" type="text" name="cari" placeholder="Cari berdasarkan Nama" value="{{ old('cari') }}">
						<div class="input-group-append">
							<button class="btn btn-info" type="submit">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</form>
				</div>
				<br>
					<div class="col-md-12">
							<table class="table table-bordered table-striped table-hover">
									<thead>
											<tr class="text-center">
												@php
													$nomor = 1;
												@endphp
													<th>No.</th>
													<th>Nama Lengkap</th>
						              <th>No. Telepon</th>
													<th>Tanggal Masuk</th>
													<th>Tanggal Keluar</th>
													@if(Auth::user()->role->rolename != 'PembimbingLapangan')
													<th>Bagian</th>
													@endif
													<th>Status</th>
													@if(Auth::user()->role->rolename == 'SuperAdmin')
													<th>Surat Pengantar</th>
													<th>Sertifikat</th>
													@endif
												<th>Action</th>
											</tr>
									</thead>
									<tbody>
										@foreach($peserta as $us)
										<tr class="text-center">
											<td>{{ $nomor++ }}</td>
											<td>{{ $us['nama_peserta'] }}</td>
											<td>{{ $us['no_hp'] }}</td>
											<td>{{ $us['tanggal_masuk'] }}</td>
											<td>{{ $us['tanggal_keluar'] }}</td>
											@if((Auth::user()->role->rolename != 'PembimbingLapangan')&&( $us->dinas['nama_bagian'] == null))
											<td>-</td>
										@elseif(Auth::user()->role->rolename != 'PembimbingLapangan')
											<td>{{ $us->dinas['nama_bagian'] }}</td>
											@endif
												<td>{{ $us['status'] }}</td>
											@if(Auth::user()->role->rolename == 'SuperAdmin')
											<td>
												<a href="#id{{ $us->user['id_user'] }}" data-toggle="modal" class="btn btn-primary"><i class="fas fa-eye"></i></a>
												<!-- Modal -->
											  <div class="modal fade" id="id{{ $us->user['id_user'] }}" role="dialog">


											    <div class="modal-dialog modal-lg">

											      <!-- Modal content-->
											      <div class="modal-content">
											        <div class="modal-header">
																<h4 class="modal-title" id="myModalLabel">&nbsp Surat Pengantar Praktik Kerja Lapangan &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h4>
											          <button type="button" class="close" data-dismiss="modal">&times;</button>
											          {{-- <h4 class="modal-title">SURAT</h4> --}}
											        </div>
											        <div class="modal-body">
											          <img src="{{ url('/storage/suratPengantar/'.$us['surat_permohonan']) }}" width='50%' height='50%'>
											        </div>
											        <div class="modal-footer">
																<a class="btn btn-success" href="{{ URL::to('/admin/foto/download/'.$us['id_user']) }}"><i class="fa fa-download"></i> Download</a>
											          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											        </div>
											      </div>

											    </div>
											  </div>

											</div>
										</td>
										<td>
										<!--Modal: Login with Avatar Form-->
										<div class="modal fade" id="modalLoginAvatar{{ $us->user['id_user'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
										aria-hidden="true">
										<div class="modal-dialog cascading-modal modal-avatar modal-lg" role="document">
											<!--Content-->
											<div class="modal-content">

												<!--Header-->
												<div class="modal-header">
													{{-- <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%281%29.jpg" alt="avatar" class="rounded-circle img-responsive"> --}}
													<h4 class="modal-title" id="myModalLabel">&nbsp Sertifikat &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<!--Body-->
												<div class="modal-body text-center mb-1">
													@if ($us['sertifikat'] == null)
														<h3>* Belum Ada Sertifikat</h3>
													@else
														<img src="{{ url('/storage/Sertifikat/'.$us['sertifikat']) }}" class="img-fluid" >
													@endif
													<hr>
													<div class="md-form ml-0 mr-0">
														<form method="POST" action="/peserta/sertifikat/{{ $us['id_user'] }}" enctype="multipart/form-data">
		                        {{ csrf_field() }}
		                        {{ method_field('PUT') }}

															<input type="file" name="sertifikat" type="text" id="form29" class="form-control validate ml-0">
														<div class="btn-group">
															<button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-primary btn-sm mt-1">Upload Sertifikat<i class="fas fa-sign-in ml-1"></i></button>
															<a class="btn btn-success btn-sm mt-1" href="{{ URL::to('/admin/sertifikat/download/'.$us['id_user']) }}"><i class="fa fa-download"></i> Download</a>
														</div>
														</form>

													</div>
												</div>

											</div>
											<!--/.Content-->
										</div>
										</div>
										<!--Modal: Login with Avatar Form-->

										<div class="text-center">
										<a href="" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#modalLoginAvatar{{ $us->user['id_user'] }}"><i class="fas fa-eye"></i></a>
										</div>
										</td>
										@endif
				              <td class="text-center">
															<form method="POST" action="{{ URL::to('/admin/peserta/'.$us['id_user']) }}">
																	{{ csrf_field() }}
																	<input type="hidden" name="_method" value="DELETE" />
																	<div class="btn-group">
																		@if (Auth::user()->role->rolename == 'SuperAdmin')
																			<a class="btn btn-success" href="{{ URL::to('/admin/peserta/'.$us['id_user'].'/edit') }}"><i class="fa fa-edit"></i></a>

																			<button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>

																		@endif
																			<a class="btn btn-info" href="{{ URL::to('/admin/peserta/'.$us['id_user']) }}"><i class="fa fa-eye"></i></a>
																	</div>
															</form>
				              </td>
										</tr>
										@endforeach
									</tbody>
				</table>
      Halaman : {{ $peserta->currentPage() }} <br>
      Jumlah Data : {{ $peserta->total() }} <br>
      Data Per-Halaman : {{ $peserta->perPage() }} <br>

			</div><div class="d-flex justify-content-center">
          {{ $user->links() }}
      </div>
		</div>
	</div>
</div>
</div>

@endsection
