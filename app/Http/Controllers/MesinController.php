<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Mesin;
use App\Models\Opl;
use Illuminate\Http\Request;

class MesinController extends Controller
{
    public function index()
    {
        $mesin = Mesin::with('opl')->get();
        $lokasi = Lokasi::all();
        return view('mesin.index', compact('mesin', 'lokasi'));
    }

    public function create()
    {
        $last = Mesin::latest('no_mesin')->first();
        if ($last) {
            $lastNumber = (int) substr($last->no_mesin, 3);
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '001';
        }
        $no_mesin = 'MSN' . $newNumber;

        return view('mesin.create', compact('no_mesin'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_mesin'               => 'required|unique:data_mesin,no_mesin',
            'nama_mesin'             => 'required',
            'tanggal'                => 'nullable|date',
            'nama_lokasi'            => 'required',
            'nama_department'        => 'required',
            'safety_cover'           => 'nullable',
            'emergency_stop'         => 'nullable',
            'sensor'                 => 'nullable',
            'titik_potong'           => 'nullable',
            'titik_pentalan'         => 'nullable',
            'titik_jepit'            => 'nullable',
            'pelindung_lain_jika_ada' => 'nullable',
            'terlindung_dari_potensi_bahaya' => 'nullable',
            'tag_loto_di_mesin'      => 'nullable',
            'keterangan_tambahan'    => 'nullable',
            'mesin_pernah_kecelakaan_kerja' => 'nullable',
            'perbaikan_pelindung_mesin' => 'nullable',
            'opl_tersedia'           => 'nullable',
            'manning_operator'       => 'nullable',
            'keterangan_op'          => 'nullable',
        ]);

        $mesin = Mesin::create($validated);

        Opl::create([
            'no_mesin'        => $mesin->no_mesin,
            'opl_tersedia'    => $request->opl_tersedia,
            'manning_operator' => $request->manning_operator,
            'keterangan_op'   => $request->keterangan_op,
        ]);

        return redirect()->route('mesin.index')->with('success', 'Data mesin berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mesin = Mesin::with('opl')->findOrFail($id);
        return response()->json($mesin);
    }

    public function update(Request $request, $id)
    {
        $mesin = Mesin::findOrFail($id);

        $validated = $request->validate([
            'no_mesin'               => 'required|unique:data_mesin,no_mesin,' . $mesin->id,
            'nama_mesin'             => 'required',
            'tanggal'                => 'nullable|date',
            'nama_lokasi'            => 'required',
            'nama_department'        => 'required',
            'safety_cover'           => 'nullable',
            'emergency_stop'         => 'nullable',
            'sensor'                 => 'nullable',
            'titik_potong'           => 'nullable',
            'titik_pentalan'         => 'nullable',
            'titik_jepit'            => 'nullable',
            'pelindung_lain_jika_ada' => 'nullable',
            'terlindung_dari_potensi_bahaya' => 'nullable',
            'tag_loto_di_mesin'      => 'nullable',
            'keterangan_tambahan'    => 'nullable',
            'mesin_pernah_kecelakaan_kerja' => 'nullable',
            'perbaikan_pelindung_mesin' => 'nullable',
        ]);

        $mesin->update($validated);

        return redirect()->route('mesin.index')->with('success', 'Data mesin berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mesin = Mesin::with('opl')->findOrFail($id);

        if ($mesin->opl) {
            $mesin->opl->delete();
        }

        $mesin->delete();

        return redirect()->route('mesin.index')->with('success', 'Data mesin berhasil dihapus.');
    }

    public function byLokasiDepartment(Request $request)
    {
        $query = Mesin::query();
        if ($request->lokasi) {
            $query->where('nama_lokasi', $request->lokasi);
        }
        if ($request->department) {
            $query->where('nama_department', $request->department);
        }
        $mesin = $query->get(['no_mesin', 'nama_mesin']);
        return response()->json($mesin);
    }
}
