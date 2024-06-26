<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\ListLatihan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $title="Dashboard";
        $today = Carbon::today()->toDateString();
        $jumlahAnggotaHariIni = ListLatihan::whereDate('tanggal', $today)->count();
        $total_anggota=Anggota::count();
        return view('dashboard',compact('title','jumlahAnggotaHariIni','total_anggota'));
    }
}
