<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
        @livewireStyles
    </head>

    <body class="bg-light">
        {{ $slot }}

        @livewireScripts
    </body>
</html>
