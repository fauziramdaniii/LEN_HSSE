<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataP3K extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'tipe', 'lokasi', 'provinsi', 'kota', 'zona', 'gedung', 'lantai', 'titik', 'keterangan'
    ];

    public function inspeksi()
    {
        return $this->hasMany(InspeksiP3K::class, 'p3k_id');
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
