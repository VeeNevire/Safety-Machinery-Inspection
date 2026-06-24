<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opl extends Model
{
    protected $table = 'opl';

    protected $fillable = [
        'no_mesin',
        'opl_tersedia',
        'manning_operator',
        'keterangan_op',
    ];

    public function mesin()
    {
        return $this->belongsTo(Mesin::class, 'no_mesin', 'no_mesin');
    }
}
