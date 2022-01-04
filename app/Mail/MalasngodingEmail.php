<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MalasngodingEmail extends Mailable
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
                    ->view('emaiku')
                    ->with(
                     [
                         'nama' => 'ARDI',
                         'website' => 'www.malasngoding.com',
                     ]);
     }
}
