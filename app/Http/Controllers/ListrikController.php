<?php

namespace App\Http\Controllers;

use App\Models\Listrik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ListrikController extends Controller
{
    //
    public function index()
    {
        $listriks=Listrik::latest()->paginate(10);
        return view('listrik.index', compact('listriks'));
    }
    public function create()
    {
        return view('listrik.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'kode'=>'required',
            'gol'=>'required',
            'daya'=>'required',
            'tarif'=>'required'
        ]);
        DB::table('listriks')->insert([
            'kode'=>$request->kode,
            'gol'=>$request->gol,
            'daya'=>$request->daya,
            'tarif'=>$request->tarif
        ]);
        if(DB::table('listriks')){
            return redirect()->route('listrik.index')->with(['success'=>'Data berhasil disimpan']);
        }else{
            return redirect()->route('listrik.index')->with(['error'=>'Data gagal disimpan']);
        }
    }
    public function edit(listrik $listrik)
    {
        return view('listrik.edit', compact('listrik'));
    }
    public function destroy($id)
    {
        $listrik = listrik::findOrFail($id);

        $listrik->delete();
        if($listrik){
            //redirect dengan pesan sukses
            return redirect()->route('listrik.index')->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('listrik.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
    public function update(Request $request, listrik $listrik)
    {
    $this->validate($request, [
        'kode' => 'required',
        'gol' => 'required',
        'daya' => 'required',
        'tarif' => 'required'
    ]);
    //get data siswa by ID
 
    $listrik=listrik::findOrFail($listrik->id); 
    $listrik->update([
        'kode'=>$request->kode,
        'gol'=>$request->gol, 
        'daya'=>$request->daya,
        'tarif'=>$request->tarif
    ]); 
    if($listrik){
    //redirect dengan pesan sukses
    return redirect()->route('listrik.index')->with(['success'=>'Data berhasil 
    disimpan']);
    }else{
        return redirect()->route('listrik.index')->with(['error'=>'Data gagal disimpan']);
    }
    }


}




