<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumniController extends Controller
{
    public function alumni(){

        $alumni = DB::table('alumnis')
        ->join('siswas', 'siswas.id', '=', 'alumnis.siswa_id')
        ->select('siswas.nis','siswas.nama', 'alumnis.*')
        ->get();

        return view('administrator.alumni.alumni',[
        'alumni' => $alumni,
        'page' => 'Alumni'
        ]);

    }

    public function create(){

        $siswa =  Siswa::where('status','Alumni')->get();
        $alumni = new Alumni();
        return view('administrator.alumni.post', [
            'siswa' => $siswa,
            'alumni'=> $alumni,
            'page' => 'Alumni'
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'siswa_id'=>'required|max:255',
            'pekerjaan'=>'max:255',
            'jabatan'=>'max:255',
            'tahun_lulus'=>'size:4',
            'jurusan'=>'max:255',
            'email'=>'email:dns|unique:alumnis',
            'nohp'=>'numeric',
            'nama_univ'=>'max:255',

            'foto'=>'required|image|max:512|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $store = new Alumni();
        $store -> id = null;
        $store -> siswa_id = $validated['siswa_id'];
        $store -> pekerjaan = ($validated['pekerjaan'] != "") ? $validated['pekerjaan'] : "";
        $store -> jabatan = ($validated['jabatan'] != "") ? $validated['jabatan'] : "";
        $store -> tahun_lulus = ($validated['tahun_lulus'] != "") ? $validated['tahun_lulus'] : "";
        $store -> jurusan = ($validated['jurusan'] != "") ? $validated['jurusan'] : "";
        $store -> email = ($validated['email'] != "") ? $validated['email'] : "";
        $store -> nohp = ($validated['nohp'] != "") ? $validated['nohp'] : "";
        $store -> nama_univ = ($validated['nama_univ'] != "") ? $validated['nama_univ'] : "";
        $store -> alamat = ($request-> alamat != "") ? $request-> alamat : "";

        $nm = $validated['foto'];
        $file_name = time().rand(100,99).".".$nm->getClientOriginalExtension();
        $validated['foto']->move(public_path().'/gambar/alumni',$file_name);
        $path = $file_name;
        $store -> foto = $path;
        $store -> save();

        return redirect('/administrator/staf/data_alumni')->with('success','Create data successfully!!');
    }

    public function edit($id)
    {
        $siswa = Siswa::where('status','Alumni')->get();
        $edtalumni = DB::table('alumnis')
            ->join('siswas', 'siswas.id', '=', 'alumnis.siswa_id')
            ->select('siswas.nis', 'siswas.nama','alumnis.*')
            ->where('alumnis.id',$id)
            ->first();
        $page = 'Alumni';
        return view('administrator.alumni.update',compact('edtalumni','page','siswa'));
    }

    public function update(Request $request,$id)
    {
        //

        $validated = $request->validate([
            'siswa_id'=>'required|max:255',
            'pekerjaan'=>'max:255',
            'jabatan'=>'max:255',
            'tahun_lulus'=>'size:4',
            'jurusan'=>'max:255',
            'email'=>'email:dns',
            'nohp'=>'numeric',
            'nama_univ'=>'max:255',

            'foto'=>'image|max:512|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $dtupdate=Alumni::find($id);

        $dtupdate -> siswa_id = $validated['siswa_id'];
        $dtupdate -> pekerjaan = ($validated['pekerjaan'] != "") ? $validated['pekerjaan'] : "";
        $dtupdate -> jabatan = ($validated['jabatan'] != "") ? $validated['jabatan'] : "";
        $dtupdate -> tahun_lulus = ($validated['tahun_lulus'] != "") ? $validated['tahun_lulus'] : "";
        $dtupdate -> jurusan = ($validated['jurusan'] != "") ? $validated['jurusan'] : "";
        $dtupdate -> email = ($validated['email'] != "") ? $validated['email'] : "";
        $dtupdate -> nohp = ($validated['nohp'] != "") ? $validated['nohp'] : "";
        $dtupdate -> nama_univ = ($validated['nama_univ'] != "") ? $validated['nama_univ'] : "";
        $dtupdate -> alamat = ($request-> alamat != "") ? $request-> alamat : "";

        $gbdefault = $dtupdate->foto;
        ($request->foto != "") ? $request->foto->move(public_path().'/gambar/alumni',$gbdefault) : asset('gambar/alumni/'.$dtupdate->foto);
        $dtupdate -> foto = $gbdefault;

        $dtupdate -> save();
        return redirect('/administrator/staf/data_alumni')->with('success','Update data successfully!!');

    }

    public function destroy($id)
    {
        //
        $dthapus=Alumni::find($id);
        $file=public_path('/gambar/alumni/').$dthapus->foto;
        if (file_exists($file)){
            @unlink($file);
        }
        $dthapus->delete();
        return back();
    }
}
