<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\Customer;
use App\Models\Supervisor;
use App\Models\Deskcoll;
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
        $users = User::all();
        $admins = User::where('role', 'Admin')->get();
        $supervisors = User::where('role', 'Supervisor')->get();
        // dd($admins);
        return view('User.create', compact('users', 'admins', 'supervisors'));
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

        if ($request->role == 'Supervisor') {
            $request->validate(['admin_id' => 'required']);
        }

        if ($request->role == 'User') {
            $request->validate(['supervisor_id' => 'required']);
        }
        
        $request->merge([
            'password' => Hash::make($request->password)
        ]);
        
        // dd($request->all());

        User::create($request->all());

        if ($request->role == 'Supervisor') {
            Supervisor::create([
                'Nama' => $request->name,
                'NoTelepon' => '-',
                'Alamat' => '-',
                'Email' => $request->email,
                'NIP' => '-',
            ]);
        }

        if ($request->role == 'User') {
            Deskcoll::create([
                'Nama' => $request->name,
                'NoTelepon' => '-',
                'Alamat' => '-',
                'Email' => $request->email,
                'NIP' => '-',
                'Supervisor_id' => '-',
            ]);
        }

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
        $session = Session::all();
        $role = $session['role'];

        $users;
        $data;

        $user = DB::table('users')
        ->where('role', $role)
        ->where('username', $username)
        ->get();

        switch ($role) {
            case 'Super Admin':
                $users = DB::table('users')->get();
                break;

            case 'Admin':
                $users = DB::table('users')->where('role', $role && '');
                $users = DB::table('sm_customer')->where('IsDeletedByAdmin', '')->get();
                break;

            case 'Supervisor':
                //JANGAN  LUPA PAKE KONDISI KALO NULL
                $deskcoll = DB::table('users')
                            ->where('supervisor_id', $user[0]->id)
                            ->get();

                if (count($deskcoll) == 0) {
                    return $deskcoll;
                }

                $users = DB::table('sm_customer')
                            ->where('Deskcoll_id', $deskcoll[0]->id)
                            ->get();
                break;

            case 'User':
                $users = DB::table('sm_customer')
                            ->where('Deskcoll_id', $user[0]->id)
                            ->get();
                break;
            default:
                $users = DB::table('sm_customer')->get();
                break;
        }

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

    public function testGetUserByRole() {
        $session = Session::all();
        $role = $session['role'];
        $username = $session['username'];

        // $users = DB::table('users')->where('role' != );
    }
}

