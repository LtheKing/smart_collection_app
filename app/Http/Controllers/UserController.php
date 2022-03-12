<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\Customer;
use App\Models\Bank;
use Artisan;

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
                
                return redirect()->route('customer_index');
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
        return view('User.create');
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
        
        dd($request->all());

        User::create($request->all());
        return redirect()->route('user_index');
    }

    public function index() {
        return view('User.index');
    }

    public function edit($id)
    {
        Artisan::call('cache:clear');
        $user = User::find($id);
        return view('User.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $request->merge([
            'password' => Hash::make($request->password)
        ]);

        $data = User::find($id);
        $data->update($request->all());
        return redirect()->route('user_index')->with('Success', 'Data User Berhasil Diubah');
    }

    public function show($id)
    {
        Artisan::call('cache:clear');
        $user = User::find($id);
        return view('User.detail', compact('user'));
    }

    //api
    public function getAll()
    {
        $users = DB::table('users')->get();
        $data = (object)[
            'data' => $users
        ];

        return $data;
    }

    public function api_delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return response('Data Deleted', 200);
    }
}
