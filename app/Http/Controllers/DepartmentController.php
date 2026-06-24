<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $department = Department::with('lokasi')->get();
        $lokasi = Lokasi::all();
        return view('department.index', compact('department', 'lokasi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'lokasi_id'        => 'required|exists:lokasi,lokasi_id',
            'nama_department'  => 'required',
        ]);

        Department::create($validated);

        return redirect()->route('department.index')->with('success', 'Department berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return response()->json($department);
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);

        $validated = $request->validate([
            'lokasi_id'       => 'required|exists:lokasi,lokasi_id',
            'nama_department' => 'required',
        ]);

        $department->update($validated);

        return redirect()->route('department.index')->with('success', 'Department berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $department = Department::withCount('mesins')->findOrFail($id);

        if ($department->mesins_count > 0) {
            return redirect()->route('department.index')->with('error', 'Department tidak dapat dihapus karena masih memiliki mesin terkait.');
        }

        $department->delete();

        return redirect()->route('department.index')->with('success', 'Department berhasil dihapus.');
    }

    public function getByLokasi(Request $request)
    {
        $departments = Department::where('lokasi_id', $request->lokasi_id)->get();
        return response()->json($departments);
    }
}
