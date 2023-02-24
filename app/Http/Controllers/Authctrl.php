<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use Hash;

class Authctrl extends Controller
{

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }
    public function authenticate(Request $request)
    {
        // $credentiala = $request->validate([
        //     'email'=> ['required','email'],
        //     'password'=> ['required']
        // ]);

        // if (Auth::attempt($credentials)) {
        //     echo
        // }
    }
    public function registration()
    {
        return response()
            ->json(['name' => 'Avishek', 'state' => 'wb', 'csrf_token' => csrf_token()]);
    }
    public function customRegistration(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return response()
            ->json(['msg' => 'Success']);
    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function show()
    {
        return view('login.wrap');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'password' => 'Password Error...'
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }

    public function messages()
    {
        return [
            'email.required' => 'The Email field is required....',
            'password.required' => 'The Password field is required....',
        ];
    }
}
