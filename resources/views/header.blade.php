<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

    <title>Work</title>
</head>
<body>
<header class="p-2 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 link-secondary">Главная</a></li>
                <li><a href="/workList" class="nav-link px-2 link-info">Все вакансии</a></li>
                @if(!Auth::check())
                    <li><a href="/registrationUser" class="nav-link px-2 link-primary">Стать соискателем</a></li>
                    <li><a href="/registration" class="nav-link px-2 link-primary">Стать работодателем</a></li>
                @endauth
            </ul>
            <div class="text-end nav">
                @if(Auth::check())
                    @can('user-history')
                        <li><a href="/workUserHistory" class="nav-link px-2 link-warning">История откликов</a></li>
                    @endcan
                    @can('create-work')
                        <li><a href="/workHistory" class="nav-link px-2 link-warning">Отклики на вакансии</a></li>
                        <li><a href="/work" class="nav-link px-2 link-success">Создать вакансию</a></li>
                    @endcan
                    <label class="nav-link px-2 link-secondary">{{request()->user()->email}}</label>
                    <button type="button" class="btn btn-outline-primary me-2"
                            onclick="location.href='{{route('logout')}}'">
                        Выйти
                    </button>
                @else
                    <div>
                        <button type="button" class="btn btn-outline-primary me-2"
                                onclick="location.href='{{route('login')}}'">Войти
                        </button>
                    </div>

                @endauth
            </div>
        </div>
    </div>
</header>
<main>
    @yield("bodyContent")

</main>
{{--<footer
    class="d-flex flex-wrap justify-content-around py-3 my-4 border-top @if($_SERVER["REQUEST_URI"]!="/bdView")fixed-bottom @endif">
    <div>
        <span class="text-muted">© 2022 Company, Inc</span>
    </div>
    <div>
        <span class="text-muted"></span>
    </div>
    <div>
        <a class="text-muted text-decoration-none" href="https://www.google.ru/">email@example.com</a>
    </div>
</footer>--}}
</body>
</html>
