<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterInspeksiP3K extends Model
{
    protected $fillable = [
        'periode', 'status', 'sudah_inspeksi', 'belum_inspeksi'
    ];

    public function DetailInspeksi()
    {
        return $this->hasMany(InspeksiP3K::class, 'periode_id');
    }
    use HasFactory;
}
