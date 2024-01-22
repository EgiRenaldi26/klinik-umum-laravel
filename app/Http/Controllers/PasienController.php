<?php

namespace App\Http\Controllers;

use App\Models\LogM;
use App\Models\pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Memasuki Halaman Data Pasien'
        ]);
        $title = "Pasien Pages";
        $pasien = pasien::search(request('search'))->paginate(10);
        $cariP = request('search');
        return view('view.pasien_index', compact('pasien','cariP','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Pasien Tambah Pages";
        $pasien = pasien::all();
        return view('create.pasien_create', compact('pasien','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Memproses Tambah Data Pasien'
        ]);
        $validatedData = $request->validate([
            'nama_pasien' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required', 
            'no_telp' => 'required',
        ]);

        pasien::create($validatedData);

        return redirect()->route('pasien.index')->with('success', 'Data Pasien Berhasil ditambahkan.');
    }

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
        $title = "Pasien Edit Pages";
        $pasienE = pasien::find($id);
        return view('edit.pasien_edit',compact('pasienE','title'));
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
            'activity' => 'User Memproses Edit Data Pasien'
        ]);
        $p = pasien::findOrFail($id);
        
        $p->update([
            'nama_pasien' =>$request->nama_pasien,
            'jenis_kelamin' =>$request->jenis_kelamin,
            'tanggal_lahir' =>$request->tanggal_lahir,
            'no_telp' =>$request->no_telp,
        ]);
        return redirect()->route('pasien.index')->with('success', 'Data Pasien Berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pd = pasien::findOrFail($id);
        $pd->delete();

        return redirect()->route('pasien.index')->with('success', 'Data Pasien Berhasil dihapus.');
    }
}
