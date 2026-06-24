<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $currentDate = now()->format('Y-m-d');

        $expired = Agenda::whereDate('tanggal', $currentDate)->get(['no_mesin', 'tanggal']);
        $nearExpiry = Agenda::whereBetween('tanggal', [$currentDate, now()->addDays(5)->format('Y-m-d')])
            ->whereDate('tanggal', '!=', $currentDate)
            ->get(['no_mesin', 'tanggal']);

        return response()->json([
            'expired' => $expired,
            'near_expiry' => $nearExpiry,
        ]);
    }
}
