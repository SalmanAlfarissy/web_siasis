<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{

    public function kelas(){
        $kelas=DB::table('kelas')->get();
        return view('administrator.kelas.kelas',[
        'kelas' => $kelas,
        'page' => 'Kelas'
        ]);
    }

    public function create(){
        $kelas = new Kelas();
        return view('administrator.kelas.post', [
            'kelas' => $kelas,
            'page' => 'Kelas'
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nama_kelas'=>'required|max:255|unique:kelas'
        ]);

        $store = new kelas();
        $store -> id = null;
        $store -> nama_kelas = $validated['nama_kelas'];
        $store -> save();

        return redirect('/administrator/staf/kelas')->with('success','Create data successfully!!');
    }

    public function edit($id)
    {
        $edtstaf = Kelas::find($id);
        $page = 'Kelas';
        return view('administrator.kelas.update',compact('edtstaf','page'));
    }

    public function update(Request $request,$id)
    {
        //
        $validated = $request->validate([
            'nama_kelas'=>'required|max:255|unique:kelas'
        ]);

        $dtupdate=Kelas::find($id);
        $dtupdate -> nama_kelas = $validated['nama_kelas'];
        $dtupdate -> save();
        return redirect('/administrator/staf/kelas')->with('success','Update data successfully!!');

    }

    public function destroy($id)
    {
        //
        $dthapus=Kelas::find($id);
        $dthapus->delete();
        return back();
    }






}
