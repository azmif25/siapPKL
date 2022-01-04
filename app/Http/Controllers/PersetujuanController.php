<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use Redirect;
use Session;
use App\User;
use App\T_dinas;
use App\T_peserta;

use App\Mail\SiapPKLEmail;
use App\Mail\SiapPKLEmailNews;
use Illuminate\Support\Facades\Mail;


class PersetujuanController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('rule:SuperAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $peserta = T_peserta::where('status_penerimaan', 'Menunggu')->where('status', 'tidak aktif')->paginate(5);
        $bagian = T_dinas::all();

        $data = ['peserta' => $peserta];

        return view('/admin/persetujuan/index', compact('bagian'))->with($data);
    }


    public function download($id)
    {
        $peserta = T_peserta::where('id_user', $id)->first();
        // return Storage::disk('local')->download('storage/hasilFile/'.$hasil->nama_file);
        $file="storage/suratPengantar/$peserta->surat_permohonan";
        return Response::download($file);


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


        $user = T_peserta::where('id_user', $id)->first();
        // $data = ['user' => $user];
        $user->id_bagian = Input::get('id_bagian');
        $user->status_penerimaan = ('Diterima');
        $user->status = ('aktif');
        // $dd = "Tasya Vania";
        Mail::to(Input::get('email'))->send(new SiapPKLEmail());

        Session::flash('message', 'Data Berhasil Disimpan');

        $user->save();

        return Redirect::to('admin/persetujuan');
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
        Mail::to(Input::get('email'))->send(new SiapPKLEmailNews());
        $user = T_peserta::where('id_user', $id)->first();
        $user->status_penerimaan = ('Ditolak');
        $user->save();

        Session::flash('message', 'Calon Peserta PKL Telah Ditolak');
        return Redirect::to('admin/persetujuan');
    }
}
