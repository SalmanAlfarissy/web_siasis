<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Staf;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        if (!empty(session('admin'))){
            return redirect('/administrator/home');
        }else if(!empty(session('guru'))){
            return redirect('/guru/home');
        }
        return view('login.login',[
            'title'=>'Login',
            'active'=>'login'
        ]);
    }

    public function authenticate(Request $request)
    {

        $request->validate([
            'nip'=>'required|size:18',
            'password'=>'required|min:5|max:255'
        ]);

        $auth = Staf::where('nip',$request->nip)
        ->leftjoin('pelajarans','pelajarans.staf_id','stafs.id')
        ->select('stafs.*','pelajarans.kelas_id as kelas_id')
        ->first();

        // return $auth->kelas_id;

        if (!empty($auth)){
            if  (Hash::check($request->password, $auth->password)){
                if ($auth->level=='admin'){
                    session()->put(['admin'=>[
                        'id'=>$auth->id,
                        'nama'=>$auth->nama,
                        'email'=>$auth->email,
                        'level'=>$auth->level,
                        'foto_guru'=>$auth->foto_guru,
                    ]]);
                    return redirect('/administrator/home');
                }else {

                    session()->put(['guru'=>[
                        'id'=>$auth->id,
                        'nama'=>$auth->nama,
                        'kelas'=>$auth->kelas_id,
                        'email'=>$auth->email,
                        'level'=>$auth->level,
                        'foto_guru'=>$auth->foto_guru,]]);
                    return redirect('/guru/home');
                }
            }

        }
        return back()->with('LoginError','Login Failed!!');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/staf/login');

    }
}
