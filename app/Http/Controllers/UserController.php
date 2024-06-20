<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
    public function userIndex(){
        return view('components.user-index');
    }
    public function findJob(){

        return view ('components.user-find-job');
    }
    public function postJOb(){
        return view('components.user-post-job');
    }
    public function jobDetail(){
        return view('components.user-job-detail');
    }
    public function userLogout(){
        Auth::logout();
        return redirect()->route('guestlogin');
    }
}
