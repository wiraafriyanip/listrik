<?php

namespace App\Http\Controllers;

use App\Models\Pengunjung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PengunjungController extends Controller
{
    //
    public function index()
    {
        $pengunjungs=Pengunjung::latest()->paginate(10);
        return view('pengunjung.index', compact('pengunjungs'));
    }
    public function create()
    {
        return view('pengunjung.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'=>'required',
            'alamat'=>'required',
            
            'nohp'=>'required'
        ]);
        DB::table('pengunjungs')->insert([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            
            'nohp'=>$request->nohp
        ]);
        if(DB::table('pengunjungs')){
            return redirect()->route('pengunjung.index')->with(['success'=>'Data berhasil disimpan']);
        }else{
            return redirect()->route('pengunjung.index')->with(['error'=>'Data gagal disimpan']);
        }
    }
    public function edit(Pengunjung $pengunjung)
    {
        return view('pengunjung.edit', compact('pengunjung'));
    }
    public function destroy($id)
    {
        $pengunjung = Pengunjung::findOrFail($id);

        $pengunjung->delete();
        if($pengunjung){
            //redirect dengan pesan sukses
            return redirect()->route('pengunjung.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('pengunjung.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
    public function update(Request $request, Pengunjung $pengunjung)
    {
    $this->validate($request, [
        'nama' => 'required',
        'alamat' => 'required',
       
        'nohp' => 'required'
    ]);
    //get data siswa by ID
 
    $pengunjung=Pengunjung::findOrFail($pengunjung->id); 
    $pengunjung->update([
        'nama'=>$request->nama,
        'alamat'=>$request->alamat, 
        
        'nohp'=>$request->nohp
    ]); 
    if($pengunjung){
    //redirect dengan pesan sukses
    return redirect()->route('pengunjung.index')->with(['success'=>'Data berhasil 
    disimpan']);
    }else{
        return redirect()->route('pengunjung.index')->with(['error'=>'Data gagal disimpan']);
    }
    }


}




