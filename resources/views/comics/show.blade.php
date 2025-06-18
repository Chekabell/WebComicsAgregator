<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
</head>
<body>
    <img src="{{ asset('storage/' . $comics->image) }}">
    <h2>Список тэгов:</h2>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Название комикса</th>
                <th>Описание</th>
                <th>Тэги</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="3">{{ $comics->id }}</td>
                <td rowspan="3">{{ $comics->title }}</td>
                <td rowspan="3">{{ $comics->description }}</td>
                <td>{{$comics->tags->implode('title', ' ')}}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
