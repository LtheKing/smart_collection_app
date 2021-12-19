<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $table = 'sm_nasabah';
    public $timestamps = false;
    protected $fillable = [
        'Nama',
        'NoRekening',
        'NIK',
        'NoTelepon',
        'Alamat',
        'Email'
    ];
}
