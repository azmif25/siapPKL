<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Redirect;
use Session;
use App\T_hasil;
use App\User;
use File;
Use View;
use Auth;

class UploadController extends Controller
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
        //
        $hasil = T_hasil::where('id_user', Auth::user()->id_user)->get();
        $user = User::where('id_user', Auth::user()->id_user)->first();

        $data = ['hasil' => $hasil];

        return view('/admin/upload/index', compact('user'))->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/admin/hasil/create');
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

            'nama_file' => 'required'
        ];

        $pesan = [

          'nama_file.required' => 'File tidak boleh kosong!'
        ];

          $validator=Validator::make(Input::all(),$rules,$pesan);

          //jika data ada yang kosong
          if ($validator->fails()) {

              //refresh halaman
              return Redirect::to('admin/upload')
              ->withErrors($validator);

        }else {

          // menyimpan data file yang diupload ke variabel $file
      		$file = $request->file('nama_file');

      		$nama_file = $file->getClientOriginalName();

            	        // isi dengan nama folder tempat kemana file diupload
      		$tujuan_upload = 'storage/hasilFile';
      		$file->move($tujuan_upload,$nama_file);

          $user = new T_hasil;
          $user->nama_file = $nama_file;
          $user->id_user = Input::get('id_user');
          $user->tanggal = Carbon::now();
          $user->save();

          Session::flash('message', 'Data User Tersimpan');

          return Redirect::to('admin/upload');
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

        // hapus file
      	$hasil = T_hasil::where('id_upload',$id)->first();
      	File::delete('hasilFile/'.$hasil->nama_file);

      	// hapus data
      	T_hasil::where('id_upload',$id)->delete();

        Session::flash('message', 'File Telah DiHapus');
        return Redirect::to('admin/upload');
    }
}
