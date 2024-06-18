<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\user;
use App\Http\Requests\ResetPassword;
use Illuminate\Support\Facades\DB;
class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token)
    {

        $email = $request->query('email');
        $tokenData = DB::table('password_reset_tokens')->where('email', $email)->first();
        if (!$tokenData || !Hash::check($token, $tokenData->token)) {
            abort(404);
        }

        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $email]
        );
    }

     public function reset(ResetPassword $request)
     {
        $status = Password::reset(
            $request->only( 'email','password', 'password_confirmation', 'token'),
            function (User $user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('guestlogin')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
