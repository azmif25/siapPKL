<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SiapPKLEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // protected $user;

    public function __construct()
    {
        //
        // $this->nama = $dd;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
     {
       // $nama = $user['nama_peserta'];
        return $this->from('project21tugasakhir@gmail.com')
                    ->view('emaiku')
                    ->with(
                     [
                           // code...
                         // 'nama' => $nama,
                         'website' => 'Dinas Komunikasi Informatika dan Statistik Kota Banjarmasin',
                     ]);
     }
}
