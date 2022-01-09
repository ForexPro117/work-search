@extends('header')
<title>Главная</title>
{{--<link rel="stylesheet" href="{{ asset('css/home.css') }}">--}}
@section('bodyContent')

    <div class="container d-flex flex-column align-items-center mt-5">
        <h1>Работа найдется для каждого</h1>
        <form class="input-group mt-4" method="POST" action="/workList">
            @csrf
            <input type="text" class="form-control" placeholder="Введите название" name="search">
            <button class="btn btn-outline-primary" type="submit" >Найти работу</button>
        </form>
    </div>

@endsection
