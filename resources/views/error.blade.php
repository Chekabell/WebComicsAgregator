@extends('layouts.mainLayout')
@section('content')
    <div class="container mt-5">
        <h2>Произошла ошибка!</h2>
        <h4>{{ $message }}</h4>
        <a class="mt-3 btn btn-secondary" href="{{ route('comics.index') }}">Назад</a>
    </div>
@endsection

