<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    use HasFactory;

    protected $table = 'sm_supervisor';
    public $timestamps = false;
    protected $fillable = [
        'Nama',
        'NoTelepon',
        'Alamat',
        'Email',
        'NIP'
    ];
}
