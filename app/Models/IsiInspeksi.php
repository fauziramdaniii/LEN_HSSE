<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IsiInspeksi extends Model
{
    protected $fillable = [
        'inspeksi_id', 'isi_id', 'jumlah', 'keterangan'
    ];

    public function detail()
    {
        return $this->belongsTo(IsiP3K::class, 'isi_id');
    }
    use HasFactory;
}
