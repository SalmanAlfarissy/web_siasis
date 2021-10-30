<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Staf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    //

    public function siswa(){
        $siswa = Siswa::where('status','Siswa')
        ->join('stafs', 'stafs.id', '=', 'siswas.staf_id')
        ->join('kelas', 'kelas.id', '=', 'siswas.kelas_id')
        ->select('siswas.*', 'stafs.nama as walikelas','kelas.nama_kelas as kelas')
        ->get();

        $siswa2 = Siswa::where('status','Siswa')
            ->where('staf_id',session('guru.id'))
            ->join('stafs', 'stafs.id', '=', 'siswas.staf_id')
            ->join('kelas', 'kelas.id', '=', 'siswas.kelas_id')
            ->select('siswas.*', 'stafs.nama as walikelas','kelas.nama_kelas as kelas')
            ->get();

        if(!empty(session('admin'))){
            return view('administrator.siswa.siswa',[
                'siswa' => $siswa,
                'page' => 'Siswa'
                ]);
        }else {
            return view('guru.siswa.siswa',[
                'siswa' => $siswa2,
                'page' => 'Siswa'
                ]);

        }

    }

    public function create(){
        $kelas = DB::table('kelas')->get();
        $staf = Staf::where('level','guru')->get();
        $siswa = new Siswa();
        return view('administrator.siswa.post', [
            'siswa' => $siswa,
            'kelas' => $kelas,
            'staf' => $staf,
            'page' => 'Siswa'
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nis'=>'required|size:5|unique:siswas',
            'nama'=>'required|max:255',
            'password'=>'required|min:5|max:255',
            'email'=>'required|email:dns|unique:siswas',
            'staf_id'=>'required',
            'kelas_id'=>'required',
            'gender'=>'required',
            'status'=>'required',
            'foto_siswa'=>'required|image|max:512|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $store = new Siswa();
        $store -> id = null;
        $store -> nis = $validated['nis'];
        $store -> nama = $validated['nama'];
        $validated['password'] = Hash::make($validated['password']);
        $store -> password = $validated['password'];
        $store -> email = $validated['email'];
        $store -> staf_id = $validated['staf_id'];
        $store -> jurusan = ($request-> jurusan != "") ? $request-> jurusan : "";
        $store -> kelas_id = $validated['kelas_id'];
        $store -> gender = $validated['gender'];
        $store -> status = $validated['status'];
        $store -> tgl_lahir = ($request-> tgl_lahir != "") ? $request-> tgl_lahir : date(now());

        $nm = $validated['foto_siswa'];
        $file_name = time().rand(100,99).".".$nm->getClientOriginalExtension();
        $validated['foto_siswa']->move(public_path().'/gambar/siswa',$file_name);
        $path = $file_name;
        $store -> foto_siswa = $path;
        $store -> save();

        return redirect('/administrator/staf/siswa')->with('success','Create data successfully!!');
    }

    public function edit($id)
    {
        $kelas = DB::table('kelas')->get();
        $staf = Staf::where('level','guru')->get();
        $edtsiswa = DB::table('siswas')
            ->join('stafs', 'stafs.id', '=', 'siswas.staf_id')
            ->join('kelas', 'kelas.id', '=', 'siswas.kelas_id')
            ->select('siswas.*', 'stafs.nama as walikelas','kelas.nama_kelas as kelas')
            ->where('siswas.id',$id)
            ->first();
        $page = 'Siswa';
        return view('administrator.siswa.update',compact('edtsiswa','page','kelas','staf'));
        // dd($edtsiswa);
    }

    public function update(Request $request,$id)
    {
        //

        $validated = $request->validate([

            'nama'=>'required|max:255',
            'email'=>'required|email:dns',
            'staf_id'=>'required',
            'kelas_id'=>'required',
            'gender'=>'required',
            'status'=>'required',
            'foto_siswa'=>'image|max:512|mimes:jpeg,png,jpg,gif,svg'

        ]);

        $dtupdate=Siswa::find($id);

        $dtupdate -> nama = $validated['nama'];
        $dtupdate -> email = $validated['email'];
        $dtupdate -> gender = $validated['gender'];
        $dtupdate -> staf_id = $validated['staf_id'];
        $dtupdate -> jurusan = ($request-> jurusan != "") ? $request-> jurusan : "";
        $dtupdate -> kelas_id = $validated['kelas_id'];
        $dtupdate -> status = $validated['status'];

        $gbdefault = $dtupdate->foto_siswa;
        ($request->foto_siswa != "") ? $request->foto_siswa->move(public_path().'/gambar/siswa',$gbdefault) : asset('gambar/siswa/'.$dtupdate->foto_siswa);
        $dtupdate -> foto_siswa = $gbdefault;

        $dtupdate -> save();
        return redirect('/administrator/staf/siswa')->with('success','Update data successfully!!');

    }

    public function destroy($id)
    {
        //
        $dthapus=Siswa::find($id);
        $file=public_path('/gambar/siswa/').$dthapus->foto_siswa;
        if (file_exists($file)){
            @unlink($file);
        }
        $dthapus->delete();
        return back();
    }
}
