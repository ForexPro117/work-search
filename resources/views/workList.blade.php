@extends('header')
<title>Список вакансий</title>
<link rel="stylesheet" href="{{ asset('css/worklist.css') }}">
@section('bodyContent')
    <h1 class="d-flex flex-column align-items-center mt-5">Все доступные вакансии</h1>
    <div class="list d-flex flex-wrap">
        @foreach($works as $work)
            <div class="border border-primary card " id="{{$work->id}}">
                <div class="d-flex justify-content-between flex-wrap">
                    <label class="text">{{$work->work_name}}</label>
                    @if($work->price==null)
                        <label class="price">договорная</label>
                    @else
                        <label class="price">{{$work->price}} руб.</label>
                    @endif
                </div>
                <label class="company">{{$work->company_name}}</label>
                <label class="description area">{{$work->description}}
                </label>
                <div class="d-flex  justify-content-center">

                    @can('delete-work',$work)
                        <button type="button" class="btn btn-primary buton-exit"
                                onclick="location.href='{{route('response',['workId'=>$work->id])}}'">Откликнуться
                        </button>
                        <button type="button" class="btn-close exit"
                                onclick="deleteWork({{$work->id}},'{{$work->work_name}}')" aria-label="Close"></button>
                    @else
                        <button type="button" class="btn btn-primary buton"
                                onclick="location.href='{{route('response',['workId'=>$work->id])}}'">Откликнуться
                        </button>
                    @endcan
                </div>
            </div>
        @endforeach

    </div>
    <script src="{{ asset('js/work.js') }}"></script>
@endsection
