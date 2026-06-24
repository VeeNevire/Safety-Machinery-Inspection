<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesin extends Model
{
    protected $table = 'data_mesin';

    protected $fillable = [
        'no_mesin',
        'nama_mesin',
        'tanggal',
        'nama_lokasi',
        'nama_department',
        'safety_cover',
        'emergency_stop',
        'sensor',
        'titik_potong',
        'titik_pentalan',
        'titik_jepit',
        'pelindung_lain_jika_ada',
        'terlindung_dari_potensi_bahaya',
        'tag_loto_di_mesin',
        'keterangan_tambahan',
        'mesin_pernah_kecelakaan_kerja',
        'perbaikan_pelindung_mesin',
    ];

    public function opl()
    {
        return $this->hasOne(Opl::class, 'no_mesin', 'no_mesin');
    }

    public function riwayatMesins()
    {
        return $this->hasMany(RiwayatMesin::class, 'no_mesin', 'no_mesin');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'nama_lokasi', 'nama_lokasi');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'nama_department', 'nama_department');
    }
}
