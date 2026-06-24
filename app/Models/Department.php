<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'department';

    protected $primaryKey = 'id_department';

    protected $fillable = [
        'lokasi_id',
        'nama_department',
    ];

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id', 'lokasi_id');
    }

    public function mesins()
    {
        return $this->hasMany(Mesin::class, 'nama_department', 'nama_department');
    }
}
