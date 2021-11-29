<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @livewireStyles
    @livewireScripts
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-image: url('https://od.lk/s/ODhfMTExMjY0MTVf/note.png');" class="bg-black h-screen antialiased leading-none font-sans">
    @livewire('notes')
</body>
</html>
