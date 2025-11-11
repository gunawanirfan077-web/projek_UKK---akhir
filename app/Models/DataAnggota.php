<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAnggota extends Model
{
    use HasFactory;

    protected $table = 'data_anggota';

    protected $fillable = [
        'kode_anggota',
        'nama',
        'jabatan',
        'no_hp',
        'foto',
    ];

}
