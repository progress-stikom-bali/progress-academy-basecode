<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function loginPage(){
        return \view('auth.login');
    }

    public function login(Request $req){
        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)){

            if(Auth::user()->role_id == 1){
                // role 1 = admin
                return \redirect()->route('admin.dashboard');
            } else if(Auth::user()->role_id == 2){
                // role 2 = user
                return \redirect()->route('member.dashboard');
            } else {
                // redirect login gagal
                return \back()->with('message', 'Invalid username or password');
            }
        }
        
        return \back()->with('message', 'Invalid username or password');
    }

    public function logout(Request $req){
        Auth::logout();
 
        $req->session()->invalidate();
    
        $req->session()->regenerateToken();
    
        return redirect('/login');
    }
}
