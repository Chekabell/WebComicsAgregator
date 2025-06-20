@extends("layouts.mainLayout")
@section('content')
<div class="mt-5 container d-flex flex-column align-items-center">
    <form class="mt-2 w-50" action="{{ route("comics.store") }}" method="post" enctype="multipart/form-data">
        @csrf
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
                    value="{{ old('title') }}"
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
            >{{old('description')}}</textarea>
        </div>
        <div class="card mt-3 p-3 justify-content-center">
            <div class="mx-5 d-flex flex-row">
                <div>
                    <label class="form-label" for="year">Год выпуска</label>
                    <input
                        class="form-control"
                        type="number"
                        name="year"
                        id="year"
                        placeholder="Год"
                        value="{{ old('year') }}"
                    >
                    @error('year')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="ps-5">
                    <label class="form-label" for="type_comics">Тип комикса</label>
                    <input
                        class="form-control"
                        type="text"
                        name="type_comics"
                        id="type_comics"
                        placeholder="Манга, маньхуа и т.п."
                        value="{{ old('type_comics') }}"
                    >
                    @error('type_comics')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mt-3">
                <label class="form-label" for="tags">Тэги</label>
                <select class="form-select" type="text" name="tags[]" id="tags" multiple>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}"
                            {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}
                        >
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
                    value="{{ old('type_comics') }}"
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
