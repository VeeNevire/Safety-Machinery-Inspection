<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    public function show($no_mesin = null)
    {
        if ($no_mesin) {
            $mesin = Mesin::with('opl')->where('no_mesin', $no_mesin)->first();
            return view('scan.index', compact('mesin'));
        }

        $mesin = null;
        return view('scan.index', compact('mesin'));
    }
}
