<?php

namespace App\Http\Controllers;

use App\Models\LogM;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function login()
    {
        
        $title = "Login Pages";
        return view('login_index' , compact('title'));
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $LogM = LogM::create([
                'id_user' => Auth::user()->id,
                'activity' => 'User Melakukan Login'
            ]);
            $request->session()->put('LogM' , $LogM);
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('success', 'Login success!');
        }

        return back()->withErrors([
            'password' => 'Wrong Email or password',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
























