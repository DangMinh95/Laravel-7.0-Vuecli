<?php

namespace App\Listeners;

use App\Events\LoginConfirm;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailLoginConfirm;

class SendMailConfirmLogin implements ShouldQueue
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  LoginConfirm  $event
     * @return void
     */
    public function handle(LoginConfirm $event)
    {
        $user = $event->userInfo;
        // Mail::to($user->email)->send(new MailLoginConfirm());
    }
}
