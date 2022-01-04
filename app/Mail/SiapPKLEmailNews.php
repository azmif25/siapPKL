<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SiapPKLEmailNews extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      return $this->from('project21tugasakhir@gmail.com')
                  ->view('emailtolak')
                  ->with(
                   [
                         // code...
                       // 'nama' => $nama,
                       'website' => 'Dinas Komunikasi Informatika dan Statistik Kota Banjarmasin',
                   ]);
    }
}
