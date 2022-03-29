<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataApar extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'kd_apar', 'tipe_id', 'jenis_id', 'berat', 'zona_id', 'lokasi', 'provinsi', 'kota', 'gedung', 'lantai', 'titik', 'kedaluarsa', 'keterangan'
    ];

    public function inspeksi()
    {
        return $this->hasMany(DetailInpeksiApar::class, 'apart_id');
    }

    public function Tipe()
    {
        return $this->belongsTo(TipeApar::class, 'tipe_id');
    }

    public function Jenis()
    {
        return $this->belongsTo(JenisApar::class, 'jenis_id');
    }

    public function Zona()
    {
        return $this->belongsTo(ZonaLokasi::class, 'zona_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($apar) {
            foreach ($apar->inspeksi()->get() as $inspeksi) {
                $inspeksi->delete();
            }
        });
    }
}
