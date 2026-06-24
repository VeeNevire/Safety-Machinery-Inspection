<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use App\Models\Omob;
use App\Models\User;
use App\Models\Agenda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $mesin_fa = Mesin::where('nama_lokasi', 'FA')->count();
        $mesin_fb = Mesin::where('nama_lokasi', 'FB')->count();
        $mesin_fc = Mesin::where('nama_lokasi', 'FC')->count();
        $mesin_mtc = Mesin::where('nama_lokasi', 'MTC')->count();
        $omob_count = Omob::count();
        $pengguna_count = User::count();

        $current_date = now()->format('Y-m-d');
        $expired = Agenda::whereDate('tanggal', $current_date)->get();
        $nearExpiry = Agenda::whereBetween('tanggal', [$current_date, now()->addDays(5)->format('Y-m-d')])->get();

        return view('dashboard.index', compact('mesin_fa', 'mesin_fb', 'mesin_fc', 'mesin_mtc', 'omob_count', 'pengguna_count', 'expired', 'nearExpiry'));
    }
}
