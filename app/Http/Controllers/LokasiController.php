<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Mesin;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    public function index()
    {
        $lokasi = Lokasi::all();
        return view('lokasi.index', compact('lokasi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lokasi' => 'required|unique:lokasi,nama_lokasi',
        ]);

        Lokasi::create($validated);

        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $lokasi = Lokasi::findOrFail($id);

        $validated = $request->validate([
            'nama_lokasi' => 'required|unique:lokasi,nama_lokasi,' . $lokasi->lokasi_id . ',lokasi_id',
        ]);

        $lokasi->update($validated);

        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $lokasi = Lokasi::withCount('mesins')->findOrFail($id);

        if ($lokasi->mesins_count > 0) {
            return redirect()->route('lokasi.index')->with('error', 'Lokasi tidak dapat dihapus karena masih memiliki mesin terkait.');
        }

        $lokasi->delete();

        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil dihapus.');
    }
}
