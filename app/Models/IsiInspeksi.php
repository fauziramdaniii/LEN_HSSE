<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IsiInspeksi extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'inspeksi_id', 'isi_id', 'jumlah', 'keterangan'
    ];

    public function detail()
    {
        return $this->belongsTo(IsiP3k::class, 'isi_id');
    }

    public function inspeksi()
    {
        return $this->belongsTo(InspeksiP3k::class, 'inspeksi_id');
    }
}
