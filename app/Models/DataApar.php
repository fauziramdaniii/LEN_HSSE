<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataApar extends Model
{
    protected $fillable = [
        'tipe', 'berat', 'zona', 'gedung', 'lantai', 'titik'
    ];
}
