<?php

namespace App\Http\Controllers;

use App\Models\Matpel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatpelController extends Controller
{
    public function matpel(){
        $matpel=DB::table('matpel')->get();
        return view('administrator.matpel.matpel',[
        'matpel' => $matpel,
        'page' => 'Matpel'
        ]);
    }

    public function create(){
        $matpel = new Matpel();
        return view('administrator.matpel.post', [
            'matpel' => $matpel,
            'page' => 'Matpel'
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nama_pelajaran'=>'required|max:255|unique:matpel'
        ]);

        $store = new Matpel();
        $store -> id = null;
        $store -> nama_pelajaran = $validated['nama_pelajaran'];
        $store -> save();

        return redirect('/administrator/staf/mata_pelajaran')->with('success','Create data successfully!!');
    }

    public function edit($id)
    {
        $edtmatpel = Matpel::find($id);
        $page = 'Matpel';
        return view('administrator.matpel.update',compact('edtmatpel','page'));
    }

    public function update(Request $request,$id)
    {
        //
        $validated = $request->validate([
            'nama_pelajaran'=>'required|max:255|unique:matpel'
        ]);

        $dtmatpel=Matpel::find($id);
        $dtmatpel -> nama_pelajaran = $validated['nama_pelajaran'];
        $dtmatpel -> save();
        return redirect('/administrator/staf/mata_pelajaran')->with('success','Update data successfully!!');

    }

    public function destroy($id)
    {
        //
        $dthapus=Matpel::find($id);
        $dthapus->delete();
        return back();
    }
}
