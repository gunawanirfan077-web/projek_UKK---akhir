<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notulen extends Model
{
    use HasFactory;

    protected $table = 'notulen';

    protected $fillable = [
        'judul',
        'tanggal',
        'tempat',
        'pembicara',
        'isi',
        'penulis',
    ];
}

