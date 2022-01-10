<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResponseController extends Controller
{
    public function create(Request $request)
    {

        return view('response', ['workId' => $request->workId]);
    }

    public function make(Request $request)
    {
        $request->validate([
            'description' => ['required', 'string'],
            'file' => 'required|file'
        ]);

        $response = new Response();
        $response->description = $request->description;
        $response->user_id = $request->user()->id;
        $response->work_id = $request->workId;
        $response->file = Storage::put('public', $request->file('file'));
        $response->file_original_name = $request->file('file')->getClientOriginalName();
        $response->save();
        return view('banner', ['text' => 'Вы успешно оставили свой отклик,']);
    }


    public function checkUserHistory(Request $request)
    {

        $responses = Response::where('response.user_id', $request->user()->id)
            ->leftJoin('works', 'response.work_id', '=', 'works.id')
            ->leftJoin('employer_data', 'works.employer_id', '=', 'employer_data.employer_id')
            ->select('response.description as des', 'response.file',
                'response.file_original_name', 'works.*', 'employer_data.*')
            ->get();
        return view('historyUser', ['responses' => $responses]);
    }

    public function checkHistory(Request $request)
    {

        $responses = Response::leftJoin('works', 'response.work_id', '=', 'works.id')
            ->leftJoin('user_data', 'response.user_id', '=', 'user_data.user_id')
            ->where('works.employer_id', $request->user()->id)
            ->select('response.id as responseId', 'response.description as des', 'response.file',
                'response.file_original_name', 'works.*', 'user_data.*')
            ->get();
        return view('history', ['responses' => $responses]);
    }

    public function download(Request $request)
    {

        return Storage::download($request->name, $request->origname);
    }

    public function delete(Request $request)
    {
        $response = Response::find($request->responseId);
        Storage::delete($response->file);
        $response->delete();
        return 'good';
    }
}
