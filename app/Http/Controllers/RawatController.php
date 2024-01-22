<?php

namespace App\Http\Controllers;

use App\Models\LogM;
use App\Models\rawat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RawatController extends Controller
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
            'activity' => 'User Memasuki Halaman Data Rawat'
        ]);

        $title = "Rawat Pages";
        $rawat = rawat::search(request('search'))->paginate(10);
        $cariR = request('search');
        return view('view.rawat_index', compact('rawat','cariR','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Rawat Tambah Pages";
        $rawat = rawat::all();
        return view('create.rawat_create', compact('rawat','title'));
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
            'activity' => 'User Memproses Tambah Data Rawat'
        ]);
        $validatedData = $request->validate([
            'lama_rawat' => 'required',
            'harga' => 'required', 
        ]);

        rawat::create($validatedData);

        return redirect()->route('rawat.index')->with('success', 'Data Rawat Berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     
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
        $title = "Rawat Edit Pages";
        $rawatE = rawat::find($id);
        return view('edit.rawat_edit',compact('rawatE','title'));
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
            'activity' => 'User Memproses Edit Data Rawat'
        ]);
        $r = rawat::findOrFail($id);
        
        $r->update([
            'lama_rawat' =>$request->lama_rawat,
            'harga' =>$request->harga,
        ]);
        return redirect()->route('rawat.index')->with('success', 'Data Rawat diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rd = rawat::findOrFail($id);
        $rd->delete();

        return redirect()->route('rawat.index')->with('success', 'Data Rawat dihapus.');
    }
}
