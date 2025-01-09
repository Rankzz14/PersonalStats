<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user($id)
    {
        $user = UserModel::where('id', $id)->get();
        return view('user.index', compact($user));
    }

    public function register()
    {
        return view('user.register');
    }
    public function login()
    {
        return view('user.login');
    }
    public function store(request $request)
    {
        $data = $request->validate([
            'username' => 'required|min:3|unique:users,username',
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ], [
            'email.unique' => 'Email adress already in use.'
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = UserModel::create($data);

        return view('welcome.index')->with('success', 'User Created Successfully!');
    }

    public function loginin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            return redirect('welcome')->with(compact($user))->with('success', 'Login Successfull!');
        }

        return back()->withErrors([
            'email' => 'Provided Credentials do not match our records.',
        ])->onlyInput('email');
    }
}
