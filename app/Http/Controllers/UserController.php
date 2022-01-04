<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

// include model T_users
use App\T_users;
use Redirect;
use Session;

class UserController extends Controller
{
    //index user
    public function index()
    {
      // $user = T_users::All();
      $user = T_users::with('role')->paginate(5);

      return view('/admin/user/index', ['user' => $user]);
    }

    // hapus sementara
    // public function hapus($id_user)
    // {
    //   $user = T_users::find($id_user);
    //   $user->delete();
    //
    //   return redirect('/user');
    // }

    public function destroy($id)
    {
        //
        $kegiatan=T_users::find($id);
        $kegiatan->delete();

        Session::flash('message', 'Kegiatan DiHapus');
        return Redirect::to('admin/user/index');
    }

    // tong sampah user/menampilkan data user yang dihapus sementara
    public function trash()
    {
      $user = T_users::onlyTrashed()->get();

      return view('/admin/user/trash', ['user' => $user]);
    }

    // method untuk restore salah satu data yang hapus sementara
    public function kembalikan($id_user)
    {
      $user = T_users::onlyTrashed()->where('id_user', $id_user);
      $user->restore();

      return redirect('/admin/user/trash');
    }

    // method untuk restore semua data yang hapus sementara
    public function kembalikan_semua()
    {
      $user = T_users::onlyTrashed();
      $user->restore();

      return redirect('admin/user/trash');
    }

    // hapus permanen salah satu data yang diHapus sementara
    public function hapus_permanen($id_user)
    {
      $user = T_users::onlyTrashed()->where('id_user', $id_user);
      $user->forceDelete();

      return redirect('/admin/user/trash');
    }

    // hapus permanen salah satu data yang diHapus sementara
    public function hapus_permanen_semua()
    {
      $user = T_users::onlyTrashed();
      $user->forceDelete();

      return redirect('/admin/user/trash');
    }
}
