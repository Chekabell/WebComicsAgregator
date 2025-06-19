<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
    @vite(['resources/js/app.js', 'resources/scss/app.scss'])
</head>
<body>
    <h2>Список комиксов:</h2>
    <table>
        <thead>
            <th>id</th>
            <th>Название комикса</th>
            <th>Описание</th>
            <th>Редактирование</th>
            <th>Удаление</th>
        </thead>
        <tbody>
            @foreach ($comics as $com)
                <tr>
                    <td>{{ $com->id }}</td>
                    <td>
                        <a href="{{ route('comics.show', $com) }}" class="btn btn-link btn-sm">
                            {{ $com->title }}
                        </a>
                    </td>
                    <td>{{ $com->description }} </td>
                    <td>
                        <form action="{{ route('comics.edit', $com) }}" method="">
                            <button type="submit">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('comics.destroy', $com) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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

</body>
</html>
