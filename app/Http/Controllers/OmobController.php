<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Omob;
use Illuminate\Http\Request;

class OmobController extends Controller
{
    public function index()
    {
        $omob = Omob::all();
        $lokasi = Lokasi::all();
        return view('omob.index', compact('omob', 'lokasi'));
    }

    public function create()
    {
        return view('omob.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'lokasi'     => 'required',
            'department' => 'required',
            'mesin'      => 'required',
            'omob'       => 'required',
            'size'       => 'nullable',
            'berkas'     => 'required|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:10240',
        ]);

        if ($request->hasFile('berkas')) {
            $file = $request->file('berkas');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/file/', $filename);

            $validated['berkas'] = $filename;
            $validated['ekstensi'] = $file->getClientOriginalExtension();
        }

        Omob::create($validated);

        return redirect()->route('omob.index')->with('success', 'Data OMOB berhasil ditambahkan.');
    }

    public function download($id)
    {
        $omob = Omob::findOrFail($id);

        $filePath = storage_path('app/public/file/' . $omob->berkas);

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        return response()->download($filePath);
    }

    public function destroy($id)
    {
        $omob = Omob::findOrFail($id);

        $filePath = storage_path('app/public/file/' . $omob->berkas);
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $omob->delete();

        return redirect()->route('omob.index')->with('success', 'Data OMOB berhasil dihapus.');
    }
}
