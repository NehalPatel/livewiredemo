<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel-Livewire Upload Image</title>

        @livewireStyles
    </head>
    <body>

        @livewire('upload-image')

        @livewireScripts
    </body>
</html>
