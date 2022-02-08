<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeskColl extends Model
{
    use HasFactory;

    protected $table = 'sm_deskcoll';
    public $timestamps = false;
    protected $fillable = [
        'Nama',
        'NoTelepon',
        'Alamat',
        'Email',
        'NIP'
    ];
}
