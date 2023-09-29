<?php

namespace App\Http\Controllers;

use App\Models\Loket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class LoketController extends Controller
{
    //
    public function index()
    {
        $lokets=Loket::latest()->paginate(10);
        return view('loket.index', compact('lokets'));
    }
    public function create()
    {
        return view('loket.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'kode'=>'required',
            'nama'=>'required',
            'alamat'=>'required',
        ]);
        DB::table('lokets')->insert([
            'kode'=>$request->kode,
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
        ]);
        if(DB::table('lokets')){
            return redirect()->route('loket.index')->with(['success'=>'Data berhasil disimpan']);
        }else{
            return redirect()->route('loket.index')->with(['error'=>'Data gagal disimpan']);
        }
    }
    public function edit(Loket $loket)
    {
        return view('loket.edit', compact('loket'));
    }
    public function destroy($id)
    {
        $loket = Loket::findOrFail($id);

        $loket->delete();
        if($loket){
            //redirect dengan pesan sukses
            return redirect()->route('loket.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('loket.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
    public function update(Request $request, Loket $loket)
    {
    $this->validate($request, [
        'kode' => 'required',
        'nama' => 'required',
        'alamat' => 'required',
        
    ]);
    //get data siswa by ID
 
    $loket=Loket::findOrFail($loket->id); 
    $loket->update([
        'kode'=>$request->kode,
        'nama'=>$request->nama, 
        'alamat'=>$request->alamat,
        
    ]); 
    if($loket){
    //redirect dengan pesan sukses
    return redirect()->route('loket.index')->with(['success'=>'Data berhasil 
    disimpan']);
    }else{
        return redirect()->route('loket.index')->with(['error'=>'Data gagal disimpan']);
    }
    }


}




