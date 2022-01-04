<!DOCTYPE html>
<html lang="ru">
<head>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <title>Крестики-нолики на javascript</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>


<body>
<header class="header">
    <div class="header__description" style="margin-left: 40px">
        Игра "Крестики-нолики"
    </div>


     <div class="end-bar">

         <div class="header__help">
             <a id="header__help__button" class="header__help__button">Помощь</a>
         </div>
         @auth
             <div class="header__help">
                 <a class="header__help__button non-decor" href="/logout">Выйти</a>
             </div>
         @endauth

         @guest
             <div class="header__help">
                 <a class="header__help__button non-decor" href="/login">Войти</a>
             </div>
             <div class="header__help">
                 <a class="header__help__button non-decor" href="/registration">Регистрация</a>
             </div>
         @endguest

     </div>

</header>

<div class="help-block" style="display: none">
    <p class="help-block__paragraph">
        1. Перед началом партии выберите, кто будет ходить первым.
    </p>
    <p class="help-block__paragraph">
        2. Для обнуления счета перезагрузите страницу.
    </p>
</div>

<div class="game-score">
    <div class="game-score__content">
        <h2 class="game-score__title">Счет</h2>
        <p class="game-score__player">Компьютер:<span id="computer-count">0</span></span>
        <p class="game-score__player">Вы:<span id="player-count">0</span></span>
    </div>
</div>

<div class="game">
    <table id="game__board">

    </table>
</div>

<div class="choose-player">
    <h1 class="choose-player__title">Выберите, кто будет ходить первым</h1>

    <div id="players" class="choose-player__content">
        <div class="choose-player__content__description">
            <i class="fa fa-user-circle fa-5x fa-inverse" aria-hidden="true"></i>
            <p class="choose-player__content__description__text">
                Вы
            </p>

        </div>
        <div class="choose-player__content__description">
            <i class="fa fa-desktop fa-5x fa-inverse" aria-hidden="true"></i>
            <p class="choose-player__content__description__text">
                Компьютер
            </p>
        </div>
    </div>

</div>
@auth
<div class="show-history">
    <button class="show-history__buttons">История партий</button>
</div>
@endauth
<div id = "history">
</div>

<script type="module" src="{{asset('js/index.js')}}"></script>


</body>
</html>
