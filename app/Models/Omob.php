<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Omob extends Model
{
    protected $table = 'omob';

    protected $fillable = [
        'lokasi',
        'department',
        'mesin',
        'omob',
        'size',
        'ekstensi',
        'berkas',
    ];
}
