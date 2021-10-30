<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class RaportController extends Controller
{
    public function raport(){
        $siswa = Siswa::where('status','Siswa')
            ->where('staf_id',session('guru.id'))
            ->join('stafs', 'stafs.id', '=', 'siswas.staf_id')
            ->join('kelas', 'kelas.id', '=', 'siswas.kelas_id')
            ->select('siswas.*', 'stafs.nama as walikelas','kelas.nama_kelas as kelas')
            ->get();

            return view('guru.raport.raport',[
                'siswa' => $siswa,
                'page' => 'Raport',
            ]);
    }
}
