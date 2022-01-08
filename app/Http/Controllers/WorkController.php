<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    public function create()
    {
        return view('createWork');
    }

    public function list()
    {
        $works=Work::all();
        return view('workList',['works'=>$works]);
    }
/*return Doctor::leftJoin('specialization', 'id_spec', '=', 'specialization.id')
->leftJoin('images', 'id_image', '=', 'images.id')
->where('id_hostpital', $id)
->where('specialization','like','%'.$specialization.'%')
->select('doctors.*','specialization.specialization','images.uri')
->get();
return view('user-account',
['currentNumber' => $currentNumber, 'doctor' => $doctor, 'polyclinic' => $polyclinic, 'history' => $history]);*/
    public function make(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:60',
            'price' => 'nullable|integer|max:9999999',
            'description' => 'required|string',
        ]);

        $work = new work();
        $work->employer_id = $request->user->id;
        $work->name = $request->name;
        $work->price = $request->price;
        $work->description = $request->description;
        dd($work);

    }
}
