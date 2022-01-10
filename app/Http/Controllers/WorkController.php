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

    public function make(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:60',
            'price' => 'nullable|integer|max:9999999',
            'description' => 'required|string',
        ]);
        $work = new work();
        $work->employer_id = $request->user()->id;
        $work->work_name = $request->name;
        $work->price = $request->price;
        $work->description = $request->description;
        $work->save();
        return view('banner',['text'=>'Вы успешно создали вакансию,']);

    }

    public function list()
    {
        $works=Work::leftJoin('employer_data', 'works.employer_id', '=', 'employer_data.employer_id')
            ->select('works.*','company_name')
            ->get();

        return view('workList',['works'=>$works]);
    }
    public function serachList(Request $request)
    {

        $works=Work::leftJoin('employer_data', 'works.employer_id', '=', 'employer_data.employer_id')
            ->where('work_name','like','%'.$request->search.'%')
            ->select('works.*','company_name')
            ->get();
        return view('searchWorkList',['works'=>$works,'request'=>$request->search]);
    }
    public function delete(Request $request)
    {
      Work::find($request->workId)->delete();

        return "good";
    }
}
