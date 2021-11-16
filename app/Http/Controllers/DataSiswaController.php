<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Semester;
use App\Models\Staf;
use PDF;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use function PHPUnit\Framework\isEmpty;

class DataSiswaController extends Controller
{
    public function index()
    {
        $informasi=DB::table('informasis')->orderBy('created_at','desc')->get();
        return view('siswa.home.index',[
            'informasi'=>$informasi,
            'page'=>'home',
        ]);
        // dd($informasi);
    }

    public function pelajaran()
    {
        $pelajaran =  DB::table('pelajarans')
        ->join('kelas', 'kelas.id', '=', 'pelajarans.kelas_id')
        ->join('stafs', 'stafs.id', '=', 'pelajarans.staf_id')
        ->join('semester', 'semester.id', '=', 'pelajarans.semester_id')
        ->join('matpel', 'matpel.id', '=', 'pelajarans.matpel_id')
        ->select('pelajarans.*', 'stafs.nama as guru','kelas.nama_kelas as kelas', 'semester.semester', 'matpel.nama_pelajaran')
        ->get();

        // dd($pelajaran);
        return view('siswa.jadwal.jadwal',[
            'pelajaran' => $pelajaran,
            'page' => 'JadwalPelajaran'
            ]);
    }

    public function raport(){

        $siswa=Siswa::find(session('siswa.id'));
        $datasemester=Semester::get();

        $semester=DB::table('raports')
            ->where('siswa_id',session('siswa.id'))
            ->join('pelajarans','pelajarans.id','raports.pelajaran_id')
            ->join('kelas','kelas.id','pelajarans.kelas_id')
            ->leftJoin('semester', 'semester.id', '=', 'pelajarans.semester_id')
            ->leftJoin('matpel', 'matpel.id', '=', 'pelajarans.matpel_id')
            ->select('kelas.nama_kelas as kelas','semester.tahun as tahun','semester.semester as semester')
            ->first();

        $raport = DB::table('raports')
            ->where('siswa_id',session('siswa.id'))
            ->where('semester',request()->semester)
            ->where('tahun',request()->tahun)
            ->join('pelajarans','pelajarans.id','raports.pelajaran_id')
            ->leftJoin('semester', 'semester.id', '=', 'pelajarans.semester_id')
            ->leftJoin('matpel', 'matpel.id', '=', 'pelajarans.matpel_id')
            ->select('matpel.nama_pelajaran as pelajaran','semester.semester','semester.tahun','pelajarans.kkm','raports.nilai')
            ->get();

        // dd($raport);
        return view('siswa.raport.raport',[
            'raport'=>$raport,
            'semester'=>$semester,
            'datasemester'=>$datasemester,
            'siswa'=>$siswa,
            'page'=>'Raport'
        ]);
    }
    public function cetak(){
        $siswa=Siswa::find(session('siswa.id'));

        $semester=DB::table('raports')
            ->where('siswa_id',session('siswa.id'))
            ->join('pelajarans','pelajarans.id','raports.pelajaran_id')
            ->join('kelas','kelas.id','pelajarans.kelas_id')
            ->leftJoin('semester', 'semester.id', '=', 'pelajarans.semester_id')
            ->leftJoin('matpel', 'matpel.id', '=', 'pelajarans.matpel_id')
            ->select('kelas.nama_kelas as kelas','semester.tahun as tahun','semester.semester as semester')
            ->first();

        $raport = DB::table('raports')
            ->where('siswa_id',session('siswa.id'))
            ->where('semester',request()->semester)
            ->where('tahun',request()->tahun)
            ->join('pelajarans','pelajarans.id','raports.pelajaran_id')
            ->leftJoin('semester', 'semester.id', '=', 'pelajarans.semester_id')
            ->leftJoin('matpel', 'matpel.id', '=', 'pelajarans.matpel_id')
            ->select('matpel.nama_pelajaran as pelajaran','semester.semester','semester.tahun as tahun','pelajarans.kkm','raports.nilai','raports.created_at')
            ->get();

        $guru = DB::table('siswas')
            ->where('siswas.id',session('siswa.id'))
            ->join('stafs','stafs.id','siswas.staf_id')
            ->select('stafs.nama as nama_walikelas')
            ->first();

        $pdf = App::make('dompdf.wrapper');
        $pdf = PDF::loadView('siswa.raport.cetak', [
            'raport'=>$raport,
            'semester'=>$semester,
            'siswa'=>$siswa,
            'guru'=>$guru,
            'page'=>'Raport'
        ]);
        return $pdf->stream();
    }

    public function alumni(){
        $siswa=Siswa::where('status','Alumni')
        ->join('alumnis','alumnis.siswa_id','siswas.id')
        ->get();

        // dd($siswa);
        return view('siswa.alumni.alumni',[
            'siswa'=>$siswa,
            'page'=>'Alumni',
        ]);
    }

    public function guru(){
        $guru=Staf::where('level','guru')
        ->get();

        // dd($guru);
        return view('siswa.guru.guru',[
            'guru'=>$guru,
            'page'=>'Guru',
        ]);
    }

    public function event($id){
        $event=Informasi::find($id);
        return view('siswa.home.view',[
        'event' => $event,
        'page' => 'home'
        ]);
    }
}
