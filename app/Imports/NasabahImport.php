<?php

namespace App\Imports;
use App\Models\Nasabah;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NasabahImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // dd($row);
        return new Nasabah([
            'Nama'          => $row['nama'],
            'NoRekening'    => $row['no_rekening'],
            'NIK'           => $row['nik'],
            'NoTelepon'     => $row['nomor_telepon'],
            'Alamat'        => $row['alamat'],
            'Email'         => $row['email'],
        ]);
    }
}

?>