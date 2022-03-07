<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class CustomerExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function __construct($field, $bank) {
        $this->field = $field;
        $this->bank = $bank;
    }

    public function collection()
    {
        $field = explode(',', $this->field);
        $data = DB::table('sm_customer')
                    ->select($field)
                    ->where('Bank', $this->bank)
                    ->get();
        return $data;
    }

    public function headings(): array
    {
        return explode(',', $this->field);
        // return ['Nama', 'NoRekening', 'NIK'];
    }
}
