<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>609-21</title>
        @vite(['resources/js/app.js', 'resources/scss/app.scss'])
    </head>
    <body>
        @if (Auth::user())
            @include('user.auth.login', ['user'=> Auth::user()])
        @else
            <a href="{{ route('login') }}" class="btn btn-link btn-sm">
                Войти в систему
             </a>
        @endif


        @section('content')

        @show
    </body>
</html>
