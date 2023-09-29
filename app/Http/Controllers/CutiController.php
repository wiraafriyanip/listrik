<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CutiController extends Controller
{
    //
    public function index()
    {
        $cutis=Cuti::latest()->paginate(10);
        return view('cuti.index', compact('cutis'));
    }
    public function create()
    {
        return view('cuti.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'namakaryawan'=>'required',
            'tgl'=>'required',
            'jumlah'=>'required',
        ]);
        DB::table('cutis')->insert([
            'namakaryawan'=>$request->namakaryawan,
            'tgl'=>$request->tgl,
            'jumlah'=>$request->jumlah,
        ]);
        if(DB::table('cutis')){
            return redirect()->route('cuti.index')->with(['success'=>'Data berhasil disimpan']);
        }else{
            return redirect()->route('cuti.index')->with(['error'=>'Data gagal disimpan']);
        }
    }
    public function edit(Cuti $cuti)
    {
        return view('cuti.edit', compact('cuti'));
    }
    public function destroy($id)
    {
        $cuti = cuti::findOrFail($id);

        $cuti->delete();
        if($cuti){
            //redirect dengan pesan sukses
            return redirect()->route('cuti.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('cuti.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
    public function update(Request $request, Cuti $cuti)
    {
    $this->validate($request, [
        'namakaryawan' => 'required',
        'tgl' => 'required',
        'jumlah' => 'required',
        
    ]);
    //get data siswa by ID
 
    $cuti=Cuti::findOrFail($cuti->id); 
    $cuti->update([
        'namakaryawan'=>$request->namakaryawan,
        'tgl'=>$request->tgl, 
        'jumlah'=>$request->jumlah,
        
    ]); 
    if($cuti){
    //redirect dengan pesan sukses
    return redirect()->route('cuti.index')->with(['success'=>'Data berhasil 
    disimpan']);
    }else{
        return redirect()->route('cuti.index')->with(['error'=>'Data gagal disimpan']);
    }
    }


}




