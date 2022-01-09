@extends('header')
<title>Успех</title>
{{--<link rel="stylesheet" href="{{ asset('css/home.css') }}">--}}
@section('bodyContent')

    <div class="container d-flex flex-column align-items-center mt-5">
        <h2>{{$text}} <a href="/">вернуться на главную</a> </h2>
    </div>

@endsection
