<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nasabah;
use App\Models\Customer;
use App\Models\DeskColl;
use App\Models\Supervisor;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NasabahExport;
use App\Imports\NasabahImport;
use Illuminate\Support\Facades\Validator;
use DB;
use Artisan;

class TeamLeadController extends Controller
{
    // SET USER
    public function distribusi()
    {
        $dc = User::where('role', 'User')->get();
        return view('TeamLead.distribusi', compact('dc'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'deskCollId' => 'required',
            'nasabahId' => 'required'
        ], [
            'nasabahId.required' => 'Pilih Nasabah terlebih Dahulu !'
        ]);

        $nasabahId = explode(',', $request->nasabahId);
        Customer::whereIn('id', $nasabahId)->update([
            'Deskcoll_id' => $request->deskCollId
        ]);

        return back()->with('Success', 'Distribusi Pekerjaan Telah Berhasil');
    }

    //set SUPERVISOR
    public function set_supervisor()
    {
        $dc = User::where('role', 'Supervisor')->get();
        return view('TeamLead.deskcoll', compact('dc'));
    }

    public function update_supervisor_id(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'Supervisor_id' => 'required',
            'Deskcoll_id' => 'required'
        ], [
            'Deskcoll_id.required' => 'Pilih User terlebih Dahulu !'
        ]);

        $deskcollId = explode(',', $request->Deskcoll_id);
        DeskColl::whereIn('id', $deskcollId)->update([
            'Supervisor_id' => $request->Supervisor_id
        ]);

        return back()->with('Success', 'Pemilihan User Telah Berhasil');
    }
}
