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

        // dd($this->field, $this->bank);
        if(($this->field == null || $this->field == '') && ($this->bank != null || $this->bank != '')) {
            $data = DB::table('sm_customer')
                        ->where('Bank', $this->bank)
                        ->get();
            return $data;
        } else if(($this->field != null || $this->field != '') && ($this->bank == null || $this->bank == '')) {
            $field = explode(',', $this->field);
            $data = DB::table('sm_customer')
                        ->select($field)
                        ->get();
            return $data;
        } else if($this->field == null && $this->bank == null) {
            $data = DB::table('sm_customer')
                        ->get();
            return $data;
        }        
        else {
            $field = explode(',', $this->field);
            $data = DB::table('sm_customer')
                        ->select($field)
                        ->where('Bank', $this->bank)
                        ->get();
            return $data;
        }

    }

    public function headings(): array
    {
        if ($this->field != null || $this->field != '') {
            return explode(',', $this->field);
        }  else {
            $columns = DB::getSchemaBuilder()->getColumnListing('sm_customer');
            return $columns;
        }
        // return ['Nama', 'NoRekening', 'NIK'];
    }
}
