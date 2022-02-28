<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterInspeksi extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'periode', 'status', 'sudah_inspeksi', 'belum_inspeksi'
    ];

    public function DetailInspeksi()
    {
        return $this->hasMany(DetailInpeksiApar::class, 'periode_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($apar) {
            foreach ($apar->DetailInspeksi()->get() as $inspeksi) {
                $inspeksi->delete();
            }
        });
    }
}
