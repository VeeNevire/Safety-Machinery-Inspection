<?php

namespace App\Http\Controllers;

use App\Models\RiwayatMesin;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index($no_mesin)
    {
        $riwayats = RiwayatMesin::where('no_mesin', $no_mesin)->get();
        return response()->json($riwayats);
    }

    public function all()
    {
        $riwayats = RiwayatMesin::with('mesin')->get();
        return view('riwayat.index', compact('riwayats'));
    }

    public function fetch(Request $request)
    {
        $riwayats = RiwayatMesin::where('no_mesin', $request->no_mesin)->get();

        if ($riwayats->isEmpty()) {
            return '<p>Tidak ada riwayat untuk mesin ini.</p>';
        }

        $html = '<table class="table table-bordered"><thead><tr><th>Tanggal</th><th>Lokasi</th><th>Status</th></tr></thead><tbody>';
        foreach ($riwayats as $r) {
            $status = $r->status ?? ($r->opl_tersedia === 'ada' ? 'Baik' : 'Perlu Perbaikan');
            $html .= '<tr><td>' . $r->tanggal . '</td><td>' . $r->nama_lokasi . '</td><td>' . $status . '</td></tr>';
        }
        $html .= '</tbody></table>';

        return $html;
    }
}
