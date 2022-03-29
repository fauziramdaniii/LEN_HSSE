<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataP3k extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'kd_p3k', 'tipe', 'lokasi', 'provinsi', 'kota', 'zona_id', 'gedung', 'lantai', 'titik', 'keterangan'
    ];

    public function inspeksi()
    {
        return $this->hasMany(InspeksiP3k::class, 'p3k_id');
    }

    public function Zona()
    {
        return $this->belongsTo(ZonaLokasi::class, 'zona_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($p3k) {
            foreach ($p3k->inspeksi()->get() as $inspeksi) {
                $inspeksi->delete();
            }
        });
    }
}
