<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        $agenda = Agenda::all();
        $lokasi = Lokasi::all();
        return view('agenda.index', compact('agenda', 'lokasi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lokasi'     => 'required',
            'nama_department' => 'required',
            'no_mesin'        => 'required',
            'tanggal'         => 'required|date',
            'status'          => 'required',
        ]);

        Agenda::create($validated);

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);
        return response()->json($agenda);
    }

    public function update(Request $request, $id)
    {
        $agenda = Agenda::findOrFail($id);

        $validated = $request->validate([
            'nama_lokasi'     => 'required',
            'nama_department' => 'required',
            'no_mesin'        => 'required',
            'tanggal'         => 'required|date',
            'status'          => 'required',
        ]);

        $agenda->update($validated);

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agenda->delete();

        return redirect()->route('agenda.index')->with('success', 'Agenda berhasil dihapus.');
    }

    public function events()
    {
        $agenda = Agenda::all();
        $events = [];
        foreach ($agenda as $a) {
            $events[] = [
                'id' => $a->id,
                'title' => $a->no_mesin . ' - ' . $a->nama_lokasi,
                'start' => $a->tanggal,
                'backgroundColor' => $a->status === 'selesai' ? 'green' : 'red',
                'borderColor' => $a->status === 'selesai' ? 'green' : 'red',
                'extendedProps' => ['status' => $a->status],
            ];
        }
        return response()->json($events);
    }

    public function updateStatus(Request $request)
    {
        $agenda = Agenda::find($request->id);
        if ($agenda) {
            $agenda->update(['status' => $request->status]);
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Agenda not found'], 404);
    }
}
