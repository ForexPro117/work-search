@extends('header')
<title>Размещение вакансии</title>
@section('bodyContent')
    <div class="container d-flex flex-column align-items-center mt-5">
        <h1>Размещение вакансии</h1>
        <form method="POST" class="mt-4" style="width: 30%" action="{{ route('work') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label fw-bolder">Название вакансии</label>
                <input type="text" autocomplete="on" class="form-control" name="name"
                       placeholder="Введите название...">
                @error('name')
                <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label fw-bolder">Размер зарплаты в рублях</label>
                <input type="text"  class="form-control" name="price"
                       placeholder="Введите размер или оставте пустым...">
                @error('price')
                <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label fw-bolder">Описание вакансии</label>
                <textarea class="form-control" name="description" placeholder="Расскажите о своей вакансии..."
                          rows="4"></textarea>
                @error('description')
                <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>

            <div class="mt-3 d-flex justify-content-between align-items-center ">
                <button type="submit" style="width: 100%" class="btn btn-primary">Разместить</button>
            </div>
        </form>
    </div>
@endsection
