<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\T_absensi;
use App\User;
use Auth;
use Redirect;
// use Session;
use Illuminate\Support\Facades\Session;

class AbsensiController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('rule:EndUser');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absensi = T_absensi::with('user')->where('id_user', Auth::user()->id_user)->get();

        $data = ['absensi' => $absensi];

        return view('admin/absensi/create')->with($data);
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [


            'status' => 'required'
        ];

        $pesan = [


          'status.required' => 'Password tidak boleh kosong!'

        ];

        $validator = Validator::make(Input::all(), $rules, $pesan);

        // jika ada data yang kosong
        if ($validator->fails()) {

          // refresh halaman
          return Redirect::to('admin/absensi/index')->withError($validator);

        }else {



          $user = new T_absensi;
          // $user->jam = Carbon::now();
          $user->status_absensi =Input::get('status_absensi');
          $user->id_user=Input::get('id_user');
          $user->status=Input::get('status');
          $user->tanggal=Carbon::now();
          $user->keterangan_absensi=Input::get('keterangan_absensi');
          $user->kegiatan=Input::get('kegiatan');
          $user->save();

          Session::flash('message', 'Anda Telah Absen');

          return Redirect::to('admin/absensi');
          // Session::save();
          // Session::flash('success', 'save success');

          // return redirect()->back();
          // return redirect()->route('/admin/absensi');
          // return view('admin/absensi/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }
}
