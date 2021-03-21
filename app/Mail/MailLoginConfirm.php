<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailLoginConfirm extends Mailable
{
    use Queueable, SerializesModels;

    public $userInfo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('minhdt.1695@gmail.com')
            ->subject('Laravel send mail')
            ->view('user.mail');
    }
}
