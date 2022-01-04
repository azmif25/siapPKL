@extends('admin/admin')
@section('content')
	<div class="row">
			<div class="col-6">
				{{ Form::open(['route'=>'upload.store', 'files'=>true]) }}
				{{ Form::token() }}
				{{ Form::hidden('id_user', Auth::user()->id_user) }}
						<div class="card">
								<div class="card-header">
										<h3 class="card-title"><b>Upload File</b></h3>
								</div>
								<div class="card-body">
										<div class="row">
												<div class="col-12">
														<div class="form-group">
																{{ Form::label('nama_file', 'File') }}
																{{ Form::file('nama_file', ['class'=>'form-control']) }}
																@if($errors->has('nama_file'))
																		<div class="text-danger"><i>
																				*{{ $errors->first('nama_file')}}</i>
																				{{-- <h2>SALAhs</h2> --}}
																		</div>
																@endif
														</div>
												</div>
										</div>
								</div>
								<div class="card-footer text-center">
										{{ Form::submit('Upload', ['class' => 'btn btn-primary pull-right']) }}
								</div>
						</div>
				<!-- </form> -->
				{{ Form::close() }}
			</div>
			<div class="col-6">
						<div class="card">
								<div class="card-header">
										<h3 class="card-title"><b>Sertifikat</b></h3>
								</div>
								<div class="card-body">
										<div class="row text-center">
												<div class="col-12">
														@if ($user->pesertadata['sertifikat'] == null)
															<h2>*Belum Ada Sertifikat</h2>
														@else
															<img src="{{ url('/storage/Sertifikat/'.$user->pesertadata['sertifikat']) }}" alt="*sertifikat" class="img-thumbnail" width="25%">
														@endif
												</div>
										</div>
								</div>
								<div class="card-footer text-center">
									<!--Modal: Login with Avatar Form-->
									<div class="modal fade" id="modalLoginAvatar{{ $user['id_user'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
													<img src="{{ url('/storage/Sertifikat/'.$user->pesertadata['sertifikat']) }}" class="img-fluid" >
												<hr>
												<div class="md-form ml-0 mr-0">
													<a class="btn btn-success" href="{{ URL::to('/admin/sertifikat/download/'.$user['id_user']) }}"><i class="fa fa-download"></i> Download</a>
												</div>
											</div>

										</div>
										<!--/.Content-->
									</div>
									</div>
									<!--Modal: Login with Avatar Form-->

									<div class="text-center">
									<a href="" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#modalLoginAvatar{{ $user['id_user'] }}">Lihat</a>
									</div>
								</div>
						</div>
				<!-- </form> -->
				{{ Form::close() }}
			</div>
	</div>


	<div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><b>File</b></h3>

                </div>

                <!-- /.card-header -->
	         <div class="card-body table-responsive p-0" style="height: 450px;">

						 @if (Session::has('message'))
						 <div id="alert-msg" class="alert alert-success alert-dismissible">
								 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								 {{ Session::get('message') }}
						 </div>
						 @endif

					<div class="col-md-12">
						{{-- <strong>{{ Auth::user()->name }}<br></strong> --}}<br>
							<table class="table table-bordered table-striped table-hover">
									<thead>
											<tr class="text-center">
						              <th>Nama File</th>
													<th>Tanggal </th>
													<th>Action</th>
											</tr>
									</thead>
					<tbody>
						@foreach($hasil as $p)
						<tr>
							<td>{{ $p['nama_file'] }}</td>
							<td>{{ $p['tanggal'] }}</td>
              <td class="text-center">
											<form method="POST" action="{{ URL::to('/admin/upload/'.$p['id_upload']) }}">
													{{ csrf_field() }}
													<input type="hidden" name="_method" value="DELETE" />
													<div class="btn-group">
															<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
													</div>
											</form>
              </td>
						</tr>
						@endforeach
					</tbody>
				</table>
		</div>
	</div>
</div>
</div>
</div>

@endsection
