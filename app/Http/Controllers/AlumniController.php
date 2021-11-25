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
            'nama_univ_kantor'=>'max:255',
            'jurusan'=>'max:255',
            'jabatan'=>'max:255',
            'tahun_mulai'=>'size:4',
            'tahun_selesai'=>'size:4',
            'alamat_kantor'=>'max:255',

        ]);

        $store = new Alumni();
        $store -> id = null;
        $store -> siswa_id = $validated['siswa_id'];
        $store -> pekerjaan = ($validated['pekerjaan'] != "") ? $validated['pekerjaan'] : "";
        $store -> nama_univ_kantor = ($validated['nama_univ_kantor'] != "") ? $validated['nama_univ_kantor'] : "";
        $store -> jurusan = ($validated['jurusan'] != "") ? $validated['jurusan'] : "";
        $store -> jabatan = ($validated['jabatan'] != "") ? $validated['jabatan'] : "";
        $store -> tahun_mulai = ($validated['tahun_mulai'] != "") ? $validated['tahun_mulai'] : "";
        $store -> tahun_selesai = ($validated['tahun_selesai'] != "") ? $validated['tahun_selesai'] : "";
        $store -> alamat_kantor = ($validated['alamat_kantor'] != "") ? $validated['alamat_kantor'] : "";

        // $nm = $validated['foto'];
        // $file_name = time().rand(100,99).".".$nm->getClientOriginalExtension();
        // $validated['foto']->move(public_path().'/gambar/alumni',$file_name);
        // $path = $file_name;
        // $store -> foto = $path;
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
            'nama_univ_kantor'=>'max:255',
            'jurusan'=>'max:255',
            'jabatan'=>'max:255',
            'tahun_mulai'=>'size:4',
            'tahun_selesai'=>'size:4',
            'alamat_kantor'=>'max:255'

        ]);

        $dtupdate=Alumni::find($id);


        $dtupdate -> siswa_id = $validated['siswa_id'];
        $dtupdate -> pekerjaan = ($validated['pekerjaan'] != "") ? $validated['pekerjaan'] : "";
        $dtupdate -> nama_univ_kantor = ($validated['nama_univ_kantor'] != "") ? $validated['nama_univ_kantor'] : "";
        $dtupdate -> jurusan = ($validated['jurusan'] != "") ? $validated['jurusan'] : "";
        $dtupdate -> jabatan = ($validated['jabatan'] != "") ? $validated['jabatan'] : "";
        $dtupdate -> tahun_mulai = ($validated['tahun_mulai'] != "") ? $validated['tahun_mulai'] : "";
        $dtupdate -> tahun_selesai = ($validated['tahun_selesai'] != "") ? $validated['tahun_selesai'] : "";
        $dtupdate -> alamat_kantor = ($validated['alamat_kantor'] != "") ? $validated['alamat_kantor'] : "";

        // $nm = $validated['foto'];
        // $file_name = time().rand(100,99).".".$nm->getClientOriginalExtension();
        // $validated['foto']->move(public_path().'/gambar/alumni',$file_name);
        // $path = $file_name;
        // $dtupdate -> foto = $path;
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
