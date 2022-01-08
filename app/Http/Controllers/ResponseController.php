<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResponseController extends Controller
{
    public function create()
    {
        return view('response');
    }
    public function make(Request $request)
    {
        $request->validate([
            'description' => ['required', 'string'],
            'file' => 'required|file'
        ]);

        $response=new Response();
        $response->description=$request->description;
        $response->file=Storage::put('public', $request->file('file'));
        $response->file_original_name=$request->file('file')->getClientOriginalName();
        dd($response);
      /*$path=  Storage::put('public', Request()->file);*/

    }
}
