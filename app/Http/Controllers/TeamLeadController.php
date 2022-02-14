<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nasabah;
use App\Models\DeskColl;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NasabahExport;
use App\Imports\NasabahImport;
use Illuminate\Support\Facades\Validator;
use DB;
use Artisan;

class TeamLeadController extends Controller
{
    public function distribusi()
    {
        $dc = DeskColl::all();
        $n = Nasabah::all();
        return view('TeamLead.distribusi', compact('dc', 'n'));
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
        Nasabah::whereIn('id', $nasabahId)->update([
            'Deskcoll_id' => $request->deskCollId
        ]);

        return back()->with('Success', 'Distribusi Pekerjaan Telah Berhasil');
    }
}
