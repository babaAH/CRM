<div class="row">
    <nav class="navbar navbar-expand navbar-blue">
        <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"> <a class="nav-link" href="{{route('main-page')}}">Главная <span class="sr-only">(current)</span></a> </li>
                @auth
                    <li class="nav-item"> <a class="nav-link" href="{{ route('logout') }}">Выйти</a> </li>
                @else
                    <li class="nav-item"> <a class="nav-link" href="{{ route('login') }}">Авторизация</a> </li>
                @endif
            </ul>
        </div>
    </nav>
</div>
