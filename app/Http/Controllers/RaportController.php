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
        // return request()->all();
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

    public function show($id)
    {
        $siswa=Siswa::find($id);

        $semester=DB::table('raports')
        ->where('siswa_id',$id)
        ->join('pelajarans','pelajarans.id','raports.pelajaran_id')
        ->join('kelas','kelas.id','pelajarans.kelas_id')
        ->leftJoin('semester', 'semester.id', '=', 'pelajarans.semester_id')
        ->leftJoin('matpel', 'matpel.id', '=', 'pelajarans.matpel_id')
        ->select('kelas.nama_kelas as kelas','semester.tahun as tahun','semester.semester as semester')
        ->first();

        $raport = DB::table('raports')
            ->where('siswa_id',$id)
            ->join('pelajarans','pelajarans.id','raports.pelajaran_id')
            ->leftJoin('semester', 'semester.id', '=', 'pelajarans.semester_id')
            ->leftJoin('matpel', 'matpel.id', '=', 'pelajarans.matpel_id')
            ->select('matpel.nama_pelajaran as pelajaran','semester.semester','pelajarans.kkm','raports.nilai')
            ->get();

        return view('guru.raport.show',[
            'raport'=>$raport,
            'semester'=>$semester,
            'siswa'=>$siswa,
            'page'=>'Raport'
        ]);
        // dd($semester);
    }

    public function edit($id)
    {
        $siswa=Siswa::find($id);

        $semester=DB::table('raports')
        ->where('siswa_id',$id)
        ->join('pelajarans','pelajarans.id','raports.pelajaran_id')
        ->join('kelas','kelas.id','pelajarans.kelas_id')
        ->leftJoin('semester', 'semester.id', '=', 'pelajarans.semester_id')
        ->leftJoin('matpel', 'matpel.id', '=', 'pelajarans.matpel_id')
        ->select('kelas.nama_kelas as kelas','semester.tahun as tahun','semester.semester as semester')
        ->first();

        $raport = DB::table('raports')
            ->where('siswa_id',$id)
            ->join('pelajarans','pelajarans.id','raports.pelajaran_id')
            ->leftJoin('semester', 'semester.id', '=', 'pelajarans.semester_id')
            ->leftJoin('matpel', 'matpel.id', '=', 'pelajarans.matpel_id')
            ->select('raports.id as raport_id','matpel.nama_pelajaran as pelajaran','pelajarans.id as pelajaran_id','semester.semester','pelajarans.kkm','raports.nilai')
            ->get();

            // dd($raport);
        return view('guru.raport.update',[
            'raport'=>$raport,
            'semester'=>$semester,
            'siswa'=>$siswa,
            'page'=>'Raport'
        ]);
    }

    public function update(Request $request,$id){

        $pelajaran = $request->pelajaran;

        foreach($pelajaran as $index=>$item){
            $update =Raport::find($request->raport_id[$index]);
            $update->pelajaran_id = $item;
            $update->nilai = $request->nilai[$index];
            $update -> save();
        }

        // return $update;
        return redirect('/guru/raport/show/'.$id)->with('success','Update data successfully!!');

    }

}
