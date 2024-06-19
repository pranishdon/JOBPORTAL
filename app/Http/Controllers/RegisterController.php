<?php

namespace App\Http\Controllers;

use App\Events\EmailVerificaiton;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegitserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register()
    {
        return view('login.register');
    }

    public function registerInput(RegitserAccount $request)
    {
        // dd($request->all());
        $user = User::create([
            'name' => $request->input('first_name') . ' ' . $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role'=> User::ADMIN_ROLE,
        ]);
        // event(new EmailVerificaiton($user));
        EmailVerificaiton::dispatch($user);

        if($user){
            return redirect()->to('/')->with('status', 'Account has been created successfully.');
        }else{
            return redirect()->back()->with('Account has not been Created');
        }

        // return response()->json(['message' => 'User created successfully.', 'user' => $user]);
    }

        public function login(LoginRequest $request){
            $email = $request->input('email');
            $passowrd = $request->input('password');
            $remember = $request->input('remember',0);

        $credentials = array(
                'email'=>$email,
                'password'=>$passowrd,
        );
            if (Auth::attempt($credentials, $remember)) {
            if(Auth::check() && Auth::user()->role == 1){
                return redirect()->route('admin');
            }else if(Auth::check() && Auth::user()->role == 2){
                return redirect()->route('superAdminDashhboard');
            }
            }
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }


    public function dashboardIndex(){
        return view('components.user-index');
    }
    public function superAdmin(){
        return view('dashboard.superadmin-dashboard-index');
    }
    public function superAdminLogout(){
        Auth::logout();
        return redirect()->route('guestlogin');
    }
}
