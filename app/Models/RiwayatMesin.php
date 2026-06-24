<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatMesin extends Model
{
    protected $table = 'riwayat_mesin';

    protected $fillable = [
        'id_sebelumnya',
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

    public function mesin()
    {
        return $this->belongsTo(Mesin::class, 'no_mesin', 'no_mesin');
    }
}
