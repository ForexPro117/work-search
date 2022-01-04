
<title>Регистрация</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <div class="container mt-5">
        <h1>Регистрация</h1>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="POST" style="width: 30%" action="{{ route('registerPOST') }}">
            @csrf
            <div class="mb-3">
                <label for="Email2" class="form-label fw-bolder">Email</label>
                <input type="email" class="form-control" name="email"
                       placeholder="email@example.com">
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
            <button type="submit" class="btn btn-success">Регистрация</button>

            <div class="mt-3">
                <a href="/login">Уже есть аккаунт?</a>
            </div>
        </form>
    </div>

