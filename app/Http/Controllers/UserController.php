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
use Session;

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
                
                $session = Session::all();
                $role = $session['role'];

                switch($role){
                    case 'Super Admin':
                        return redirect()->route('customer_index_adm');
                        break;

                    case 'Admin':
                        return redirect()->route('customer_index_adm');
                        break;

                    case 'Supervisor':
                        return redirect()->route('customer_index_spv');
                        break;

                    case 'User':
                        return redirect()->route('customer_index_spv');
                        break;
                    default:
                        return redirect()->route('customer_index_spv');        
                    break;
                }
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
        // $role = $session['role'];
        // $username = $session['username'];

        $role = 'Supervisor';
        $username = 'spv_mutiara';

        // $users;
        // $data;

        $user = DB::table('users')
        ->where('role', $role)
        ->where('username', $username)
        ->get();

        switch ($role) {
           case 'Super Admin':
                $customers = DB::table('sm_customer')->whereNotNull('Deskcoll_id')->get();

                foreach ($customers as $cu) {
                    $pic = User::where('id', $cu->Deskcoll_id)->get();
                    if (count($pic) > 0) {
                        $picName = $pic[0]->name;
                        $spv = User::where('id', $pic[0]->id)->get();
                        $cu->PIC = $picName;
                        $cu->Supervisor = $spv[0]->name;
                    }
                }
                break;

            case 'Admin':
                $customers = DB::table('sm_customer')->where('IsDeletedByAdmin', '')
                                    ->whereNotNull('Deskcoll_id')
                                    ->get();
                
                foreach ($customers as $cu) {
                    $pic = User::where('id', $cu->Deskcoll_id)->get();
                    if (count($pic) > 0) {
                        $picName = $pic[0]->name;
                        $spv = User::where('id', $pic[0]->id)->get();
                        $cu->PIC = $picName;
                        $cu->Supervisor = $spv[0]->name;
                    }
                }

                break;

            case 'Supervisor':
                //JANGAN  LUPA PAKE KONDISI KALO NULL
                $spv = DB::table('users')->where('username', $username)->get();
                // dd($spv);
                if (count($spv) == 0) {
                    return $spv == null;
                }

                $bawahan = DB::table('users')->where('supervisor_id', $spv[0]->id)->get();

                if (count($bawahan) == 0) {
                    return $bawahan == null;
                }

                foreach ($bawahan as $user) {
                    $spv->push($user);
                }

                $users = $spv;
                break;

            case 'User':
                $users = null;
                break;
            default:
                $users = DB::table('users')->get();
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
        // $session = Session::all();
        // $role = $session['role'];
        // $username = $session['username'];

        $role = 'Supervisor';
        $username = 'spv_mutiara';

        if ($role == 'Supervisor') {
            $spv = DB::table('users')->where('username', $username)->get();
            $users = DB::table('users')->where('supervisor_id', $spv[0]->id)->get();
            foreach ($users as $user) {
                $spv->push($user);
            }

            return response($spv, 200);
        }

        return response('empty', 200);
        
    }
}

