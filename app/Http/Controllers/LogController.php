<?php

namespace App\Http\Controllers;

use App\Models\LogM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogController extends Controller
{
    public function index() {
        $user = Auth::user();

        $logM = LogM::create([
            'id_user' => $user->id,
            'activity' => 'User Melihat Halaman Log',
            'created_at' => now(), 
        ]);

        $title = "Daftar Aktivitas";
        $logM = LogM::select('users.*', 'log.*')
            ->join('users', 'users.id', '=', 'log.id_user')
            ->orderBy('log.created_at', 'desc') // Mengganti 'log.id' menjadi 'log.created_at'
            ->paginate(100);

        return view('log_index', compact('title', 'logM'));
    }
}
