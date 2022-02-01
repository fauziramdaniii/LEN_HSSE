<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailInpeksiApar extends Model
{
    use HasFactory;
    protected $fillable = [
        'periode_id', 'apart_id', 'jenis', 'noozle', 'selang', 'tabung', 'rambu', 'label', 'cat', 'pin', 'roda', 'keterangan', 'foto'
    ];

    public function Apart()
    {
        return $this->belongsTo(DataApar::class, 'apart_id');
    }
}
