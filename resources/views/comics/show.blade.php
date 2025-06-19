@extends('layouts.mainLayout')
@section('content')
    <div class="container d-flex flex-column">
        <div class="container d-flex flex-row">
            <div class="container w-25">
                <img class="img-fluid" src="{{ asset('storage/' . $comics->image) }}">
            </div>
            <div class="container w-75">
                <div class="row">
                    <div class="col-2">
                        Название комикса
                    </div>
                    <div class="col-10">
                        {{ $comics->title }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Описание
                    </div>
                    <div class="col-10">
                        {{ $comics->description }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        Тэги
                    </div>
                    <div class="col-10">
                        @foreach ($comics->tags as $tag)
                            <div class="badge bg-primary">
                                {{ $tag->title }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @auth
            @include('comments.create', [
                'comics_id' => $comics->id,
                'user_id' => Auth::user()->id
            ])
        @endauth
        @include('comments.show')
    </div>
@endsection
