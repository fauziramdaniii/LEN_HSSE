<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataApar extends Model
{
    protected $fillable = [
        'tipe', 'jenis', 'berat', 'zona', 'lokasi', 'kedaluarsa', 'keterangan'
    ];
}
