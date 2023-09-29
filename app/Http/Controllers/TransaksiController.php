<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    //
    public function index()
    {
        $transaksis=Transaksi::latest()->paginate(10);
        return view('transaksi.index', compact('transaksis'));
    }
    public function create()
    {
        return view('transaksi.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'nomor'=>'required',
            'tgl'=>'required',
            'total'=>'required',
        ]);
        DB::table('transaksis')->insert([
            'nomor'=>$request->nomor,
            'tgl'=>$request->tgl,
            'total'=>$request->total,
        ]);
        if(DB::table('transaksis')){
            return redirect()->route('transaksi.index')->with(['success'=>'Data berhasil disimpan']);
        }else{
            return redirect()->route('transaksi.index')->with(['error'=>'Data gagal disimpan']);
        }
    }
    public function edit(Transaksi $transaksi)
    {
        return view('transaksi.edit', compact('transaksi'));
    }
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $transaksi->delete();
        if($transaksi){
            //redirect dengan pesan sukses
            return redirect()->route('transaksi.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('transaksi.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
    public function update(Request $request, Transaksi $transaksi)
    {
    $this->validate($request, [
        'nomor' => 'required',
        'tgl' => 'required',
        'total' => 'required',
        
    ]);
    //get data siswa by ID
 
    $transaksi=Transaksi::findOrFail($transaksi->id); 
    $transaksi->update([
        'nomor'=>$request->nomor,
        'tgl'=>$request->tgl, 
        'total'=>$request->total,
        
    ]); 
    if($transaksi){
    //redirect dengan pesan sukses
    return redirect()->route('transaksi.index')->with(['success'=>'Data berhasil 
    disimpan']);
    }else{
        return redirect()->route('transaksi.index')->with(['error'=>'Data gagal disimpan']);
    }
    }


}




