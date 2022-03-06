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

    public function index() {
        return view('User.index');
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
