@extends('header')
<title>Регистрация</title>
@section('bodyContent')
    <div class="container d-flex flex-column align-items-center mt-5">
        <h1>Регистрация</h1>
        <form method="POST" class="mt-4" style="width: 30%" action="{{ route('registerPOST') }}">
            @csrf
            <div class="mb-3">
                <label for="Email2" class="form-label fw-bolder">Email</label>
                <input type="email" class="form-control" name="email"
                       placeholder="email@example.com">
                @error('email')
                <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>
            <div class="mb-2">
                <label for="Password2" class="form-label fw-bolder">Пароль</label>
                <input type="password" class="form-control" name="password"
                       placeholder="Ваш пароль">
            </div>
            <div class="mb-3">

                <input type="password" class="form-control" name="password_confirmation"
                       placeholder="Повторите пароль">
                @error('password')
                <label class="text-danger">{{ $message }}</label>
                @enderror
            </div>
            <div class="mt-3 d-flex justify-content-between align-items-center ">
                <button type="submit" class="btn btn-success">Регистрация</button>
                <a href="/login">Войти</a>
            </div>
        </form>
    </div>
@endsection
