<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

// controller login 
    public function login()
    {
        $data['title'] = 'Login';
        return view('Login.login', $data);
    }

    public function loginuser(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'username tidak boleh kosong',
            'password.required' => 'password tidak boleh kosong',
        ]);
    
        if (Auth::attempt([
            'username' => $request->username,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();
            
            if (auth()->user()->role == 'admin') {
                return redirect('admin-gudang')->with('success', 'Login successful.');
            } elseif (auth()->user()->role == 'karyawan') {
                return redirect('karyawan-gudang')->with('success', 'Login successful.');
            } elseif (auth()->user()->role == 'manager') {
                return redirect('manager-gudang')->with('success', 'Login successful.');
            } else {
                return redirect('/login')->with('success', 'Login successful.');
            }
        }
    
        $request->session()->flash('error', 'Username atau password salah!!');
        return back()->withInput($request->only('username'));
    }
    



     public function logout(Request $request)
     {
         Auth::logout();
      

         $request->session()->invalidate();
      
         $request->session()->regenerateToken();
      
         return redirect('/')->with('success', 'logout success ');
     }
    
    
    }