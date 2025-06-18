<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <h2>Форма для изменения комикса</h2>
    <form action="{{ route("comics.update", $comics) }}" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="title" value="{{ old('title', $comics->title ?? '') }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" placeholder="description">{{ old('description', $comics->description ?? '') }}</textarea>
        </div>
        <div>
            <label for="tags">Tags</label>
            <select type="text" name="tags[]" id="tags" placeholder="tags" multiple>
                @foreach ($tags as $tag)
                    <option {{$comics->tags->contains($tag->id) ? 'selected' : '' }} value="{{$tag->id }}">{{ $tag->title }}</option>
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
            <input type="text" name="link" id="link" placeholder="link" value="{{ old('link', $comics->link ?? '') }}">
            @error('link')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
