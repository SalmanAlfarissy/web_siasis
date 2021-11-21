<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Staf;
use App\Models\Siswa;
use App\Models\Semester;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
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

    public function profile($id)
    {
        $siswa=DB::table('siswas')
        ->where('siswas.id',$id)
        ->join('kelas','kelas.id','siswas.kelas_id')
        ->select('siswas.*','kelas.nama_kelas as kelas')
        ->first();

        return view('siswa.profile.profile',[
        "siswa"=>$siswa,
        "page"=>"home"]);

    }

    public function updateprofile(Request $request,$id)
    {
        //

        $validated = $request->validate([

            'nama'=>'required|max:255',
            'email'=>'required|email:dns',
            'gender'=>'required',
            'foto_siswa'=>'image|max:512|mimes:jpeg,png,jpg,gif,svg'

        ]);

        $dtupdate=Siswa::find($id);

        $dtupdate -> nama = $validated['nama'];
        $dtupdate -> email = $validated['email'];
        $dtupdate -> gender = $request-> gender;
        $dtupdate -> alamat = $request-> alamat;
        $dtupdate -> tgl_lahir = $request-> tgl_lahir;
        $dtupdate -> tempat_lahir = $request-> tempat_lahir;

        $gbdefault = $dtupdate->foto_siswa;
        ($request->foto_siswa != "") ? $request->foto_siswa->move(public_path().'/gambar/siswa',$gbdefault) : asset('gambar/siswa/'.$dtupdate->foto_siswa);
        $dtupdate -> foto_siswa = $gbdefault;

        $dtupdate -> save();
        return redirect('/siswa/profile/'.$id)->with('success','Update data successfully!!');


    }

    public function changepass(Request $request,$id){

        $auth = Siswa::find($id);

        if (!empty($auth)){
            if (Hash::check($request->OldPassword, $auth->password)){

                if ($request->NewPassword == $request->NewPasswordConfirm){
                    $NewPasswordConfirm = Hash::make($request->NewPasswordConfirm);
                    $auth->password = $NewPasswordConfirm;
                    $auth -> save();
                    session()->flush();
                    return redirect('/siswa/login')->with('success','Update password successfully!!');
                }else{
                    return back()->with('error','focused error');
                }
            }else {
                return back()->with('error','focused error');
            }
        }
        return back()->with('error','focused error');

    }
}
