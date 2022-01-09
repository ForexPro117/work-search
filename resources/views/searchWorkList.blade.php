@extends('header')
<title>Список вакансий</title>
<link rel="stylesheet" href="{{ asset('css/worklist.css') }}">
@section('bodyContent')
    <h1 class="d-flex flex-column align-items-center mt-5">Результаты найденные по запросу: {{$request}}</h1>
    <div class="list d-flex flex-wrap justify-content-">
        @foreach($works as $work)
            <div class="border border-primary card ">
                <div class="d-flex justify-content-between flex-wrap">
                    <label class="text">{{$work->work_name}}</label>
                    <label class="price">{{$work->price}} руб.</label>
                </div>
                <label class="company">{{$work->company_name}}</label>
                <label class="description area">{{$work->description}}
                </label>
                <button type="button" class="btn btn-primary buton"
                        onclick="location.href='{{route('response',['workId'=>$work->id])}}'">Откликнуться</button>
            </div>
        @endforeach

    </div>
@endsection
