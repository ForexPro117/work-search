@extends('header')
<title>Отклик на вакансию</title>
@section('bodyContent')
    <div class="container d-flex flex-column align-items-center mt-5">
        <h1>Отклик на вакансию</h1>
        <form method="POST" class="mt-4" style="width: 30%" action="{{ route('response') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="description" class="form-label fw-bolder">Расскажите о себе</label>
                <textarea class="form-control" name="description" placeholder="Расскажите о своиих хобби..."
                          rows="4"></textarea>
                @error('description')
                <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>
            <div class="mb-3">
                <label for="file" class="form-label fw-bolder">Прикрепите свое резюме</label>
                <input type="file" class="form-control" name="file">
                @error('file')
                <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>
            <input type="text" hidden name="workId" value="{{$workId}}">
            <div class="mt-3 d-flex justify-content-between align-items-center ">
                <button type="submit" style="width: 100%" class="btn btn-primary">Откликнуться</button>
            </div>
        </form>
    </div>
@endsection
