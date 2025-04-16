<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
</head>
<body>
    <h2>Комментарии пользователя {{ $user->name }}:</h2>
    <table>
        <thead>
            <td>id</td>
            <td>Имя пользователя</td>
            <td>ID комикса</td>
            <td>Текст</td>
            <td>Дата</td>
        </thead>
        @foreach ($comments as $comment)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $comment->comics_id }}</td>
                <td>{{ $comment->text }}</td>
                <td>{{ $comment->date_public }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>