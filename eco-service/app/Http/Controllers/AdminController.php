<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserLoginRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\createUserRequest;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function register()
    {

        return view('users.register');
    }
    public function handleRegistration(User $user, createUserRequest $request)
    {

        $user->name = $request->nom;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('login')->with('success', 'Votre compte a été crée. Connectez-vous');
    }

    public function login()
    {
        return view('users.login');
    }

    public function handleLogin(Request $request)
    {
        //SELECT *FROM USERS WHERE email = $email && password = $password

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('products.create');
        } else {
            //aucun élément trouvé
            return redirect()->back()->with('error', 'Informations de connexions non reconnus');
        }
    }

    public function dashboard()
    {

        return view('dashboard');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
