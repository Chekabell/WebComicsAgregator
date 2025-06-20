<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top border-bottom-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <ul class="nav nav-tabs mx-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('comics.index') }}">Главная</a>
            </li>
            @if (Auth::user())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">{{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu">
                        @if(!request()->routeIs('comics.create'))
                            <li><a class="dropdown-item" href="{{ route('comics.create') }}">Добавить новый комикс</a></li>
                        @endif
                        <li><a class="dropdown-item" href="{{ url('logout') }}">Выйти из системы</a></li>
                    </ul>
                <li class="nav-item dropdown">
            @else
                @if(!request()->routeIs('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Войти в систему</a>
                    </li>
                @endif
            @endif
        </ul>
    </div>
</nav>
