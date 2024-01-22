<?php

namespace App\Http\Controllers;

use App\Models\LogM;
use App\Models\obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObatController extends Controller
{
    public function index()
    {
        $LogM = LogM::create([
            'id_user' => Auth::user()->id,
            'activity' => 'User Memasuki Halaman Data Obat'
        ]);
        $title = "Obat Pages";
        $obat = obat::search(request('search'))->paginate(10);
        $cariO = request('search');
        return view('view.obat_index', compact('obat','cariO','title','LogM'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $title = "Obat Tambah Pages";
        $obat = obat::all();
        return view('create.obat_create', compact('obat','title',));
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
            'activity' => 'User Memproses Tambah Data Obat'
        ]);

        $validatedData = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'dosis' => 'required', 
            'stok' => 'required', 
            'keterangan' => 'required',
            'harga_obat' => 'required',
        ]);
        

        $input = $request->all();

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            if ($image->isValid()) {
                $folderPath = 'assets/images/obat';
                $imgName = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($folderPath) , $imgName);
                $input['foto'] = $imgName;
            } else {
                return redirect()->back()->withErrors(['image' => 'invalid Image File. '])->withInput();
            }
        }

        obat::create($input);

        return redirect()->route('obat.index')->with('success', 'Data Obat Berhasil ditambahkan.');
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
        $title = "Obat Edit Pages";
        $obatE = obat::find($id);
        return view('edit.obat_edit',compact('obatE','title'));
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
        'activity' => 'User Memproses Edit Data Obat'
    ]);

    $validatedData = $request->validate([
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'nama_obat' => 'required',
        'jenis_obat' => 'required',
        'dosis' => 'required',
        'stok' => 'required',
        'keterangan' => 'required',
        'harga_obat' => 'required',
    ]);

    $o = obat::findOrFail($id);
    $input = $request->all();

    if ($request->hasFile('foto')) {
        $image = $request->file('foto');
        if ($image->isValid()) {
            $folderPath = 'assets/images/obat';
            $imgName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($folderPath), $imgName);
            $input['foto'] = $imgName;

            // Delete old image file if it exists
            if ($o->foto && file_exists(public_path($folderPath . '/' . $o->foto))) {
                unlink(public_path($folderPath . '/' . $o->foto));
            }
        } else {
            return redirect()->back()->withErrors(['image' => 'Invalid Image File.'])->withInput();
        }
    }

    $o->update($input);

    return redirect()->route('obat.index')->with('success', 'Data Obat Berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $od = obat::findOrFail($id);
        $od->delete();

        return redirect()->route('obat.index')->with('success', 'Data Obat Berhasil dihapus.');
    }
}
