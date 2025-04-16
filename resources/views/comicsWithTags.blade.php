<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
</head>
<body>
    <h2>Список тэгов:</h2>
    <table>
        <thead>
            <td>id</td>
            <td>Название комикса</td>
            <td>Тэги</td>
        </thead>
        @foreach ($tags as $tag)
            <tr>
                <td>{{ $comics->id }}</td>
                <td>{{ $comics->title }}</td>
                <td>{{ $tag->title }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>