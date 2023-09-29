<?php

namespace App\Http\Controllers;

use App\Models\Lembur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class LemburController extends Controller
{
    //
    public function index()
    {
        $lemburs=Lembur::latest()->paginate(10);
        return view('lembur.index', compact('lemburs'));
    }
    public function create()
    {
        return view('lembur.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'=>'required',
            'tgl'=>'required',
            'total'=>'required',
        ]);
        DB::table('lemburs')->insert([
            'nama'=>$request->nama,
            'tgl'=>$request->tgl,
            'total'=>$request->total,
        ]);
        if(DB::table('lemburs')){
            return redirect()->route('lembur.index')->with(['success'=>'Data berhasil disimpan']);
        }else{
            return redirect()->route('lembur.index')->with(['error'=>'Data gagal disimpan']);
        }
    }
    public function edit(Lembur $lembur)
    {
        return view('lembur.edit', compact('lembur'));
    }
    public function destroy($id)
    {
        $lembur = Lembur::findOrFail($id);

        $lembur->delete();
        if($lembur){
            //redirect dengan pesan sukses
            return redirect()->route('lembur.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('lembur.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
    public function update(Request $request, Lembur $lembur)
    {
    $this->validate($request, [
        'nama' => 'required',
        'tgl' => 'required',
        'total' => 'required',
        
    ]);
    //get data siswa by ID
 
    $lembur=Lembur::findOrFail($lembur->id); 
    $lembur->update([
        'nama'=>$request->nama,
        'tgl'=>$request->tgl, 
        'total'=>$request->total,
        
    ]); 
    if($lembur){
    //redirect dengan pesan sukses
    return redirect()->route('lembur.index')->with(['success'=>'Data berhasil 
    disimpan']);
    }else{
        return redirect()->route('lembur.index')->with(['error'=>'Data gagal disimpan']);
    }
    }


}




