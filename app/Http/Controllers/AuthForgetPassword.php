<?php
namespace App\Http\Controllers;

use App\Http\Requests\EmailValidation;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class AuthForgetPassword extends Controller
{
    public function forgetPassowrdIndex(){
        return view('login.email-send');
    }

    public function forgetPassword(EmailValidation $request){
        $email = $request->input('email');
        $findemail = User::where('email', $email)->first();

        if ($findemail) {
            $status = Password::sendResetLink(
                $request->only('email')
            );

            return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
        }

        return back()->withErrors('Email Invalid');
    }
}
