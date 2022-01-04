<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\T_absensi;
use App\T_peserta;
use App\User;
use Auth;
use Redirect;
use Session;
use \PDF;

class LaporanAbsensiController extends Controller
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
          $user = User::where('roles_id', '1')->paginate(5);
          $peserta = T_peserta::where('id_bagian', Auth::user()->pegawai->id_bagian)->paginate(5);

          $data = ['peserta' => $peserta];

          return view('admin/laporanAbsensi/index', compact('user'))->with($data);
        }else {
          $user = User::where('roles_id', '1')->paginate(5);
          $peserta = T_peserta::paginate(5);

          $data = ['peserta' => $peserta];

          return view('admin/laporanAbsensi/index', compact('user'))->with($data);
        }
    }

    public function cari(Request $request)
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
    		return view('/admin/laporanAbsensi/index', compact('user'))->with($data);
      }else {
        // code...
        // mengambil data dari table pegawai sesuai pencarian data
    		$user = User::where('roles_id', '1')->paginate(5);
        $peserta = T_peserta::where('nama_peserta','like',"%".$cari."%")
    		->paginate(5);
        $data = ['peserta' => $peserta];

        		// mengirim data pegawai ke view index
    		return view('/admin/laporanAbsensi/index', compact('user'))->with($data);
      }
  	}


    public function search(Request $request, $id)
  	{
      $bulan = $request->bulan;
      $tahun = $request->tahun;

          $nomor = 1;
          // mengambil data dari table pegawai sesuai pencarian data
          $user = User::where('id_user',$id)->first();
          $absensi = T_absensi::where('id_user',$id)
      		->whereMonth('tanggal','like',"%".$bulan."%")->whereYear('tanggal', 'like',"%".$tahun."%")->paginate();
          $b = Input::get('bulan');
          $t = Input::get('tahun');
          // $data = ['absensi' => $absensi];

          // mengirim data pegawai ke view index
          $pdf = PDF::loadview('admin/laporanAbsensi/laporan_pdf', compact('user', 'b', 't'), ['absensi' => $absensi]);
          return $pdf->stream('Laporan Absensi '.Input::get('nama').'('.$b.'-'.$t.').pdf');
        	// return view('admin/laporanAbsensi/detail', compact('user', 'nomor'))->with($data);

  	}

    public function cetak_pdf(Request $request)
    {
      $ids = $request->ids;

      $user = user::where('id_user', $ids)->first();
      $absensi = T_absensi::where('id_user', $ids)->paginate();
      $b = ('0');
      $t = (' ');
      $nama = Input::get('nama');

    	$pdf = PDF::loadview('admin/laporanAbsensi/laporan_pdf', compact('user', 'b', 't'), ['absensi' => $absensi]);
    	return $pdf->stream('Semua Laporan Absensi '.$nama.'.pdf');
      // return $pdf->stream();
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
    public function show(Request $request)
    {
    //     //
    //     $absensi = T_absensi::where('id_user',$id)->first()->all();
    //     $user = User::where('id_user',$id)->first();
    //
    //     $nomor = 1;
    //
    //     $data = ['absensi' => $absensi];
    //     // $data = ['user' => $user];
    //
    //     return view('admin/laporanAbsensi/show', compact('user', 'nomor'))->with($data);
    // }

    // public function detail(Request $request)
    // {
      $ids = $request->ids;

      $user = user::where('id_user', $ids)->first();
      $absensi = T_absensi::where('id_user', $ids)->paginate();

      $data = ['absensi' => $absensi];

      return view('/admin/laporanAbsensi/detail', compact('user'))->with($data);
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
        $absensi = T_absensi::find($id);

        $data = ['absensi' => $absensi];

        return view('admin/laporanAbsensi/edit')->with($data);
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
            // 'tanggal' => 'required',
            // 'jam' => 'required',
            // 'status_absensi' => 'required',
            'status' => 'required'
            // 'keterangan_absensi' => 'required',
            // 'kegiatan' => 'required'
        ];

        $pesan = [
          // 'tanggal.required' => 'Tanggal tidak boleh kosong!',
          // 'jam.required' => 'Jam tidak boleh kosong!',
          // 'status_absensi.required' => 'Status Absensi tidak boleh kosong!',
          'status.required' => 'Status tidak boleh kosong!'
        //   'keterangan_absensi.required' => 'Keterangan tidak boleh kosong',
        //   'kegiatan.required' => 'Kegiatan tidak boleh Kosong'
        ];

        $validator = Validator::make(Input::all(), $rules, $pesan);

        // jika ada data yang kosong
        if ($validator->fails()) {

          // refresh halaman
          return Redirect::to('admin/laporan/'.$id.'/edit')->withError($validator);

        }else {

          $absensi = T_absensi::find($id);

          $absensi->tanggal = Input::get('tanggal');
          $absensi->jam = Input::get('jam');
          $absensi->status_absensi = Input::get('status_absensi');
          $absensi->status = Input::get('status');
          $absensi->keterangan_absensi = Input::get('keterangan_absensi');
          $absensi->kegiatan = Input::get('kegiatan');
          $ids = Input::get('ids');
          $absensi->save();

          Session::flash('message', 'Data Absensi Telah DiUbah');

          return Redirect::to('admin/laporan/detail?ids='.$ids);
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
        $absensi = T_absensi::find($id);

        $absensi->delete();

        Session::flash('message', 'Data Telah DiHapus');
        return Redirect::back();
    }
}
