<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\Nasabah;

class NasabahExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $bank;

    function __construct($bank) {
            $this->bank = $bank;
    }

    public function view(): View
    {       
        $nasabahs = Nasabah::where('Bank', $this->bank)->get();
        return view('Nasabah.report', compact('nasabahs'));
    }
}
