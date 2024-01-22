<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Users Pages";
        $user = User::all();
        return view('view.users' , compact('user','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Users Tambah Pages";
        $user = User::all();
        return view('create.user_create', compact('user','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // Validasi data yang diterima dari formulir
       $validatedData = $request->validate([
        'name' => 'required',
        'username' => 'required',
        'password' => 'required',
        'password_confirm' => 'required|same:password',
        'role' => 'required',
    ]);

    //  Validasi data yang diterima dari formulir
         $user = new User([
            'name' => $validatedData['name'],
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']), // Hash the password
            'role' => $validatedData['role'],
        ]);

        // Simpan data siswa ke dalam database
        $user->save();

        return redirect()->route('user.index')->with('success', 'Data Role Berhasil ditambahkan.');
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
        $title = "Users Edit Pages";
        $userE = User::find($id);
        return view('edit.user_edit',compact('userE','title'));
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
        $u = User::findOrFail($id);
        
        $u->update([
            'name' => $request->name,
            'username' => $request->username,  
            'password' => Hash::make($request->password),  
            'role' => $request->role,  
           
        ]);
        return redirect()->route('user.index')->with('success', 'Data Obat diperbarui.');
    }

    public function changepassword($id) {
        $title = "Change Password";
        $userCF = User::findOrFail($id);
        return view('user_changepassword',compact('userCF','title'));
    }

    public function change(Request $request,$id) {
        $request->validate([
            'password_new' => 'required',
            'password_confirm' => 'required|same:password_new',
        ]);
        $users = User::where("id",$id)->first();
        $users->update([
            'password' => Hash::make($request->password_new),
        ]);
        return redirect()->route('user.index')->with('success','Kata sandi berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ud = User::findOrFail($id);
        $ud->delete();

        return redirect()->route('user.index')->with('success', 'Data Pasien dihapus.');
    }
}
