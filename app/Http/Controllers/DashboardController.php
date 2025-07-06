<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pupuk;
use App\Models\Pesanan;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $totalPupuk = Pupuk::count();
        $totalPesanan = Pesanan::where('user_id', $user->id)->count();

        return view('dashboard', compact('user', 'totalPupuk', 'totalPesanan'));
    }
}