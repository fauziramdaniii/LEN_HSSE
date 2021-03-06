<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterInspeksiP3k extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = [
        'periode', 'status', 'sudah_inspeksi', 'belum_inspeksi'
    ];

    public function DetailInspeksi()
    {
        return $this->hasMany(InspeksiP3k::class, 'periode_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($p3k) {
            foreach ($p3k->DetailInspeksi()->get() as $inspeksi) {
                $inspeksi->delete();
            }
        });
    }
}
