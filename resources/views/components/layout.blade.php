<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? 'Laravel' }}</title>

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>

    <body class="min-h-screen border-2 border-blue-500 [&>*]:border-2 [&>*]:border-black">
        <header class="text-theme-purple text-2xl flex justify-between px-4">
          <span>X</span>
          <span>Ledenadministratie</span>
        </header>
        <nav class="bg-theme-lavender flex justify-between text-xs gap-x-2 px-4">
            <a>Families</a>
            <a>Soort lid</a>
            <a>Contributies</a>
            <a>Log uit</a>
            <a class="hidden">Log in</a>
            <a class="hidden">Registreer</a>
        </nav>
        <main>
          {{ $slot }}
        </main>
        <footer class="bg-theme-ivory text-xs flex justify-center">© 2024  membership manager  | All rights reserved.</footer>
    </body>
</html>
