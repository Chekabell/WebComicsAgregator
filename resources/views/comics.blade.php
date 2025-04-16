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
            <td>id</td>
            <td>Название</td>
            <td>Описание</td>
        </thead>
        @foreach ($comics as $co)
            <tr>
                <td>{{ $co->id }}</td>
                <td>{{ $co->title }}</td>
                <td>{{ $co->description }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>