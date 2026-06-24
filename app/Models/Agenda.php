<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';

    protected $fillable = [
        'nama_lokasi',
        'nama_department',
        'no_mesin',
        'tanggal',
        'status',
    ];
}
