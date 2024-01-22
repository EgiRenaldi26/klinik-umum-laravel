<?php

namespace App\Http\Controllers;

use App\Models\LogM;
use App\Models\obat;
use App\Models\pasien;
use App\Models\rawat;
use App\Models\transaksi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$LogM = LogM::create([
        'id_user' => Auth::user()->id,
        'activity' => 'User Memasuki Halaman Transaksi'
    ]);
        $title = "Transaksi Pages";

        $obatT = obat::all();
        $pasienT = pasien::all();
        $rawatT = rawat::all();
        $transaksi = transaksi::search(request('search'))->paginate(10);
        $cariT = request('search');
        return view('view.transaksi_index', compact('transaksi','cariT','obatT','pasienT','rawatT','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Transaksi Tambah Pages";
        $obatT = obat::all();
        $pasienT = pasien::all();
        $rawatT = rawat::all();
        return view('create.transaksi_create', compact('pasienT' ,'obatT','rawatT','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // ... (existing code)
    
    public function store(Request $request)
{
    $LogM = LogM::create([
        'id_user' => Auth::user()->id,
        'activity' => 'User Memproses Tambah Transaksi'
    ]);

    try {
        $request->validate([
            'no_transaksi' => 'required',
            'tanggal_transaksi' => 'required',
            'pasien_id' => 'required',
            'keluhan' => 'required',
            'obat_id' => 'required',
            'rawat_id' => 'required',
            'uang_bayar' => 'required',
        ]);

        $obat = Obat::find($request->input('obat_id'));
        $rawat = Rawat::find($request->input('rawat_id'));

        if (!$obat || !$rawat) {
            return redirect()->route('transaksi.create')->with('error', 'Produk tidak ditemukan.');
        }

        // Periksa apakah stok cukup untuk transaksi
        if ($obat->stok < 1) {
            return redirect()->route('transaksi.create')->with('error', 'Stok obat tidak mencukupi.');
        }

        // Kurangi stok obat
        $obat->stok--;
        $obat->save();

        $transaksi = new Transaksi;
        $transaksi->no_transaksi = $request->input('no_transaksi');
        $transaksi->tanggal_transaksi = $request->input('tanggal_transaksi');
        $transaksi->pasien_id = $request->input('pasien_id');
        $transaksi->keluhan = $request->input('keluhan');
        $transaksi->obat_id = $request->input('obat_id');
        $transaksi->rawat_id = $request->input('rawat_id');
        $transaksi->total_biaya = $obat->harga_obat + $rawat->harga;
        $transaksi->uang_bayar = $request->input('uang_bayar');
        $transaksi->uang_kembali = $transaksi->uang_bayar - $transaksi->total_biaya;
        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'Data Transaksi Berhasil ditambahkan.');
    } catch (\Exception $e) {
        // Handle any database-related errors here
        return redirect()->route('transaksi.create')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}








    // ... (existing code)


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Transaksi Edit Pages";
        $obatE = obat::all();
        $pasienE = pasien::all();
        $rawatE = rawat::all();
        $transaksiE = transaksi::find($id);
        return view('edit.transaksi_edit',compact('transaksiE','pasienE','obatE','rawatE','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $LogM = LogM::create([
        'id_user' => Auth::user()->id,
        'activity' => 'User Memproses Edit Transaksi'
    ]);
    try {
        $request->validate([
            'no_transaksi' => 'required',
            'tanggal_transaksi' => 'required|date',
            'pasien_id' => 'required',
            'keluhan' => 'required',
            'obat_id' => 'required',
            'rawat_id' => 'required',
            'uang_bayar' => 'required',
        ]);

        $t = transaksi::findOrFail($id);
        $obat = obat::find($request->input('obat_id'));
        $rawat = rawat::find($request->input('rawat_id'));

        if (!$obat || !$rawat) {
            return redirect()->route('transaksi.edit', $id)->with('error', 'Produk tidak ditemukan.');
        }

        $t->update([
            'no_transaksi' => $request->no_transaksi,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'pasien_id' => $request->pasien_id,
            'keluhan' => $request->keluhan,
            'obat_id' => $request->obat_id,
            'rawat_id' => $request->rawat_id,
            'total_biaya' => $obat->harga_obat + $rawat->harga,
            'uang_bayar' => $request->uang_bayar,
            'uang_kembali' => $request->uang_bayar - ($obat->harga_obat + $rawat->harga),
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Data Transaksi Berhasil diperbarui.');
    } catch (\Exception $e) {
        // Handle any database-related errors here
        return redirect()->route('transaksi.edit', $id)->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $td = transaksi::findOrFail($id);
        $td->delete();

        return redirect()->route('transaksi.index')->with('success', 'Data Pasien dihapus.');
    }
}
