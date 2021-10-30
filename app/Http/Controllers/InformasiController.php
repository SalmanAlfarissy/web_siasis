<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformasiController extends Controller
{
    public function informasi(){
        $informasi=DB::table('Informasis')->get();
        return view('administrator.informasi.informasi',[
        'informasi' => $informasi,
        'page' => 'Informasi'
        ]);
    }

    public function create(){
        $post = new Informasi();
        return view('administrator.informasi.post', [
            'post' => $post,
            'page' => 'Informasi'
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'judul_info'=>'required|max:255|unique:informasis',
            'gambar_info'=>'required|image|max:512|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $store = new Informasi();
        $store -> id = null;
        $store -> judul_info = $validated['judul_info'];
        $store -> isi_info = ($request->isi_info != "") ? $request->isi_info : "" ;
        $store -> tgl_post = date(now());

        $nm = $validated['gambar_info'];
        $file_name = time().rand(100,99).".".$nm->getClientOriginalExtension();
        $validated['gambar_info']->move(public_path().'/gambar/informasi',$file_name);
        $path = $file_name;
        $store -> gambar_info = $path;
        $store -> save();

        return redirect('/administrator/staf/informasi')->with('success','Create data successfully!!');
    }

    public function edit($id)
    {
        $edtinformasi = Informasi::find($id);
        $page = 'Informasi';
        return view('administrator.informasi.update',compact('edtinformasi','page'));
    }

    public function update(Request $request,$id)
    {

        $validated = $request->validate([
            'judul_info'=>'max:255',
            'gambar_info'=>'image|max:512|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $dtupdate=Informasi::find($id);

        $dtupdate-> judul_info = $validated['judul_info'];
        $dtupdate -> isi_info = ($request->isi_info != "") ? $request->isi_info : "" ;

        $gbdefault = $dtupdate->gambar_info;
        ($request->gambar_info != "") ? $request->gambar_info->move(public_path().'/gambar/informasi',$gbdefault) : asset('gambar/informasi/'.$dtupdate->gambar_info);
        $dtupdate -> gambar_info = $gbdefault;

        $dtupdate -> save();
        return redirect('/administrator/staf/informasi')->with('success','Update data successfully!!');

    }


    public function destroy($id)
    {
        //
        $dthapus=Informasi::find($id);
        $file=public_path('/gambar/informasi/').$dthapus->gambar_info;
        if (file_exists($file)){
            @unlink($file);
        }
        $dthapus->delete();
        return back();
    }

}
