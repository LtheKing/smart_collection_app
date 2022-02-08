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
        $dc = DeskColl::all();
        $n = Nasabah::all();
        return view('TeamLead.distribusi', compact('dc', 'n'));
    }
}
