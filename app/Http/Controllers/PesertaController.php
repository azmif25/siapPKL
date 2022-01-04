<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Redirect;
use Session;
use Response;
use App\User;
use App\T_peserta;
use App\T_dinas;
Use View;
Use Auth;

class PesertaController extends Controller
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
        if (Auth::user()->role->rolename == 'PembimbingLapangan') {
          // code...
          $user = User::where('roles_id', '1')->paginate(5);
          $peserta = T_peserta::where('id_bagian', Auth::user()->pegawai->id_bagian)->paginate(5);

          $data = ['peserta' => $peserta];

          return view('/admin/peserta/index', compact('user'))->with($data);
        }else {
          // code...
          $user = User::where('roles_id', '1')->paginate(5);
          $peserta = T_peserta::paginate(5);

          $data = ['peserta' => $peserta];

          return view('/admin/peserta/index', compact('user'))->with($data);
        }

    }

    public function search(Request $request)
  	{
  		// menangkap data pencarian
  		$cari = $request->cari;

      		// mengambil data dari table pegawai sesuai pencarian data
  		$user = User::where('roles_id', '1')->paginate(5);
      $peserta = T_peserta::where('nama_peserta','like',"%".$cari."%")
  		->paginate(5);
      $data = ['peserta' => $peserta];

      		// mengirim data pegawai ke view index
  		return view('/admin/peserta/index', compact('user'))->with($data);

  	}

    public function downloadSertifikat($id)
    {
      $peserta = T_peserta::where('id_user', $id)->first();
      // return Storage::disk('local')->download('storage/hasilFile/'.$hasil->nama_file);
      $file="storage/Sertifikat/$peserta->sertifikat";
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
        $bagian = T_dinas::all();
        return view('admin/peserta/create', compact('bagian'));
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
            'noin' => 'required',
            'tempatl' => 'required',
            'tanggall' => 'required',
            'jk' => 'required',
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'nama' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required',
            'asal' => 'required',
            'alamatasal' => 'required',
            'telpot' => 'required',
            'telp' => 'required',
            'tglmasuk' => 'required',
            'tglkeluar' => 'required',
            'filename' => 'required',
            'filename.*' => 'mimes:jpg,jpeg,png|max:5000'
        ];

        $pesan = [
          'nik.required' => 'NIK tidak boleh kosong!',
          'noin.required' => 'Nomor Induk tidak boleh kosong!',
          'tempatl.required' => 'Tempat Lahir tidak boleh kosong!',
          'tanggall.required' => 'Tanggal Lahir tidak boleh kosong!',
          'jk.required' => 'Jenis Kelamin tidak boleh kosong!',
          'username.required' => 'Username tidak boleh kosong!',
          'password.required' => 'Password tidak boleh kosong!',
          'email.required' => 'E-Mail tidak boleh kosong!',
          'nama.required' => 'Nama tidak boleh kosong!',
          'alamat.required' => 'Alamat tidak boleh kosong!',
          'jurusan.required' => 'Jurusan tidak boleh kosong!',
          'asal.required' => 'Nama Sekolah / Kampus tidak boleh kosong!',
          'alamatasal.required' => 'Alamat Sekolah / Kampus tidak boleh kosong!',
          'telp.required' => 'No. Telepon tidak boleh kosong!',
          'telpot.required' => 'No. telepon Orang Tua tidak boleh kosong!',
          'tglmasuk.required' => 'Tanggal Masuk tidak boleh kosong!',
          'tglkeluar.required' => 'Tanggal Keluar tidak boleh kosong!',
          'filename.required' => 'foto tidak boleh kosong'

        ];

        //
          $validator=Validator::make(Input::all(),$rules,$pesan);

        //jika data ada yang kosong
        if ($validator->fails()) {

            //refresh halaman
            return Redirect::to('admin/peserta/create')
            ->withErrors($validator);

        }elseif($request->hasfile('filename')){
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
            $peserta->status_penerimaan = ('Diterima');
            $peserta->id_bagian = Input::get('bagian');
            $peserta->tanggal_lahir = Input::get('tanggall');
            $peserta->tempat_lahir = Input::get('tempatl');
            $peserta->status = Input::get('status');
            $peserta->tanggal_masuk = Input::get('tglmasuk');
            $peserta->tanggal_keluar = Input::get('tglkeluar');

            $peserta->save();

            Session::flash('message', 'Berhasil Melakukan Pendaftaran');
            return Redirect::to('admin/peserta');
        }else{
            echo'Gagal';
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
        $user = User::find($id);
        $data = ['user' => $user];

        return view('admin/peserta/show')->with($data);
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
        $bagian = T_dinas::all();

        $data = ['user' => $user];

        return view('admin/peserta/edit', compact('bagian'))->with($data);
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
          'noin' => 'required',
          'tempatl' => 'required',
          'tanggall' => 'required',
          'jk' => 'required',
          'username' => 'required',
          // 'password' => 'required',
          'email' => 'required|email',
          'nama' => 'required',
          'alamat' => 'required',
          'jurusan' => 'required',
          'asal' => 'required',
          'alamatasal' => 'required',
          'telpot' => 'required',
          'telp' => 'required',
          'tglmasuk' => 'required',
          'tglkeluar' => 'required'
      ];

      $pesan = [
        'nik.required' => 'NIK tidak boleh kosong!',
        'nip.required' => 'Nomor Induk tidak boleh kosong!',
        'tempatl.required' => 'Tempat Lahir tidak boleh kosong!',
        'tanggall.required' => 'Tanggal Lahir tidak boleh kosong!',
        'jk.required' => 'Jenis Kelamin tidak boleh kosong!',
        'username.required' => 'Username tidak boleh kosong!',
        // 'password.required' => 'Password tidak boleh kosong!',
        'email.required' => 'E-Mail tidak boleh kosong!',
        'nama.required' => 'Nama tidak boleh kosong!',
        'alamat.required' => 'Alamat tidak boleh kosong!',
        'jurusan.required' => 'Jurusan tidak boleh kosong!',
        'asal.required' => 'Nama Sekolah / Kampus tidak boleh kosong!',
        'alamat_asal.required' => 'Alamat Sekolah / Kampus tidak boleh kosong!',
        'telp.required' => 'No. Telepon tidak boleh kosong!',
        'telpot.required' => 'No. telepon Orang Tua tidak boleh kosong!',
        'tglmasuk.required' => 'Tanggal Masuk tidak boleh kosong!',
        'tglkeluar.required' => 'tanggal_keluar tidak boleh kosong!'
        ];

        $validator = Validator::make(Input::all(), $rules, $pesan);

        // jika ada data yang kosong
        if ($validator->fails()) {

          // refresh halaman
          return Redirect::to('admin/peserta/edit')->withError($validator);

        }else {

          $user = User::find($id);
          $user->username =Input::get('username');
          $user->email =Input::get('email');
          // $user->password =bcrypt(Input::get('password'));
          $user->save();

          $peserta = T_peserta::where('id_user', $id)->first();
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
          $peserta->tanggal_lahir = Input::get('tanggall');
          $peserta->tempat_lahir = Input::get('tempatl');
          $peserta->status = Input::get('status');
          $peserta->tanggal_masuk = Input::get('tglmasuk');
          $peserta->tanggal_keluar = Input::get('tglkeluar');
          $peserta->id_bagian = Input::get('bagian');

          $peserta->save();

          Session::flash('message', 'User Magang Telah DiUbah');

          return Redirect::to('admin/peserta');
        }
    }


    public function sertifikat(Request $request, $id){
      $request->validate([
              'sertifikat' => 'required',
              'sertifikat.*' => 'mimes:jpg,jpeg,png|max:5000'
          ]);
          if ($request->hasfile('sertifikat')) {
              $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('sertifikat')->getClientOriginalName());
              $request->file('sertifikat')->move(public_path('/storage/Sertifikat'), $filename);
              $user = T_peserta::where('id_user', $id)->first();
              $user->sertifikat = $filename;
              $user->save();

              echo'Success';
          }else{
              echo'Gagal';
          }

  		return redirect()->back();
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
        T_peserta::where('id_user',$id)->delete();
        $user = User::find($id);


        $user->delete();

        Session::flash('message', 'User Magang Telah DiHapus');
        return Redirect::to('admin/peserta');
    }
}
