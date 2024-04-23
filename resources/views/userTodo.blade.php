<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>sample-app</title>

        @viteReactRefresh
        @vite(['resources/sass/app.scss', 'resources/ts/userTodo.tsx'])

    </head>

    <body class="antialiased">
        <div id="app"></div>
    </body>
</html>