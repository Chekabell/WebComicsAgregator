<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
</head>
<body>
    <h2>Список комиксов:</h2>
    <table>
        <thead>
            <td>ID</td>
            <td>Тэг</td>
            <td>ID комикса</td>
            <td>Название комикса</td>
            <td>Описание</td>
        </thead>
        @foreach ($comics as $com)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->title }}</td>
                <td>{{ $com->id }}</td>
                <td>{{ $com->title }}</td>
                <td>{{ $com->description }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>