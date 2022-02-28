<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataApar extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'tipe', 'jenis', 'berat', 'zona', 'lokasi', 'provinsi', 'kota', 'gedung', 'lantai', 'titik', 'kedaluarsa', 'keterangan'
    ];

    public function inspeksi()
    {
        return $this->hasMany(DetailInpeksiApar::class, 'apart_id');
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
