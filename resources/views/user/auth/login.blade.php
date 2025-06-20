@extends("layouts.mainLayout")
@section('content')
    <div class="container h-75 d-flex justify-content-center align-items-center flex-column">
        @if($user)
            <h2>Здравствуйте, {{ $user->name }}</h2>
            <a href="{{ url('logout') }}">Выйти из системы</a>
        @else
            <h2>Вход в систему</h2>
            <form class="w-50" method="post" action="{{ url('auth') }}">
                @csrf
                <div class="mb-3">
                    <label>E-mail</label>
                    <input class="form-control" type="text" name="email" value="{{ old('email') }}"/>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label>Пароль</label>
                    <input class="form-control" type="password" name="password" value="{{ old('password') }}"/>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="container-fill">
                    <button class="w-100 btn btn-primary" type="submit">
                        Войти
                    </button>
                </div>
            </form>
            @error('error')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        @endif
    </div>
@endsection
