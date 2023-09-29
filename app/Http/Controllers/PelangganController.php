<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class pelangganController extends Controller
{
    //
    public function index()
    {
        $pelanggans=Pelanggan::latest()->paginate(10);
        return view('pelanggan.index', compact('pelanggans'));
    }
    public function create()
    {
        return view('pelanggan.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'=>'required',
            'alamat'=>'required',
            'kode'=>'required',
            'no'=>'required'
        ]);
        DB::table('pelanggans')->insert([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'kode'=>$request->kode,
            'no'=>$request->no
        ]);
        if(DB::table('pelanggans')){
            return redirect()->route('pelanggan.index')->with(['success'=>'Data berhasil disimpan']);
        }else{
            return redirect()->route('pelanggan.index')->with(['error'=>'Data gagal disimpan']);
        }
    }
    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', compact('pelanggan'));
    }
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->delete();
        if($pelanggan){
            //redirect dengan pesan sukses
            return redirect()->route('pelanggan.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('pelanggan.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
    public function update(Request $request, Pelanggan $pelanggan)
    {
    $this->validate($request, [
        'nama' => 'required',
        'alamat' => 'required',
        'kode' => 'required',
        'no' => 'required'
    ]);
    //get data siswa by ID
 
    $pelanggan=pelanggan::findOrFail($pelanggan->id); 
    $pelanggan->update([
        'nama'=>$request->nama,
        'alamat'=>$request->alamat, 
        'kode'=>$request->kode,
        'no'=>$request->no
    ]); 
    if($pelanggan){
    //redirect dengan pesan sukses
    return redirect()->route('pelanggan.index')->with(['success'=>'Data berhasil 
    disimpan']);
    }else{
        return redirect()->route('pelanggan.index')->with(['error'=>'Data gagal disimpan']);
    }
    }


}




