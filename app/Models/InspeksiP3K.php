<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InspeksiP3K extends Model
{
    protected $fillable = [
        'periode_id', 'p3k_id', 'status'
    ];

    public function periode()
    {
        return $this->belongsTo(MasterInspeksiP3K::class, 'periode_id');
    }

    public function dataP3K()
    {
        return $this->belongsTo(DataP3K::class, 'p3k_id');
    }

    public function isi()
    {
        return $this->hasMany(IsiInspeksi::class, 'inspeksi_id');
    }
}
