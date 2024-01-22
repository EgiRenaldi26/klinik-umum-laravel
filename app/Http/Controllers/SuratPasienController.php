<?php

namespace App\Http\Controllers;

use App\Models\pasien;
use Illuminate\Http\Request;
use PDF;

class SuratPasienController extends Controller
{
    public function pdf($id) {
        $pasien = pasien::findOrFail($id);
    
        $pdf = PDF::loadView('suratpasien', ['pasien' => $pasien]);
        return $pdf->stream('pasien.pdf');
    }
}
