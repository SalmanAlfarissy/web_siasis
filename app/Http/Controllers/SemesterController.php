<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SemesterController extends Controller
{
    public function semester(){
        $semester=DB::table('semester')->get();
        return view('administrator.semester.semester',[
        'semester' => $semester,
        'page' => 'Semester'
        ]);
    }

    public function create(){
        $semester = new Semester();
        return view('administrator.semester.post', [
            'semester' => $semester,
            'page' => 'Semester'
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'semester'=>'required|max:255',
            'tahun'=>'required|size:4'
        ]);

        $store = new Semester();
        $store -> id = null;
        $store -> semester = $validated['semester'];
        $store -> tahun = $validated['tahun'];
        $store -> save();

        return redirect('/administrator/staf/semester')->with('success','Create data successfully!!');
    }

    public function edit($id)
    {
        $edtsemester = Semester::find($id);
        $page = 'Semester';
        return view('administrator.semester.update',compact('edtsemester','page'));
    }

    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'semester'=>'required|max:255',
            'tahun'=>'required|size:4'
        ]);


        $dtupdate=Semester::find($id);
        $dtupdate -> semester = $validated['semester'];
        $dtupdate -> tahun = $validated['tahun'];
        $dtupdate -> save();
        return redirect('/administrator/staf/semester')->with('success','Update data successfully!!');

    }

    public function destroy($id)
    {
        //
        $dthapus=Semester::find($id);
        $dthapus->delete();
        return back();
    }
}
