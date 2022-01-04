<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</head>
<body>
<header class="p-2  text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto justify-content-center mb-md-0">
            </ul>
            <div class="text-end nav">
                @if(Auth::check())
                    <button type="button" class="btn btn-outline-light me-2"
                            onclick="location.href='{{route('logout')}}'">
                        Выход
                    </button>
                @else
                    <div>
                        <button type="button" class="btn btn-outline-light dropdown-toggle me-2"
                                data-bs-toggle="dropdown">Войти
                        </button>
                        <form method="POST" action="{{ route('loginPOST') }}" class="dropdown-menu p-4">
                            @csrf
                            <div class="mb-3">
                                <label for="Email" class="form-label fw-bolder">Email</label>
                                <input type="text" class="form-control" name="email"
                                       placeholder="email@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="Password" class="form-label fw-bolder">Пароль</label>
                                <input type="password" autocomplete="on" class="form-control" name="password"
                                       placeholder="Ваш пароль">
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="remember">
                                <label class="form-check-label">
                                    Запомнить меня
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Войти</button>
                        </form>
                    </div>
                    <div>
                        <button type="button" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown">
                            Регистрация
                        </button>
                        <form method="POST" action="{{ route('registerPOST') }}" class="dropdown-menu p-4">
                            @csrf
                            <div class="mb-3">
                                <label for="Email2" class="form-label fw-bolder">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="email@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="Password2" class="form-label fw-bolder">Пароль</label>
                                <input type="password" class="form-control" name="password"
                                       placeholder="Ваш пароль">
                            </div>
                            <div class="mb-3">

                                <input type="password" class="form-control" name="password_confirmation"
                                       placeholder="Повторите пароль">
                            </div>
                            <button type="submit" class="btn btn-primary">Регистрация</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</header>

@if ($errors->any())
    <div class="alert alert-dark container">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</body>
</html>
