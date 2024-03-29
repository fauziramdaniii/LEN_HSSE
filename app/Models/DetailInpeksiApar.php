<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailInpeksiApar extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'periode_id', 'apart_id', 'jenis', 'noozle', 'selang', 'tabung', 'rambu', 'label', 'cat', 'pin', 'roda', 'keterangan', 'foto', 'tanggal', 'pemeriksa', 'status'
    ];

    public function Apart()
    {
        return $this->belongsTo(DataApar::class, 'apart_id');
    }

    public function periode()
    {
        return $this->belongsTo(MasterInspeksi::class, 'periode_id');
    }
}
