@extends('admin/admin')
@section('content')


             <div class="card"><br>
             <div class="card-header">
               <form action="/admin/laporan/{{$user['id_user']}}/search" method="get">
                   <div class="row">
                     <div class="col-3">
                       <h3 class="card-title"><b>Nama Peserta : {{ $user->pesertadata['nama_peserta'] }}</b> <br>
                       <b>Bagian   : {{ $user->pesertadata->dinas['nama_bagian'] }}</b></h3>
                     </div>
                       <div class="col-3">
                            <select name="bulan" class="form-control">
                            <option selected="selected">- Pilih Bulan -</option>
                            @php
                            $bln=array(1=>"Januari","Februari","Maret","April","Mei","Juni","July","Agustus","September","Oktober","November","Desember");
                            for($bulan=1; $bulan<=12; $bulan++){
                            if($bulan<=9) { echo "<option value='$bulan'>$bln[$bulan]</option>"; }
                            else { echo "<option value='$bulan'>$bln[$bulan]</option>"; }
                            }
                            @endphp
                            </select>

                       </div>
                       <div class="col-3">
                           <select name='tahun' class="form-control">
                             <option selected="selected">- Pilih Tahun -</option>
                           @php
                           $now=date('Y');
                           for ($a=2020;$a<=$now;$a++)
                           {
                              echo "<option value='$a'>$a</option>";
                           }
                           @endphp
                           </select>
                       </div>
                       <div class="col-3">
                           <button type="submit" class="btn btn-primary btn-fill btn-block">Tampilkan</button>
                       </div>
                   </div>
               </form>

               <div class="row">
                 <div class="col-xs-12 col-sm-6 ml-auto text-right mb-2">
                     <a onclick="return confirm('Are you sure?');" href="{{ URL::to('/admin/laporan/cetak_pdf/'.$user['id_user']) }}" class="btn btn-primary btn-sm" target="_blank"><i class="fa fa-print"></i> Print Laporan (PDF)</a>
                 </div>
               </div>
             </div>
             <!-- /.card-header -->
             <div class="card-body p-0">
               <table class="table table-sm">
                 <thead>
                   <tr class="text-center">
                     <th>no</th>
                     <th>Tanggal</th>
                     <th>Waktu</th>
                     <th>Absensi</th>
                     <th>Keterangan</th>
                     <th>Alasan</th>
                     <th>Kegiatan Harian</th>
                     @if (Auth::user()->role->rolename == "SuperAdmin")
                     <th>Action</th>
                   @endif
                   </tr>
                 </thead>
                 <tbody>
                   @foreach ($absensi as $a)
                   <tr class="text-center">
                       <td>{{ $nomor}}</td>
                       <td>{{ $a['tanggal'] }}</td>
                       <td>{{ $a['jam'] }}</td>
                       <td>{{ $a['status_absensi'] }}</td>
                       <td>{{ $a['status'] }}</td>
                       <td>@if ( $a['keterangan_absensi'] == null)
                         -
                       @endif</td>
                       <td>@if ( $a['kegiatan'] == null)
                         -
                       @endif</td>
                       @if (Auth::user()->role->rolename == "SuperAdmin")
                         <td>
                                 <form method="POST" action="{{ URL::to('/admin/hasil/'.$a['id_absensi']) }}">
                                     {{ csrf_field() }}
                                     <input type="hidden" name="_method" value="DELETE" />
                                     <div class="btn-group">
                                      <a class="btn btn-success" href="{{ URL::to('/admin/hasil/'.$a['id_absensi'].'/edit') }}"><i class="fa fa-edit"></i></a>

                                         <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                     </div>
                                 </form>
                         </td>
                       @endif

                   </tr>
                   @php
                     $nomor++
                   @endphp
                 @endforeach
                 </tbody>
               </table>

             </div>
             <!-- /.card-body -->
             <div class="card-footer">
               <div class="col-3">
               </div>

             </div>
           </div>
           <!-- /.card -->

@endsection
