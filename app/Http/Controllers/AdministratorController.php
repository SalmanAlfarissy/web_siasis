<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Staf;
use App\Models\Siswa;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdministratorController extends Controller
{
    //
    public function index(){

        $admin = DB::table('stafs')
        ->where('level','admin')
        ->count('id');

        $guru = DB::table('stafs')
        ->where('level','guru')
        ->count('id');

        $siswa = DB::table('siswas')
        ->count('id');

        $alumni = DB::table('alumnis')
        ->count('id');

        $informasi=DB::table('informasis')->orderBy('created_at','desc')->get();

        if (session('admin.level')=="admin"){
            return view('administrator.home.index',[
                'page'=>'home',
                'admin'=>$admin,
                'siswa'=>$siswa,
                'guru'=>$guru,
                'alumni'=>$alumni
            ]);
        }else{
            return view('guru.home.index',[
                'page'=>'home',
                'informasi'=> $informasi
            ]);
        }

    }

    public function main(){
            $admin=Staf::where('level', 'admin')->get();
            return view('administrator.admin.admin',[
            'admin' => $admin,
            'page' => 'Administrator'
            ]);
    }

    public function guru(){
        $admin=Staf::where('level', 'guru')->get();
        return view('administrator.guru.guru',[
        'guru' => $admin,
        'page' => 'Guru'
        ]);
    }

    public function create(){
        $post = new Staf();
        return view('administrator.admin.post', [
            'post' => $post,
            'page' => 'Administrator'
        ]);


    }

    public function createguru(){
        $post = new Staf();
        return view('administrator.guru.post', [
            'post' => $post,
            'page' => 'Guru'
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nip'=>'required|size:18|unique:stafs',
            'nama'=>'required|max:255',
            'password'=>'required|min:5|max:255',
            'email'=>'required|email:dns|unique:stafs',
            'gender'=>'required',
            'foto_guru'=>'required|image|max:512|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $store = new Staf();
        $store -> id = null;
        $store -> nip = $validated['nip'];
        $store -> nama = $validated['nama'];

        $store -> level = 'admin';

        $validated['password'] = Hash::make($validated['password']);
        $store -> password = $validated['password'];

        $store -> email = $validated['email'];
        $store -> gender = $validated['gender'];
        $store -> alamat = ($request-> alamat != "") ? $request-> alamat : "";
        $store -> tgl_lahir = ($request-> tgl_lahir != "") ? $request-> tgl_lahir : date(now());
        $store -> tempat_lahir = ($request-> tempat_lahir != "") ? $request-> tempat_lahir : "";
        $store -> jabatan = ($request-> jabatan != "") ? $request-> jabatan : "";
        $store -> pangkat_gol = ($request-> pangkat_gol != "") ? $request-> pangkat_gol : "";

        $nm = $validated['foto_guru'];
        $file_name = time().rand(100,99).".".$nm->getClientOriginalExtension();
        $validated['foto_guru']->move(public_path().'/gambar/administrator',$file_name);
        $path = $file_name;
        $store -> foto_guru = $path;
        $store -> save();

        return redirect('/administrator/staf/administrator')->with('success','Create data successfully!!');
    }

    public function storeguru(Request $request){
        $validated = $request->validate([
            'nip'=>'required|size:18|unique:stafs',
            'nama'=>'required|max:255',
            'password'=>'required|min:5|max:255',
            'email'=>'required|email:dns|unique:stafs',
            'gender'=>'required',
            'foto_guru'=>'required|image|max:512|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $store = new Staf();
        $store -> id = null;
        $store -> nip = $validated['nip'];
        $store -> nama = $validated['nama'];

        $store -> level = 'guru';

        $validated['password'] = Hash::make($validated['password']);
        $store -> password = $validated['password'];

        $store -> email = $validated['email'];
        $store -> gender = $validated['gender'];
        $store -> alamat = ($request-> alamat != "") ? $request-> alamat : "";
        $store -> tgl_lahir = ($request-> tgl_lahir != "") ? $request-> tgl_lahir : date(now());
        $store -> tempat_lahir = ($request-> tempat_lahir != "") ? $request-> tempat_lahir : "";
        $store -> jabatan = ($request-> jabatan != "") ? $request-> jabatan : "";
        $store -> pangkat_gol = ($request-> pangkat_gol != "") ? $request-> pangkat_gol : "";

        $nm = $validated['foto_guru'];
        $file_name = time().rand(100,99).".".$nm->getClientOriginalExtension();
        $validated['foto_guru']->move(public_path().'/gambar/administrator',$file_name);
        $path = $file_name;
        $store -> foto_guru = $path;
        $store -> save();

        return redirect('/administrator/staf/guru')->with('success','Create data successfully!!');
    }

    public function edit($id)
    {
        $edtstaf = Staf::find($id);
        $page = 'Administrator';
        return view('administrator.admin.update',compact('edtstaf','page'));
    }

    public function editguru($id)
    {
        $edtstaf = Staf::find($id);
        $page = 'Guru';
        return view('administrator.guru.update',compact('edtstaf','page'));
    }

    public function update(Request $request,$id)
    {
        //

        $validated = $request->validate([

            'nama'=>'required|max:255',
            'email'=>'required|email:dns',
            'gender'=>'required',
            'foto_guru'=>'image|max:512|mimes:jpeg,png,jpg,gif,svg'

        ]);

        $dtupdate=Staf::find($id);

        $dtupdate -> nama = $validated['nama'];
        $dtupdate -> email = $validated['email'];
        $dtupdate -> gender = $request-> gender;
        $dtupdate -> alamat = $request-> alamat;
        $dtupdate -> tgl_lahir = $request-> tgl_lahir;
        $dtupdate -> tempat_lahir = $request-> tempat_lahir;
        $dtupdate -> jabatan = $request-> jabatan;
        $dtupdate -> pangkat_gol = $request-> pangkat_gol;

        $gbdefault = $dtupdate->foto_guru;
        ($request->foto_guru != "") ? $request->foto_guru->move(public_path().'/gambar/administrator',$gbdefault) : asset('gambar/administrator/'.$dtupdate->foto_guru);
        $dtupdate -> foto_guru = $gbdefault;

        $dtupdate -> save();
        return redirect('/administrator/staf/administrator')->with('success','Update data successfully!!');

    }

    public function updateguru(Request $request,$id)
    {
        //

        $validated = $request->validate([

            'nama'=>'required|max:255',
            'email'=>'required|email:dns',
            'gender'=>'required',
            'foto_guru'=>'image|max:512|mimes:jpeg,png,jpg,gif,svg'

        ]);

        $dtupdate=Staf::find($id);

        $dtupdate -> nama = $validated['nama'];
        $dtupdate -> email = $validated['email'];
        $dtupdate -> gender = $request-> gender;
        $dtupdate -> alamat = $request-> alamat;
        $dtupdate -> tgl_lahir = $request-> tgl_lahir;
        $dtupdate -> tempat_lahir = $request-> tempat_lahir;
        $dtupdate -> jabatan = $request-> jabatan;
        $dtupdate -> pangkat_gol = $request-> pangkat_gol;

        $gbdefault = $dtupdate->foto_guru;
        ($request->foto_guru != "") ? $request->foto_guru->move(public_path().'/gambar/administrator',$gbdefault) : asset('gambar/administrator/'.$dtupdate->foto_guru);
        $dtupdate -> foto_guru = $gbdefault;

        $dtupdate -> save();
        return redirect('/administrator/staf/guru')->with('success','Update data successfully!!');

    }

    public function destroy($id)
    {
        //
        $dthapus=Staf::find($id);
        $file=public_path('/gambar/administrator/').$dthapus->foto_guru;
        if (file_exists($file)){
            @unlink($file);
        }
        $dthapus->delete();
        return back();
    }

    public function destroyguru($id)
    {
        //
        $dthapus=Staf::find($id);
        $file=public_path('/gambar/administrator/').$dthapus->foto_guru;
        if (file_exists($file)){
            @unlink($file);
        }
        $dthapus->delete();
        return back();
    }
    public function alumni(){
        $siswa=Siswa::where('status','Alumni')
        ->join('alumnis','alumnis.siswa_id','siswas.id')
        ->get();

        // dd($siswa);
        return view('guru.alumni.alumni',[
            'siswa'=>$siswa,
            'page'=>'Alumni',
        ]);
    }

    public function list_guru(){
        $admin=Staf::where('level', 'guru')->simplePaginate(5);

        return view('guru.guru.guru',[
        'guru' => $admin,
        'page' => 'Guru'
        ]);
    }

    public function event($id){
        $event=Informasi::find($id);
        return view('guru.home.view',[
        'event' => $event,
        'page' => 'home'
        ]);
    }

    public function profile($id)
    {
        if (session('admin.level')=='admin'){
            $admin=Staf::find($id);
            return view('administrator.profile.profile',[
            "admin"=>$admin,
            "page"=>"home"
        ]);
        }else{
            $guru=Staf::find($id);
            return view('guru.profile.profile',[
            "guru"=>$guru,
            "page"=>"home"
        ]);
        }
    }

    public function updateprofile(Request $request,$id)
    {
        //

        $validated = $request->validate([

            'nama'=>'required|max:255',
            'email'=>'required|email:dns',
            'gender'=>'required',
            'foto_guru'=>'image|max:512|mimes:jpeg,png,jpg,gif,svg'

        ]);
        $dtupdate=Staf::find($id);

        if (session('admin.level')=='admin'){
            $dtupdate -> nama = $validated['nama'];
            $dtupdate -> email = $validated['email'];
            $dtupdate -> gender = $request-> gender;
            $dtupdate -> alamat = $request-> alamat;
            $dtupdate -> tgl_lahir = $request-> tgl_lahir;
            $dtupdate -> tempat_lahir = $request-> tempat_lahir;

            $gbdefault = $dtupdate->foto_guru;
            ($request->foto_guru != "") ? $request->foto_guru->move(public_path().'/gambar/administrator',$gbdefault) : asset('gambar/administrator/'.$dtupdate->foto_guru);
            $dtupdate -> foto_guru = $gbdefault;

            $dtupdate -> save();
            return redirect('/administrator/profile/'.$id)->with('success','Update data successfully!!');
        }else{
            $dtupdate -> nama = $validated['nama'];
            $dtupdate -> email = $validated['email'];
            $dtupdate -> gender = $request-> gender;
            $dtupdate -> alamat = $request-> alamat;
            $dtupdate -> tgl_lahir = $request-> tgl_lahir;
            $dtupdate -> tempat_lahir = $request-> tempat_lahir;

            $gbdefault = $dtupdate->foto_guru;
            ($request->foto_guru != "") ? $request->foto_guru->move(public_path().'/gambar/administrator',$gbdefault) : asset('gambar/administrator/'.$dtupdate->foto_guru);
            $dtupdate -> foto_guru = $gbdefault;

            $dtupdate -> save();
            return redirect('/guru/profile/'.$id)->with('success','Update data successfully!!');
        }

    }

    public function changepass(Request $request,$id){

        $auth = Staf::find($id);

        if (session('admin.level')=='admin'){
            if (!empty($auth)){
                if (Hash::check($request->OldPassword, $auth->password)){

                    if ($request->NewPassword == $request->NewPasswordConfirm){
                        $NewPasswordConfirm = Hash::make($request->NewPasswordConfirm);
                        $auth->password = $NewPasswordConfirm;
                        $auth -> save();
                        session()->flush();
                        return redirect('/staf/login')->with('success','Update password successfully!!');
                    }else{
                        return back()->with('error','focused error');
                    }
                }else {
                    return back()->with('error','focused error');
                }
            }
            return back()->with('error','focused error');
        }else{
            if (Hash::check($request->OldPassword, $auth->password)){
                if ($request->NewPassword == $request->NewPasswordConfirm){
                    $NewPasswordConfirm = Hash::make($request->NewPasswordConfirm);
                    $auth->password = $NewPasswordConfirm;
                    $auth -> save();
                    session()->flush();
                    return redirect('/staf/login')->with('success','Update password successfully!!');
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

