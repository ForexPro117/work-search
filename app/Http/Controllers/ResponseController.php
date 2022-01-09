<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResponseController extends Controller
{
    public function create(Request $request)
    {

        return view('response',['workId'=>$request->workId]);
    }
    public function make(Request $request)
    {
        $request->validate([
            'description' => ['required', 'string'],
            'file' => 'required|file'
        ]);

        $response=new Response();
        $response->description=$request->description;
        $response->user_id=$request->user()->id;
        $response->work_id=$request->workId;
        $response->file=Storage::put('public', $request->file('file'));
        $response->file_original_name=$request->file('file')->getClientOriginalName();
        $response->save();
  return view('banner',['text'=>'Вы успешно оставили свой отклик,']);
    }
}
