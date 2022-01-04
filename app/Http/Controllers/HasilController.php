<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Redirect;
use Response;
use Session;
use Storage;
use App\User;
use App\T_hasil;
use App\T_peserta;
Use View;
Use Auth;

class HasilController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('ruleA');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $hasil = T_absensi::where('roles_id', '1')->paginate(5);
        if (Auth::user()->role->rolename == 'PembimbingLapangan') {
          // code...
          $user = User::where('roles_id', '1')->paginate(5);
          $peserta = T_peserta::where('id_bagian', Auth::user()->pegawai->id_bagian)->paginate(5);

          $data = ['peserta' => $peserta];

          return view('/admin/hasil/index', compact('user'))->with($data);
        }else {
          // code...
          $user = User::where('roles_id', '1')->paginate(5);
          $peserta = T_peserta::paginate(5);

          $data = ['peserta' => $peserta];

          return view('/admin/hasil/index', compact('user'))->with($data);
        }
        }

    public function search(Request $request)
  	{
  		// menangkap data pencarian
      $cari = $request->cari;

      if (Auth::user()->role->rolename == 'PembimbingLapangan') {
        // code...
        // mengambil data dari table pegawai sesuai pencarian data
    		$user = User::where('roles_id', '1')->paginate(5);
        $peserta = T_peserta::where('nama_peserta','like',"%".$cari."%")->where('id_bagian', Auth::user()->pegawai->id_bagian)
    		->paginate(5);
        $data = ['peserta' => $peserta];

        		// mengirim data pegawai ke view index
    		return view('/admin/hasil/index', compact('user'))->with($data);
      }else {
        // code...
        // mengambil data dari table pegawai sesuai pencarian data
    		$user = User::where('roles_id', '1')->paginate(5);
        $peserta = T_peserta::where('nama_peserta','like',"%".$cari."%")
    		->paginate(5);
        $data = ['peserta' => $peserta];

        		// mengirim data pegawai ke view index
    		return view('/admin/hasil/index', compact('user'))->with($data);
      }

  	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }


    public function download($id)
    {
        $hasil = T_hasil::where('id_upload', $id)->first();
        // return Storage::disk('local')->download('storage/hasilFile/'.$hasil->nama_file);
        $file="storage/hasilFile/$hasil->nama_file";
        return Response::download($file);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    //     $hasil = T_hasil::where('id_user',$id)->first()->all();
    //     $user = user::where('id_user', $id)->first();
    //
    //     $data = ['user' => $hasil];
    //
    //     return view('/admin/hasil/show')->with($data);
    // }

    public function show(Request $request)
    {
      $ids = $request->ids;

      $user = user::where('id_user', $ids)->first();
      $hasil = T_hasil::where('id_user', $ids)->paginate();

      $data = ['hasil' => $hasil];

      return view('/admin/hasil/detail', compact('user'))->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $hasil = T_hasil::find($id);

        $hasil->delete();

        Session::flash('message', 'File Telah DiHapus');
        return Redirect::back();
    }
}
