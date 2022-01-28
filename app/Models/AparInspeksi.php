<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AparInspeksi extends Model
{
    protected $fillable = [
        'tipe',  'berat', 'zona', 'lokasi', 'kedaluarsa', 'keterangan'
    ];
}
