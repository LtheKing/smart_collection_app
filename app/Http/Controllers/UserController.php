<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $isExist = User::where('username', $request->username)->get();

        if (Count($isExist) > 0) {
            $checkPass = Hash::check($request->password, $isExist[0]->password);
            
            if ($checkPass) {
                session([
                    'username' => $request->username,
                    'role' => $isExist[0]->role
                ]);
                
                return redirect()->route('nasabah_index');
            } 
            else 
            {
                return back()->with('error', 'Password Incorrect');
            }

        } else {
            return back()->with('error', 'username or password doesnt exists');
        }
    }

    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
            'username' => 'required',
        ]);

        $request->merge([
            'password' => Hash::make($request->password)
        ]);

        User::create($request->all());
        return redirect()->route('login');
    }
}
