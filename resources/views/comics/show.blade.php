@extends('layouts.mainLayout')
@section('content')
<div class="mb-0 pt-5" style="min-height: 100%;
                background: linear-gradient(rgba(63, 63, 63, 0.95), rgba(17, 17, 17, 1)),
                url({{ asset('storage/' . $comics->image) }}) center/cover no-repeat;">
    <div class="container d-flex flex-column">
        <div class="container d-flex flex-row">
            <div class="container d-flex flex-column mb-0 position-sticky top-0 text-white"
                style="min-width: 20%; max-width: 30%;">
                <img
                class="rounded-3 img-fluid"
                src="{{ asset('storage/' . $comics->image) }}"
                style="object-fit:cover; max-width: 360px; max-height: 480px;"
                >
                <a class="btn btn-primary mt-2" href="{{ $comics->link }}">Читать</a>
            </div>
            <div class="container w-75">
                <div>
                    {{ $comics->avg_rating }}
                    *
                    {{ $comics->year }}
                    *
                    {{ $comics->type_comics }}
                </div>
                <h2>{{ $comics->title }}</h2>
                <div class="card bg-dark p-3">
                    {{ $comics->description }}
                    <div class="mt-3">
                        @foreach ($comics->tags as $tag)
                            <span class="badge bg-primary">{{ $tag->title }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="card bg-dark p-3 mt-3 d-flex flex-column">
                    @auth
                        @include('comments.create', [
                            'comics_id' => $comics->id,
                            'user_id' => Auth::user()->id
                        ])
                    @endauth
                    @include('comments.show')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
