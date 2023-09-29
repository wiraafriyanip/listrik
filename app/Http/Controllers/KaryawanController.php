<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    //
    public function index()
    {
        $karyawans=Karyawan::latest()->paginate(10);
        return view('karyawan.index', compact('karyawans'));
    }
    public function create()
    {
        return view('karyawan.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'=>'required',
            'jk'=>'required',
            'no'=>'required',
        ]);
        DB::table('karyawans')->insert([
            'nama'=>$request->nama,
            'jk'=>$request->jk,
            'no'=>$request->no,
        ]);
        if(DB::table('karyawans')){
            return redirect()->route('karyawan.index')->with(['success'=>'Data berhasil disimpan']);
        }else{
            return redirect()->route('karyawan.index')->with(['error'=>'Data gagal disimpan']);
        }
    }
    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }
    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $karyawan->delete();
        if($karyawan){
            //redirect dengan pesan sukses
            return redirect()->route('karyawan.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('karyawan.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
    public function update(Request $request, Karyawan $karyawan)
    {
    $this->validate($request, [
        'nama' => 'required',
        'jk' => 'required',
        'no' => 'required',
        
    ]);
    //get data siswa by ID
 
    $karyawan=Karyawan::findOrFail($karyawan->id); 
    $karyawan->update([
        'nama'=>$request->nama,
        'jk'=>$request->jk, 
        'no'=>$request->no,
        
    ]); 
    if($karyawan){
    //redirect dengan pesan sukses
    return redirect()->route('karyawan.index')->with(['success'=>'Data berhasil 
    disimpan']);
    }else{
        return redirect()->route('karyawan.index')->with(['error'=>'Data gagal disimpan']);
    }
    }


}




