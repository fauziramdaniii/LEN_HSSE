<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataP3K extends Model
{
    protected $fillable = [
        'id', 'tipe', 'lokasi', 'provinsi', 'kota', 'zona', 'gedung', 'lantai', 'titik', 'kedaluwarsa', 'keterangan'
    ];
}
