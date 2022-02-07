<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DescHoldModel extends Model
{
    use HasFactory;

    protected $table = 'sm_deschold';
    public $timestamps = false;
    protected $fillable = [
        'Nama',
        'NoTelepon',
        'Alamat',
        'Email',
    ];
}
