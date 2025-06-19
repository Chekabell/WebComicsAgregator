@extends('layouts.mainLayout')
@section('content')
<div class="container">
    <h2>Список комиксов:</h2>
    <div class="row">
        <div class="col-1 border border-black">
            id
        </div>
         <div class="col-2 border border-black">
            Название комикса
        </div>
         <div class="col-4 border border-black">
            Описание
        </div>
         <div class="col-2 border border-black">
            Редактирование
        </div>
         <div class="col-2 border border-black">
            Удаление
        </div>
    </div>
    @foreach ($comics as $com)
        <div class="row">
            <div class="col-1 border border-black">{{ $com->id }}</div>
            <div class="col-2 border border-black">
                <a href="{{ route('comics.show', $com) }}" class="btn btn-link btn-sm">
                    {{ $com->title }}
                </a>
            </div>
            <div class="col-4 border border-black">{{ $com->description }} </div>
            <div class="col-2 border border-black d-flex justify-content-center align-items-center">
                <form action="{{ route('comics.edit', $com) }}" method="">
                    <button type="submit">Edit</button>
                </form>
            </div>
            <div class="col-2 border border-black d-flex justify-content-center align-items-center">
                <form action="{{ route('comics.destroy', $com) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
    <div style="padding-left: 1%;">
        {{ $comics->links() }}
        Элементов на странице:
        <form method="get" action="{{ route('comics.index') }}">
            <select name="perpage">
                <option value="2" @if($comics->perPage() == 2) selected @endif>2</option>
                <option value="3" @if($comics->perPage() == 3) selected @endif>3</option>
                <option value="4" @if($comics->perPage() == 4) selected @endif>4</option>
            </select>
            <input type="submit" value="Change">
        </form>
    </div>
    <a href="{{ route('comics.create') }}" class="btn btn-primary btn-sm">
        Add
    </a>
</div>
@endsection
