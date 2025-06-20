<!DOCTYPE html>
<html class="h-100" lang="en" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <title>609-21</title>
        @vite(['resources/js/app.js', 'resources/scss/app.scss'])
    </head>
    <body class="h-100">
        @include('components.header')
        <div class="pt-4 h-100">
            @section('content')
            @show
        </div>
    </body>
</html>
