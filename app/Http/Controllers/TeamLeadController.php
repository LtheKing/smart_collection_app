<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nasabah;
use App\Models\DeskColl;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NasabahExport;
use App\Imports\NasabahImport;
use DB;
use Artisan;

class TeamLeadController extends Controller
{
    public function distribusi()
    {
        $dc = DB::table('sm_deskcoll')->get();
        // dd($data);
        return view('TeamLead.distribusi', compact('dc'));
    }
}
