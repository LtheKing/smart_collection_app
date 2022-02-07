<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nasabah;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NasabahExport;
use App\Imports\NasabahImport;
use DB;
use Artisan;

class TeamLeadController extends Controller
{
    public function distribusi()
    {
        return view('TeamLead.distribusi');
    }
}
