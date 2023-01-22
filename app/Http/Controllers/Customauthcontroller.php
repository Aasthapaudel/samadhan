<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CustomauthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->has('remember'))) {
            return redirect()->intended('dashboard')->with('success', 'Signed in');
        }

        return redirect("login")->with('error', 'Invalid login credentials.');
    }

    public function registration()
    {
        return view('auth.registration');
    }

    public function customRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
        
        $user = $this->create($request->all());
        Auth::login($user);
          
        return redirect("dashboard")->with('success', 'You have registered and signed-in.');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("login")->with('error', 'You are not allowed to access.');
    }

    public function signOut() {
        Auth::logout();
        return Redirect('login')->with('success', 'You have been logged out.');
    }
    
    public function forgotPassword()
    {
        return view('auth.forgot_password');
    }
    
    public function sendPasswordResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        
        $user = User::where('email', $request->email)->first();
        
        if($user){
            // generate reset token and send reset link to user's email
        }
        
        return redirect('login')->with('success', 'A password reset link has been sent to your email.');
    }
    
        public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
            'token' => 'required',
        ]);
        
        $user = User::where('email', $request->email)->first();
        
        if($user){
            // validate the token
            // update the user's password
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('login')->with('success', 'Your password has been reset successfully.');
        }
        
        return redirect('password/reset')->with('error', 'Invalid token or email.');
    }
}
