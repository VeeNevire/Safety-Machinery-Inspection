<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';

    protected $primaryKey = 'lokasi_id';

    protected $fillable = [
        'nama_lokasi',
    ];

    public function departments()
    {
        return $this->hasMany(Department::class, 'lokasi_id', 'lokasi_id');
    }

    public function mesins()
    {
        return $this->hasMany(Mesin::class, 'nama_lokasi', 'nama_lokasi');
    }
}
