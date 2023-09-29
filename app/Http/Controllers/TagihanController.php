<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class TagihanController extends Controller
{
    //
    public function index()
    {
        $tagihans=Tagihan::latest()->paginate(10);
        return view('tagihan.index', compact('tagihans'));
    }
    public function create()
    {
        return view('tagihan.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'no'=>'required',
            'biaya'=>'required',
            'tarif'=>'required',
            'jumlah'=>'required'
        ]);
        DB::table('tagihans')->insert([
            'no'=>$request->no,
            'biaya'=>$request->biaya,
            'tarif'=>$request->tarif,
            'jumlah'=>$request->jumlah
        ]);
        if(DB::table('tagihans')){
            return redirect()->route('tagihan.index')->with(['success'=>'Data berhasil disimpan']);
        }else{
            return redirect()->route('tagihan.index')->with(['error'=>'Data gagal disimpan']);
        }
    }
    public function edit(Tagihan $tagihan)
    {
        return view('tagihan.edit', compact('tagihan'));
    }
    public function destroy($id)
    {
        $tagihan = Tagihan::findOrFail($id);

        $tagihan->delete();
        if($tagihan){
            //redirect dengan pesan sukses
            return redirect()->route('tagihan.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('tagihan.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
    public function update(Request $request, Tagihan $tagihan)
    {
    $this->validate($request, [
        'no' => 'required',
        'biaya' => 'required',
        'tarif' => 'required',
        'jumlah' => 'required'
    ]);
    //get data siswa by ID
 
    $tagihan=Tagihan::findOrFail($tagihan->id); 
    $tagihan->update([
        'no'=>$request->no,
        'biaya'=>$request->biaya, 
        'tarif'=>$request->tarif,
        'jumlah'=>$request->jumlah
    ]); 
    if($tagihan){
    //redirect dengan pesan sukses
    return redirect()->route('tagihan.index')->with(['success'=>'Data berhasil 
    disimpan']);
    }else{
        return redirect()->route('tagihan.index')->with(['error'=>'Data gagal disimpan']);
    }
    }


}

