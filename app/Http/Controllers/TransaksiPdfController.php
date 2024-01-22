<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use PDF;
use Illuminate\Http\Request;

class TransaksiPdfController extends Controller
{
    public function pdf($id) {
        $transaksi = transaksi::findOrFail($id);
    
        $pdf = PDF::loadView('transaksi_pdf', ['transaksi' => $transaksi]);
        return $pdf->stream('transaksi.pdf');
    }
}
