@extends('admin/admin')
@section('content')

	<div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"><b>Daftar Calon Peserta</b></h3>
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
						<input class="form-control" type="text" name="cari" placeholder="Cari berdasarkan Nama" value="{{ old('cari') }}">
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
													<th>Nama Peserta</th>
                          <th>Asal</th>
                          <th>Jurusan</th>
                          <th>Tanggal Masuk</th>
                          <th>Tanggal Keluar</th>
													<th>Surat Pengantar</th>
                          <th>Bagian</th>
													<th width="12%">Action</th>
											</tr>
									</thead>
					<tbody>
						@foreach($peserta as $p)
						<tr class="text-center">
							<td>{{ $p['nama_peserta'] }}</td>
              <td>{{ $p['asal_peserta'] }}</td>
              <td>{{ $p['jurusan'] }}</td>
              <td>{{ $p['tanggal_masuk'] }}</td>
              <td>{{ $p['tanggal_keluar'] }}</td>
							<td>

							<a href="#id{{ $p->user['id_user'] }}" data-toggle="modal" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span> Lihat</a>
							<!-- Modal -->
						  <div class="modal fade" id="id{{ $p->user['id_user'] }}" role="dialog">


						    <div class="modal-dialog modal-lg">

						      <!-- Modal content-->
						      <div class="modal-content">
						        <div class="modal-header">
											<h4 class="modal-title" id="myModalLabel">&nbsp Surat Pengantar Praktik Kerja Lapangan &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</h4>
						          <button type="button" class="close" data-dismiss="modal">&times;</button>
						          {{-- <h4 class="modal-title">SURAT</h4> --}}
						        </div>
						        <div class="modal-body">
						          <img src="{{ url('/storage/suratPengantar/'.$p['surat_permohonan']) }}" class="img-fluid">
						        </div>
						        <div class="modal-footer">
											<a class="btn btn-success" href="{{ URL::to('/admin/foto/download/'.$p['id_user']) }}"><i class="fa fa-download"></i> Download</a>
						          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        </div>
						      </div>

						    </div>
						  </div>

						</div>
						</td>
              <td>
                {{ Form::model($p,['route'=>['persetujuan.update',$p['id_user']], 'method'=>'PUT']) }}
								<input type="hidden" name="email" value="{{ $p->user['email'] }}">
								<input type="hidden" name="nama" value="{{ $p['nama_peserta'] }}">
                  <select class="form-control" name="id_bagian" required>
                    <option>- Pilih Bagian -</option>
                    @foreach ($bagian as $b)
                      <option value="{{ $b->id_bagian }}">{{ $b->nama_bagian }}</option>
                    @endforeach
                  </select>
              </td>
              <td>
                <div class="btn-group">
                {{-- {{ Form::submit('Terima', ['class' => 'btn btn-info']) }} --}}
								<button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-success rounded">Terima</button>
                {{ Form::close() }}
											<form method="POST" action="{{ URL::to('/admin/persetujuan/'.$p['id_user']) }}">
													{{ csrf_field() }}
													<input type="hidden" name="email" value="{{ $p->user['email'] }}">
													<input type="hidden" name="_method" value="DELETE" />

															<button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-danger">Tolak</button>
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
          {{ $peserta->links() }}
      </div>
		</div>
	</div>
</div>
</div>

@endsection
