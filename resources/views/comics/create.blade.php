<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <h2>Форма для добавления комикса</h2>
    <form action="{{ route("comics.store") }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">Title</label>
            <input
                type="text"
                name="title"
                id="title"
                placeholder="title"
                value="{{ old('title') }}"
            >
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea
                name="description"
                id="description"
                placeholder="description"
            >{{old('description')}}</textarea>
        </div>
        <div>
            <label for="year">Year of release</label>
            <input
                type="nubmer"
                name="year"
                id="year"
                placeholder="year"
                value="{{ old('year') }}"
            >
            @error('year')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="type_comics">Type of comics</label>
            <input
                type="text"
                name="type_comics"
                id="type_comics"
                placeholder="type_comics"
                value="{{ old('type_comics') }}"
            >
            @error('type_comics')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="tags">Tags</label>
            <select type="text" name="tags[]" id="tags" placeholder="tags" multiple>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}"
                        {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}
                    >
                        {{ $tag->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image" placeholder="image">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="link">Link at resource for reading</label>
            <input
                type="text"
                name="link"
                id="link"
                placeholder="link"
                value="{{ old('type_comics') }}"
            >
            @error('link')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
