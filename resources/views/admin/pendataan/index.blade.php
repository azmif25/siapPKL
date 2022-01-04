@extends('admin/admin')
@section('content')

	<div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><b>Daftar pendataan Magang</b></h3>
                  <div class="card-tools">
										<div class="">
                   <a href="{{ URL::to('/admin/pendataan/create')}}" class="btn btn-primary btn-sm">
                       <i class="fa fa-plus"></i>
                       &nbsp; Add
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

				<form class="form">
					<div class="input-group input-group-sm">
						<input class="form-control" type="search" placeholder="Search" aria-label="Search">
						<div class="input-group-append">
							<button class="btn btn-info" type="submit">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</form>
				</div>

					<div class="col-md-12">
						<strong><br></strong>
							<table class="table table-bordered table-striped table-hover">
									<thead>
											<tr class="text-center">
						              <th>Nama Lengkap</th>
													<th>Username</th>
													<th>Tanggal Masuk</th>
													<th>Tanggal Keluar</th>
						              <th>No. Telepon</th>
													<th>Dinas</th>
													<th>Action</th>
											</tr>
									</thead>
					<tbody>
						@foreach($pendataan as $p)
						<tr>

							<td>{{ $p->user['name'] }}</td>
							<td>{{ $p->user['username'] }}</td>
							<td>{{ $p['tanggal_masuk'] }}</td>
							<td>{{ $p['tanggal_keluar'] }}</td>
  						<td>{{ $p->user['phone'] }}</td>
              <td>{{ $p->dinas['nama_dinas'] }}</td>
              <td class="text-center">
                  {{-- <a href="/user/edit/{{ $us->id_user }}" class="btn btn-warning">Edit</a>
                  <a href="/user/hapus/{{ $us->id_user }}" class="btn btn-danger">Hapus</a> --}}

											<form method="POST" action="{{ URL::to('/admin/pendataan/'.$p['nomor_induk']) }}">
													{{ csrf_field() }}
													<input type="hidden" name="_method" value="DELETE" />
													<div class="btn-group">
														<a class="btn btn-info" href="{{ URL::to('/admin/pendataan/'.$p['nomor_induk']) }}"><i class="fa fa-eye"></i></a>
													 <a class="btn btn-success" href="{{ URL::to('/admin/pendataan/'.$p['nomor_induk'].'/edit') }}"><i class="fa fa-edit"></i></a>
															<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
													</div>
											</form>
              </td>
						</tr>
						@endforeach
					</tbody>
				</table>
      Halaman : {{ $pendataan->currentPage() }} <br>
      Jumlah Data : {{ $pendataan->total() }} <br>
      Data Per-Halaman : {{ $pendataan->perPage() }} <br>

			</div><div class="d-flex justify-content-center">
          {{ $pendataan->links() }}
      </div>
		</div>
	</div>

@endsection
