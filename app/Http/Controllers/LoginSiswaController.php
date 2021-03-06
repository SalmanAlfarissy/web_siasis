<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginSiswaController extends Controller
    {
        public function index()
        {
            if (!empty(session('siswa'))){
                return redirect('/siswa/home');
            }else if(!empty(session('alumni'))){
                return redirect('/alumni/home');
            }
            return view('login.loginsiswa',[
                'title'=>'Login',
                'active'=>'login'
            ]);
        }

        public function authenticate(Request $request)
        {

            $request->validate([
                'nis'=>'required|size:5',
                'password'=>'required|min:5|max:255'
            ]);

            $auth = Siswa::where('nis',$request->nis)->first();

            if (!empty($auth)){
                if  (Hash::check($request->password, $auth->password)){
                    if ($auth->status == 'Siswa'){
                        session()->put(['siswa'=>[
                            'id'=>$auth->id,
                            'kelas'=>$auth->kelas_id,
                            'nama'=>$auth->nama,
                            'email'=>$auth->email,
                            'status'=>$auth->status,
                            'foto_siswa'=>$auth->foto_siswa,
                        ]]);
                        return redirect('/siswa/home');
                    }else{
                        session()->put(['alumni'=>[
                            'id'=>$auth->id,
                            'nama'=>$auth->nama,
                            'email'=>$auth->email,
                            'status'=>$auth->status,
                            'foto_siswa'=>$auth->foto_siswa,
                        ]]);
                        return redirect('/alumni/home');
                    }
                }

            }
            return back()->with('LoginError','Login Failed!!');
        }

        public function logout()
        {
            session()->flush();
            return redirect('/siswa/login');
        }

}
