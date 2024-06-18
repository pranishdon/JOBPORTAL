<?php

namespace App\Listeners;

use App\Events\EmailVerificaiton;
use App\Mail\UserInformation;
use Illuminate\Support\Facades\Mail;

class EmailListener
{

    public function __construct()
    {

    }


    public function handle(EmailVerificaiton $event): void
    {

        $data = array(
           'name' =>$event->user->name,
           'email'=> $event->user->email,
        );
       Mail::to($event->user->email)->send( new UserInformation($data));
    }
}
