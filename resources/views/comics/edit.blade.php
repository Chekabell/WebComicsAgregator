@extends("layouts.mainLayout")
@section('content')
    <div class="mt-5 container d-flex flex-column align-items-center">
        <form class="mt-2 w-50" action="{{ route("comics.update", $comics) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card d-flex flex-row p-3">
                <div class="w-50">
                    <label class="form-label" for="image">Обложка</label>
                    <input class="form-control" type="file" name="image" id="image">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="ps-4">
                    <label class="form-label" for="title">Название на русском</label>
                    <input
                        class="form-control"
                        type="text"
                        name="title"
                        id="title"
                        placeholder="Название"
                        value="{{ old('title', $comics->title ?? '') }}"
                    >
                </div>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="card mt-3 p-3">
                <label class="form-label" for="description">Описание</label>
                <textarea
                    class="form-control"
                    name="description"
                    id="description"
                    placeholder="Описание"
                >{{ old('description', $comics->description ?? '') }}</textarea>
            </div>
            <div class="card mt-3 p-3 justify-content-center">
                <div>
                    <label class="form-label" for="tags">Тэги</label>
                    <select class="form-select" type="text" name="tags[]" id="tags" multiple>
                        @foreach($tags as $tag)
                            <option {{$comics->tags->contains($tag->id) ? 'selected' : '' }}
                                value="{{$tag->id }}">
                                {{ $tag->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <label class="form-label" for="link">Ссылка на ресурс для чтения</label>
                    <input
                        class="form-control"
                        type="text"
                        name="link"
                        id="link"
                        placeholder="Ссылка"
                        value="{{ old('link', $comics->link ?? '') }}"
                    >
                    @error('link')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button class="btn btn-primary my-3 w-100" type="submit">Добавить новый комикс</button>
        </form>
    </div>
@endsection
