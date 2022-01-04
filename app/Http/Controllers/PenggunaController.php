<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Redirect;
use Session;
use App\User;
use App\T_pegawai;
use App\T_dinas;
use App\Role;
Use View;

class PenggunaController extends Controller
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
        $user = User::whereIn('roles_id', [2,3])->paginate(5);
        $pegawai = T_pegawai::paginate(5);

        $data = ['pegawai' => $pegawai];

        return view('/admin/pengguna/index', compact('user'))->with($data);
    }

    public function search(Request $request)
  	{
  		// menangkap data pencarian
  		$cari = $request->cari;

      		// mengambil data dari table pegawai sesuai pencarian data
      $user = User::whereIn('roles_id', [2,3])->paginate(5);
      $pegawai = T_pegawai::where('nama_pegawai','like',"%".$cari."%")
  		->paginate();
      $data = ['pegawai' => $pegawai];

      		// mengirim data pegawai ke view index
  		return view('/admin/pengguna/index', compact('user'))->with($data);

  	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $bagian = T_dinas::all();
        $rolename = Role::whereIn('id', [3,5]);
        return view('admin/pengguna/create', compact('bagian','rolename'));
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
            'nik' => 'required',
            'nip' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'bagian' => 'required|integer',
            'role' => 'required',
            'jk' => 'required'
        ];

        $pesan = [
          'nik.required' => 'NIK tidak boleh kosong!',
          'nip.required' => 'NIP tidak boleh kosong!',
          'username.required' => 'Username tidak boleh kosong!',
          'password.required' => 'Password tidak boleh kosong!',
          'email.required' => 'E-Mail tidak boleh kosong!',
          'nama.required' => 'Nama tidak boleh kosong!',
          'alamat.required' => 'Alamat tidak boleh kosong!',
          'nohp.required' => 'No. Telepon tidak boleh kosong!',
          'bagian.required' => 'Bagian tidak boleh kosong!',
          'role.required' => 'Role tidak boleh kosong!',
          'jk.required' => 'Jenis Kelamin tidak boleh kosong!'
        ];

        //
          $validator=Validator::make(Input::all(),$rules,$pesan);

        //jika data ada yang kosong
        if ($validator->fails()) {

            //refresh halaman
            return Redirect::to('admin/pengguna/create')
            ->withErrors($validator);

        }else {

          $user = new User;
          $user->id_user = Input::get('id_user');
          $user->username= Input::get('username');
          $user->password = bcrypt(Input::get('password'));
          $user->email= Input::get('email');
          $user->roles_id = Input::get('role');
          $user->save();

          $pegawai = new T_pegawai;
          $pegawai->id_user = Input::get('id_user');
          $pegawai->nik = Input::get('nik');
          $pegawai->nip = Input::get('nip');
          $pegawai->nama_pegawai = Input::get('nama');
          $pegawai->id_bagian = Input::get('bagian');
          $pegawai->no_hp_pegawai = Input::get('nohp');
          $pegawai->alamat_pegawai = Input::get('alamat');
          $pegawai->jk = Input::get('jk');
          $pegawai->save();

          Session::flash('message', 'Data User Tersimpan');

          return Redirect::to('admin/pengguna');
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

        $user = User::find($id);
        $data = ['user' => $user];

        return view('admin/pengguna/show')->with($data);
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
        $user = User::find($id);
        // $pegawai = T_pegawai::find($id);
        $rolename = Role::whereIn('id', [3,4]);
        $bagian = T_dinas::all();

        $data = ['user' => $user];
        // $datap = ['pegawai' => $pegawai];

        return view('admin/pengguna/edit', compact('rolename','bagian'))->with($data);
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
        $rules = [
            'nik' => 'required',
            'nip' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'nama' => 'required',
            'alamat' => 'required',
            'nohp' => 'required',
            'bagian' => 'required|integer',
            'role' => 'required',
            'jk' => 'required'
        ];

        $pesan = [
          'nik.required' => 'NIK tidak boleh kosong!',
          'nip.required' => 'NIP tidak boleh kosong!',
          'username.required' => 'Username tidak boleh kosong!',
          'password.required' => 'Password tidak boleh kosong!',
          'email.required' => 'E-Mail tidak boleh kosong!',
          'nama.required' => 'Nama tidak boleh kosong!',
          'alamat.required' => 'Alamat tidak boleh kosong!',
          'nohp.required' => 'No. Telepon tidak boleh kosong!',
          'bagian.required' => 'Bagian tidak boleh kosong!',
          'role.required' => 'Role tidak boleh kosong!',
          'jk.required' => 'Jenis Kelamin tidak boleh kosong!'
        ];

        $validator = Validator::make(Input::all(), $rules, $pesan);

        // jika ada data yang kosong
        if ($validator->fails()) {

          // refresh halaman
          return Redirect::to('admin/pengguna/'.$id.'/edit')->withError($validator);

        }else {

          $user = User::where('id_user',$id)->first();
          $user->username= Input::get('username');
          $user->password = bcrypt(Input::get('password'));
          $user->email= Input::get('email');
          $user->roles_id = Input::get('role');
          $user->save();


          $pegawai = T_pegawai::where('id_user',$id)->first();
          $pegawai->nik = Input::get('nik');
          $pegawai->nip = Input::get('nip');
          $pegawai->nama_pegawai = Input::get('nama');
          $pegawai->id_bagian = Input::get('bagian');
          $pegawai->no_hp_pegawai = Input::get('nohp');
          $pegawai->alamat_pegawai = Input::get('alamat');
          $pegawai->jk = Input::get('jk');
          $pegawai->save();

          Session::flash('message', 'Data User Telah DiUbah');

          return Redirect::to('admin/pengguna');
        }
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
        T_pegawai::where('id_user',$id)->delete();
        $user = User::find($id);
        $user->delete();


        Session::flash('message', 'User Telah DiHapus');
        return Redirect::to('admin/pengguna');
    }
}
