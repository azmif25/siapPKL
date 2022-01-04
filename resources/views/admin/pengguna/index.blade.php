@extends('admin/admin')
@section('content')

	<div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><b>Data Pengguna</b></h3>
                  <div class="card-tools">
										<div class="">
                   <a href="{{ URL::to('/admin/pengguna/create')}}" class="btn btn-primary btn-sm">
                       <i class="fa fa-plus"></i>
                       &nbsp; Tambah Data
                   </a>
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

				<form class="form" action="/pengguna/search" method="GET">
					<div class="input-group input-group-sm">
						<input class="form-control" type="text" name="cari" placeholder="Cari berdasarkan Nama Lengkap" value="{{ old('cari') }}">
						<div class="input-group-append">
							<button class="btn btn-info" type="submit">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</form>
				</div>

					<div class="col-md-12">
							<table class="table table-bordered table-striped table-hover">
									<thead>
										@php
											$nomor = 1;
										@endphp
											<tr class="text-center">
													<th>No.</th>
						              <th>Nama Lengkap</th>
						              <th>No. Telepon</th>
													<th>Bagian</th>
													<th>Role</th>
													<th>Action</th>
											</tr>
									</thead>
									<tbody>
										@foreach($pegawai as $us)
										<tr>
											<td>{{ $nomor++}}</td>
				  						<td>{{ $us['nama_pegawai'] }}</td>
				  						<td>{{ $us->user['email'] }}</td>
											<td>{{ $us->dinas['nama_bagian'] }}</td>
				  						<td>{{ $us->user->role['rolename'] }}</td>
				              <td class="text-center">
															<form method="POST" action="{{ URL::to('/admin/pengguna/'.$us['id_user']) }}">
																	{{ csrf_field() }}
																	<input type="hidden" name="_method" value="DELETE" />
																	<div class="btn-group">
																		<a class="btn btn-info" href="{{ URL::to('/admin/pengguna/'.$us['id_user']) }}"><i class="fa fa-eye"></i></a>
																	 <a class="btn btn-success" href="{{ URL::to('/admin/pengguna/'.$us['id_user'].'/edit') }}"><i class="fa fa-edit"></i></a>
																			<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></button>
																	</div>
															</form>
				              </td>
										</tr>
										@endforeach
									</tbody>
				</table>
      Halaman : {{ $pegawai->currentPage() }} <br>
      Jumlah Data : {{ $pegawai->total() }} <br>
      Data Per-Halaman : {{ $pegawai->perPage() }} <br>

			</div><div class="d-flex justify-content-center">
          {{ $user->links() }}
      </div>
		</div>
	</div>
</div>
</div>
@endsection
