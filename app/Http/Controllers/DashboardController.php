<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\T_dinas;
use App\T_peserta;
use Redirect;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {

      if (Auth::user()->role->rolename == 'EndUser' && Auth::user()->pesertadata->status_penerimaan == 'Ditolak') {
        return Redirect::to('logout')->with('message', 'You have been logged out');

      }else{

      $peserta = T_peserta::where('id_bagian', Auth::user()->pegawai['id_bagian'])->paginate(5);
      $bagian = T_dinas::all();

      $data = ['peserta' => $peserta];

      return view('admin/dashboard', compact('bagian'))->with($data);
    }
    }
}
