@extends('admin/admin')
@section('content')
    <div class="row">
     <div class="col-12">
                 <div class="card bg-light">
                   <div class="card-header text-muted border-bottom-0">
                     <strong>Detail Peserta Magang</strong>
                   </div>
                   <div class="card-body">
                     <div class="row">
                       <div class="col-7">
                         <h2 class="lead"><b>{{ $user['name'] }}</b></h2>

                         <p class="text-muted text-sm"><b>Jenis Kelamin : </b> {{ $user->pesertadata['jk'] }} </p>
                         <p class="text-muted text-sm"><b>Tanggal Lahir : </b> {{ $user->pesertadata['tanggal_lahir'] }} </p>
                         <p class="text-muted text-sm"><b>Username : </b> {{ $user['username'] }} </p>
                         <p class="text-muted text-sm"><b>Password : </b> {{ $user['password'] }} </p>
                         <p class="text-muted text-sm"><b>E-mail : </b> {{ $user['email'] }} </p>
                         <ul class="ml-4 mb-0 fa-ul text-muted">
                           <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat Peserta: {{ $user->pesertadata['alamat_peserta'] }}</li><br>
                           <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> No.Telepon / WA Peserta: {{ $user->pesertadata['no_hp'] }}</li>
                         </ul>
                       </div>
                       <div class="col-5">
                           <p class="text-muted text-sm"><b>Status Magang : </b> {{ $user->pesertadata['status'] }} </p>
                           <p class="text-muted text-sm"><b>Tanggal Masuk : </b> {{ $user->pesertadata['tanggal_masuk'] }} </p>
                           <p class="text-muted text-sm"><b>Tanggal Keluar : </b> {{ $user->pesertadata['tanggal_keluar'] }} </p>
                           <p class="text-muted text-sm"><b>Nomor Induk : </b> {{ $user->pesertadata['nomor_induk'] }} </p>
                           <p class="text-muted text-sm"><b>Jurusan : </b> {{ $user->pesertadata['jurusan'] }} </p>
                           <p class="text-muted text-sm"><b>Kampus : </b> {{ $user->pesertadata['asal_peserta'] }} </p>
                           <p class="text-muted text-sm"><b>Alamat Kampus : </b> {{ $user->pesertadata['alamat_asal'] }} </p>
                           <ul class="ml-4 mb-0 fa-ul text-muted">
                             <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> No.Telepon / WA OrangTua: {{ $user->pesertadata['telp_ortu'] }}</li>
                           </ul>
                       </div>
                     </div>
                   </div>
                   <div class="card-footer">
                     <div class="text-right">
                       <a href="/admin/peserta" class="btn btn-sm bg-teal">
                         <i class="fas fa-long-arrow-alt-left"></i> Back
                       </a>
                     </div>
                   </div>
                 </div>
               </div>
             </div>

@endsection
