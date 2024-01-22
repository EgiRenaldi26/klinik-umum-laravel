<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use PDF;
use Illuminate\Http\Request;

class TransaksiAdminPdfC extends Controller
{
    public function generatePdf(Request $request)
    {
       // Validate the request data
       $request->validate([
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
    ]);

    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    // Get transactions within the specified date range
    $transaksi = Transaksi::whereBetween('tanggal_transaksi', [$startDate, $endDate])->get();

    $data = [
        'title' => 'PDF Report for ' . $startDate . ' to ' . $endDate,
        'transaksi' => $transaksi,
        // ... other data
    ];

    // Load the PDF view and generate the PDF
    $pdf = PDF::loadView('transaksipdf_admin', $data);

    // Stream the PDF to the browser
    return $pdf->stream('transaksiadmin.pdf');
    }
}
