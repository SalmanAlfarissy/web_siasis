<?php

namespace App\Http\Controllers;

use App\Models\Pelajaran;
use App\Models\Staf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelajaranController extends Controller
{
    public function pelajaran(){
        $pelajaran =  DB::table('pelajarans')
        ->join('kelas', 'kelas.id', '=', 'pelajarans.kelas_id')
        ->join('stafs', 'stafs.id', '=', 'pelajarans.staf_id')
        ->join('semester', 'semester.id', '=', 'pelajarans.semester_id')
        ->join('matpel', 'matpel.id', '=', 'pelajarans.matpel_id')
        ->select('pelajarans.*', 'stafs.nama as guru','kelas.nama_kelas as kelas', 'semester.semester', 'matpel.nama_pelajaran')
        ->get();

        // $pelajaran2 = Pelajaran::where('staf_id',session('guru.id'))
        // ->join('kelas', 'kelas.id', '=', 'pelajarans.kelas_id')
        // ->join('stafs', 'stafs.id', '=', 'pelajarans.staf_id')
        // ->join('semester', 'semester.id', '=', 'pelajarans.semester_id')
        // ->join('matpel', 'matpel.id', '=', 'pelajarans.matpel_id')
        // ->select('pelajarans.*', 'stafs.nama as guru','kelas.nama_kelas as kelas', 'semester.semester', 'matpel.nama_pelajaran')
        // ->get();

        if (!empty(session('admin'))){
            return view('administrator.jadwal.jadwal',[
                'pelajaran' => $pelajaran,
                'page' => 'JadwalPelajaran'
                ]);
        }else{
            return view('guru.jadwal.jadwal',[
                'pelajaran' => $pelajaran,
                'page' => 'JadwalPelajaran'
                ]);
            // dd($pelajaran2);
        }
    }

    public function create(){
        $kelas = DB::table('kelas')->get();
        $semester = DB::table('semester')->get();
        $matpel = DB::table('matpel')->get();
        $staf = Staf::where('level','guru')->get();
        $pelajaran = new Pelajaran();
        return view('administrator.jadwal.post', [
            'pelajaran' => $pelajaran,
            'kelas' => $kelas,
            'staf' => $staf,
            'semester' => $semester,
            'matpel' => $matpel,
            'page' => 'JadwalPelajaran'
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'staf_id'=>'required',
            'kelas_id'=>'required',
            'semester_id'=>'required',
            'matpel_id'=>'required',
            'kkm'=>'required',
            'hari'=>'required',
            'jadwal_masuk'=>'required|date_format:H:i',
            'jadwal_keluar'=>'required|date_format:H:i'
        ]);

        $store = new Pelajaran();
        $store -> id = null;
        $store -> staf_id = $validated['staf_id'];
        $store -> kelas_id = $validated['kelas_id'];
        $store -> semester_id = $validated['semester_id'];
        $store -> matpel_id = $validated['matpel_id'];
        $store -> kkm = $validated['kkm'];
        $store -> hari = $validated['hari'];
        $store -> jadwal_masuk = $validated['jadwal_masuk'];
        $store -> jadwal_keluar = $validated['jadwal_keluar'];
        $store -> save();

        return redirect('/administrator/staf/jadwal_pelajaran')->with('success','Create data successfully!!');
    }

    public function edit($id)
    {
        $kelas = DB::table('kelas')->get();
        $semester = DB::table('semester')->get();
        $matpel = DB::table('matpel')->get();
        $staf = Staf::where('level','guru')->get();

        $edtpelajaran = DB::table('pelajarans')
            ->join('kelas', 'kelas.id', '=', 'pelajarans.kelas_id')
            ->join('stafs', 'stafs.id', '=', 'pelajarans.staf_id')
            ->join('semester', 'semester.id', '=', 'pelajarans.kelas_id')
            ->join('matpel', 'matpel.id', '=', 'pelajarans.kelas_id')
            ->select('pelajarans.*', 'stafs.nama as guru','kelas.nama_kelas as kelas', 'semester.semester', 'matpel.nama_pelajaran')
            ->where('pelajarans.id',$id)
            ->first();
        $page = 'JadwalPelajaran';

        return view('administrator.jadwal.update',compact('edtpelajaran','page','kelas','staf','semester','matpel'));


    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'staf_id'=>'required',
            'kelas_id'=>'required',
            'semester_id'=>'required',
            'matpel_id'=>'required',
            'kkm'=>'required',
            'hari'=>'required',
            'jadwal_masuk'=>'required|date_format:H:i',
            'jadwal_keluar'=>'required|date_format:H:i'
        ]);

        $dtupdate=Pelajaran::find($id);

        $dtupdate -> staf_id = $validated['staf_id'];
        $dtupdate -> kelas_id = $validated['kelas_id'];
        $dtupdate -> semester_id = $validated['semester_id'];
        $dtupdate -> matpel_id = $validated['matpel_id'];
        $dtupdate -> kkm = $validated['kkm'];
        $dtupdate -> hari = $validated['hari'];
        $dtupdate -> jadwal_masuk = $validated['jadwal_masuk'];
        $dtupdate -> jadwal_keluar = $validated['jadwal_keluar'];

        $dtupdate -> save();
        // dd($dtupdate);
        return redirect('/administrator/staf/jadwal_pelajaran')->with('success','Update data successfully!!');

    }

    public function destroy($id)
    {
        $dthapus=Pelajaran::find($id);
        $dthapus->delete();
        return back();
    }

}
