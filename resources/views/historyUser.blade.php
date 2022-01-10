@extends('header')
<title>История откликов</title>
<link rel="stylesheet" href="{{ asset('css/history.css') }}">
@section('bodyContent')
    <div class="container d-flex flex-column align-items-center mt-5">
        <h1>История ваших откликов</h1>
        <div class="list d-flex flex-wrap">
            @foreach($responses as $response)
                <div class="border border-primary card ">
                    <div class="d-flex justify-content-between flex-wrap">
                        <label class="text">{{$response->work_name}}</label>
                        <label class="price">{{$response->price}} руб.</label>
                    </div>
                    <label class="company">{{$response->company_name}}</label>
                    <label class="description area">{{$response->description}}</label>
                    <label class="price mt-2">Работодатель: {{$response->lastname}} {{$response->name}}</label>
                    <label class="company">Номер работодателя: {{$response->phone_number}}</label>
                    <label class="description area mt-2">Что вы указали в своём отклике: {{$response->des}}</label>
                    <label class="company mt-2">Файл: {{$response->file_original_name}}</label>
                    <button type="button" class="btn btn-primary buton"
                            onclick="location.href='{{route('download',['name'=>$response->file,'origname'=>$response->file_original_name])}}'">
                        Скачать
                    </button>
                </div>
            @endforeach

        </div>
    </div>
@endsection
