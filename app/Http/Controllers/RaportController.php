<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Raport;
use App\Models\Siswa;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RaportController extends Controller
{
    public function raport(){
        $semester = DB::table('semester')->get();
        $murid = Siswa::first();

        $siswa = Siswa::where('status','Siswa')
            ->where('siswas.staf_id',session('guru.id'))
            ->join('stafs', 'stafs.id', '=', 'siswas.staf_id')
            ->join('kelas', 'kelas.id', '=', 'siswas.kelas_id')
            ->join('pelajarans', 'pelajarans.id', '=', 'siswas.kelas_id')
            ->join('semester', 'semester.id', '=', 'pelajarans.semester_id')
            ->select('siswas.*', 'stafs.nama as walikelas','kelas.nama_kelas as kelas','pelajarans.semester_id','semester.tahun','semester.semester')
            ->get();

            return view('guru.raport.raport',[
                'siswa' => $siswa,
                'murid' => $murid,
                'semester' => $semester,
                'page' => 'Raport',
            ]);
            // dd($murid);
    }

    public function create($id){
        $siswa = Siswa::find($id);
        $raport = DB::table('siswas')
            ->where('status','Siswa')
            ->where('siswas.staf_id',session('guru.id'))
            ->where('siswas.id',$id)
            ->join('kelas', 'kelas.id', '=', 'siswas.kelas_id')
            ->join('pelajarans', 'pelajarans.kelas_id', '=', 'kelas.id')
            ->leftJoin('semester', 'semester.id', '=', 'pelajarans.semester_id')
            ->leftJoin('matpel', 'matpel.id', '=', 'pelajarans.matpel_id')
            ->select('siswas.*','pelajarans.id as pelajaran_id','pelajarans.semester_id','pelajarans.matpel_id','semester.tahun','semester.semester','matpel.nama_pelajaran')
            ->get();

        return view('guru.raport.post',[
        'raport' => $raport,
        'siswa' => $siswa,
        'page'=>'Raport'
        ]);

        // dd($siswa);
    }

    public function store(Request $request){
        $pelajaran = $request->pelajaran;
        foreach($pelajaran as $index=>$item){

            $store = new Raport();
            $store->siswa_id = $request->siswa;
            $store->pelajaran_id = $item;
            $store->nilai = $request->nilai[$index];
            $store -> save();
        }
        return redirect('/guru/raport')->with('success','Create data successfully!!');
    }

    public function show($id){


        return redirect('/guru/raport')->with('success','Create data successfully!!');
    }
}
