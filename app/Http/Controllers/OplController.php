<?php

namespace App\Http\Controllers;

use App\Models\Opl;
use Illuminate\Http\Request;

class OplController extends Controller
{
    public function index()
    {
        $opl = Opl::with('mesin')->get();
        return view('opl.index', compact('opl'));
    }

    public function update(Request $request, $id)
    {
        $opl = Opl::findOrFail($id);

        $validated = $request->validate([
            'opl_tersedia'     => 'nullable',
            'manning_operator' => 'nullable',
            'keterangan_op'    => 'nullable',
        ]);

        $opl->update($validated);

        return redirect()->route('opl.index')->with('success', 'Data OPL berhasil diperbarui.');
    }
}
