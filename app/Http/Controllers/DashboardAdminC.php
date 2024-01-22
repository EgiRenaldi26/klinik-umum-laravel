<?php

namespace App\Http\Controllers;

use App\Models\obat;
use App\Models\pasien;
use App\Models\transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardAdminC extends Controller
{
    public function getTodayDetails()
    {
        $today = Carbon::now();

        $dayName = $today->format('l');
        $monthName = $today->format('F');

        return [
            'dayName' => $dayName,
            'monthName' => $monthName,
        ];
    }

    public function getTodayDate()
    {
        $todayDate = Carbon::now()->format('d/m/y');

        return $todayDate;
    }

    public function index()
    {
        $title = "Dashboard Pages";
        $p = pasien::count(); 
        $o = obat::count();
        $r = pasien::count();
        $t = transaksi::count();
        $income = transaksi::sum('total_biaya');
        $incomeData = transaksi::select('tanggal_transaksi', 'total_biaya')->get();

        $todayDetails = $this->getTodayDetails();
        $todayDate = $this->getTodayDate();

        return view('dashboard' , compact('title','p','o','t','r','income','incomeData','todayDetails','todayDate'));
    }
}
