<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>609-21</title>
</head>
<body>
    <h2>Профиль пользователя {{ $user->name }}:</h2>
    <table>
        <thead>
            <td>id</td>
            <td>Имя пользователя</td>
        </thead>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
    </table>
</body>
</html>