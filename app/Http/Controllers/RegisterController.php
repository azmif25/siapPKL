<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use File;
use App\User;
use App\T_peserta;

class RegisterController extends Controller
{
    //
    public function __construct()
    {
      $this->middleware('guest');
    }

    public function getResgister()
    {
        return view('Register.formRegister');
    }

    public function postRegister(Request $request)
    {

        $request->validate([
                'filename' => 'required',
                'filename.*' => 'mimes:jpg,jpeg,png|max:5000'
            ]);
            if ($request->hasfile('filename')) {
                $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('filename')->getClientOriginalName());
                $request->file('filename')->move(public_path('/storage/suratPengantar'), $filename);

                $user = new User();
                $user->id_user = Input::get('id_user');
                $user->username =Input::get('username');
                $user->email =Input::get('email');
                $user->password =bcrypt(Input::get('password'));
                $user->roles_id =DB::table('roles')->select('id')->where('rolename','EndUser')->first()->id;
                // dd($user);
                $user->save();

                $peserta = new T_peserta();
                $peserta->surat_permohonan = $filename;
                $peserta->id_user = Input::get('id_user');
                $peserta->nik = Input::get('nik');
                $peserta->nomor_induk = Input::get('noin');
                $peserta->nama_peserta = Input::get('nama');
                $peserta->no_hp = Input::get('telp');
                $peserta->alamat_peserta = Input::get('alamat');
                $peserta->jurusan = Input::get('jurusan');
                $peserta->asal_peserta = Input::get('asal');
                $peserta->alamat_asal = Input::get('alamatasal');
                $peserta->telp_ortu = Input::get('telpot');
                $peserta->jk = Input::get('jk');
                $peserta->status_penerimaan = ('Menunggu');
                $peserta->tanggal_lahir = Input::get('tanggall');
                $peserta->tempat_lahir = Input::get('tempatl');
                $peserta->status = Input::get('status');
                $peserta->tanggal_masuk = Input::get('tglmasuk');
                $peserta->tanggal_keluar = Input::get('tglkeluar');

                $peserta->save();

                Session::flash('message', 'Berhasil Melakukan Pendaftaran');
                return view('Login.formLogin');
            }else{
                echo'Gagal';
            }

    }
}
