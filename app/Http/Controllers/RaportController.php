<?php

namespace App\Http\Controllers;


use PDF;
use App\Models\Siswa;

use App\Models\Raport;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class RaportController extends Controller
{
    public function raport(){
        $semester = DB::table('semester')->get();

        $smt=Semester::where('semester',request()->semester)
        ->where('tahun',request()->tahun)
        ->first();

        if(!empty($smt))
        $siswa = Siswa::where('status','Siswa')
            ->where('siswas.staf_id',session('guru.id'))
            ->where('semester.id',$smt->id)
            ->join('stafs', 'stafs.id', '=', 'siswas.staf_id')
            ->join('kelas', 'kelas.id', '=', 'siswas.kelas_id')
            ->join('pelajarans', 'pelajarans.id', '=', 'siswas.kelas_id')
            ->join('semester', 'semester.id', '=', 'pelajarans.semester_id')
            ->leftJoin('raports', function($join) use ($smt){
                $join->on('raports.siswa_id', '=', 'siswas.id')
                ->where('raports.semester_id',$smt->id);
            })
            ->groupBy('siswas.id')
            ->select('siswas.*', 'stafs.nama as walikelas','kelas.nama_kelas as kelas','pelajarans.semester_id','semester.tahun','semester.semester',
            DB::raw('count(raports.id) as jumlah')
            )
            ->get();
        else $siswa = [];





        $raport = Siswa::where('status','Siswa')
            ->where('siswas.staf_id',session('guru.id'))
            ->where('semester.semester',request()->semester)
            ->where('semester.tahun',request()->tahun)
            ->join('stafs', 'stafs.id', '=', 'siswas.staf_id')
            ->join('kelas', 'kelas.id', '=', 'siswas.kelas_id')
            ->join('pelajarans', 'pelajarans.id', '=', 'siswas.kelas_id')
            ->join('semester', 'semester.id', '=', 'pelajarans.semester_id')
            ->leftJoin('raports', 'raports.siswa_id', '=', 'siswas.id')
            ->select('siswas.*', 'stafs.nama as walikelas','kelas.nama_kelas as kelas','pelajarans.semester_id','semester.tahun','semester.semester','raports.id as raport_id')
            ->get();

            // return $raport;

            return view('guru.raport.raport',[
                'siswa' => $siswa,
                'semester' => $semester,
                'raport' => $raport,
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
            ->distinct('matpel')
            ->get();
            // dd($raport);

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
            $store->semester_id = $request->semester_id;
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
            ->orderBy('id','desc')
            ->join('pelajarans','pelajarans.id','raports.pelajaran_id')
            ->leftJoin('semester', 'semester.id', '=', 'pelajarans.semester_id')
            ->leftJoin('matpel', 'matpel.id', '=', 'pelajarans.matpel_id')
            ->select('raports.id as id','matpel.nama_pelajaran as pelajaran','semester.semester','semester.tahun','pelajarans.kkm','raports.nilai')
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

    public function cetak(){
        $siswa=Siswa::find(request()->siswa);

        $semester=DB::table('raports')
            ->where('siswa_id',request()->siswa)
            ->join('pelajarans','pelajarans.id','raports.pelajaran_id')
            ->join('kelas','kelas.id','pelajarans.kelas_id')
            ->leftJoin('semester', 'semester.id', '=', 'pelajarans.semester_id')
            ->leftJoin('matpel', 'matpel.id', '=', 'pelajarans.matpel_id')
            ->select('kelas.nama_kelas as kelas','semester.tahun as tahun','semester.semester as semester')
            ->first();

        $raport = DB::table('raports')
            ->where('siswa_id',request()->siswa)
            ->where('semester',request()->semester)
            ->where('tahun',request()->tahun)
            ->join('pelajarans','pelajarans.id','raports.pelajaran_id')
            ->leftJoin('semester', 'semester.id', '=', 'pelajarans.semester_id')
            ->leftJoin('matpel', 'matpel.id', '=', 'pelajarans.matpel_id')
            ->select('matpel.nama_pelajaran as pelajaran','semester.semester','semester.tahun as tahun','pelajarans.kkm','raports.nilai','raports.created_at')
            ->get();

        $guru = DB::table('siswas')
            ->where('siswas.id',request()->siswa)
            ->join('stafs','stafs.id','siswas.staf_id')
            ->select('stafs.nama as nama_walikelas')
            ->first();

        $pdf = App::make('dompdf.wrapper');
        $pdf = PDF::loadView('guru.raport.cetak', [
            'raport'=>$raport,
            'semester'=>$semester,
            'siswa'=>$siswa,
            'guru'=>$guru,
            'page'=>'Raport'
        ]);
        return $pdf->stream();
    }

}
