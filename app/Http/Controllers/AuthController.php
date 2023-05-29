<?php

namespace App\Http\Controllers;

use App\Models\Urls;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Session as FacadesSession;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/dashboard/' . auth()->user()->id);
        }
    }

    public function registration()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("dashboard/" . $check->id);
    }

    public function create(array $data) {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => FacadesHash::make($data['password']),
        ]);
    }

    public function dashboard($id)
    {
        if(Auth::check()){
            $urls = Urls::where('user_id', $id)->get();
            return view('dashboard', compact('urls'));
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function signOut() {
        FacadesSession::flush();
        Auth::logout();

        return Redirect('/');
    }
}
