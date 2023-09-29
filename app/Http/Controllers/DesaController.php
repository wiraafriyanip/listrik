<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class DesaController extends Controller
{
    //
    public function index()
    {
        $desas=Desa::latest()->paginate(10);
        return view('desa.index', compact('desas'));
    }
    public function create()
    {
        return view('desa.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'kode'=>'required',
            'nama'=>'required',
            'kec'=>'required',
        ]);
        DB::table('desas')->insert([
            'kode'=>$request->kode,
            'nama'=>$request->nama,
            'kec'=>$request->kec,
        ]);
        if(DB::table('desas')){
            return redirect()->route('desa.index')->with(['success'=>'Data berhasil disimpan']);
        }else{
            return redirect()->route('desa.index')->with(['error'=>'Data gagal disimpan']);
        }
    }
    public function edit(Desa $desa)
    {
        return view('desa.edit', compact('desa'));
    }
    public function destroy($id)
    {
        $desa = desa::findOrFail($id);

        $desa->delete();
        if($desa){
            //redirect dengan pesan sukses
            return redirect()->route('desa.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('desa.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
    public function update(Request $request, Desa $desa)
    {
    $this->validate($request, [
        'kode' => 'required',
        'nama' => 'required',
        'kec' => 'required',
        
    ]);
    //get data siswa by ID
 
    $desa=Desa::findOrFail($desa->id); 
    $desa->update([
        'kode'=>$request->kode,
        'nama'=>$request->nama, 
        'kec'=>$request->kec,
        
    ]); 
    if($desa){
    //redirect dengan pesan sukses
    return redirect()->route('desa.index')->with(['success'=>'Data berhasil 
    disimpan']);
    }else{
        return redirect()->route('desa.index')->with(['error'=>'Data gagal disimpan']);
    }
    }


}




