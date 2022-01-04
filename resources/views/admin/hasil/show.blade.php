@extends('admin/admin')
@section('content')


             <div class="card">
             <div class="card-header">
               {{-- <h3 class="card-title"><b>File oleh : {{ $user->pesertadata['nama_peserta'] }}</b></h3> --}}
             <div class="text-right">
                <a href="/admin/hasil" class="btn btn-sm btn-info">Kembali</a>
             </div>

             </div>
             <!-- /.card-header -->
             <div class="card-body p-0">
               <table class="table table-sm">
                 <thead>
                   <tr class="text-center">
                     <th>Nama File</th>
                     <th>Tanggal</th>
                     <th>Action</th>
                     <th></th>
                   </tr>
                 </thead>
                 <tbody>
                   @foreach ($hasil as $p)
                   <tr class="text-center">
                       <td>{{ $p['nama_file'] }}</td>
                       <td>{{ $p['tanggal'] }}</td>
                       <td>
                               <form method="POST" action="{{ URL::to('/admin/hasil/'.$p['id_upload']) }}">
                                   {{ csrf_field() }}
                                   <input type="hidden" name="_method" value="DELETE" />
                                   <div class="btn-group">
                                    <a class="btn btn-success" href="{{ URL::to('/admin/hasil/download/'.$p['id_upload']) }}"><i class="fa fa-download"></i></a>
                                    @if (Auth::user()->role->rolename == "SuperAdmin")

                                       <button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>

                                     @endif
                                   </div>
                               </form>
                       </td>
                   </tr>
                 @endforeach
                 </tbody>
               </table>

             </div>
             <!-- /.card-body -->
           </div>
           <!-- /.card -->

@endsection
