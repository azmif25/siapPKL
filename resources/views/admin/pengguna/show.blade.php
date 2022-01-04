@extends('admin/admin')
@section('content')
    <div class="row">
     <div class="col-12">
                 <div class="card bg-light">
                   <div class="card-header text-muted border-bottom-0">
                     <strong>Detail Admin</strong>
                   </div>
                   <div class="card-body">
                     <div class="row">
                       <div class="col-7">
                         <h2 class="lead"><b>{{ $user['name'] }}</b></h2>
                         <p class="text-muted text-sm"><b>Username : </b> {{ $user['username'] }} </p>
                         <p class="text-muted text-sm"><b>Password : </b> {{ $user['password'] }} </p>
                       </div>
                       <div class="col-5">
                           <p class="text-muted text-sm"><b>E-mail : </b> {{ $user['email'] }} </p>
                           {{-- <p class="text-muted text-sm"><b>RoleName : </b> {{ $user->role['rolename'] }} </p> --}}
                           <ul class="ml-4 mb-0 fa-ul text-muted">
                             <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat: {{ $user->pegawai['alamat_pegawai'] }}</li>
                             <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> No.Telepon / WA: {{ $user->pegawai['no_hp_pegawai'] }}</li>
                           </ul>
                       </div>
                     </div>
                   </div>
                   <div class="card-footer">
                     <div class="text-right">
                       <a href="/admin/pengguna" class="btn btn-sm bg-teal">
                         <i class="fas fa-long-arrow-alt-left"></i> Back
                       </a>
                     </div>
                   </div>
                 </div>
               </div>
             </div>

@endsection
