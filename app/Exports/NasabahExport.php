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
    
    public function view(): View
    {
        $data = Nasabah::all();
        foreach ($data as $key => $value) {
            $value->NIK = (string)$value->NIK;
        }
        
        return view('Nasabah.report', [
            'nasabahs' => $data
        ]);
    }
}
