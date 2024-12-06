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

    <body class="min-h-screen flex flex-col">
        <header class="text-2xl flex justify-between items-center p-4">
            <img src="/images/Brand logo.png">
            <span class="text-base uppercase">ledenadministratie</span>
        </header>
        <nav class="bg-theme-lavender border-y-[0.1rem] border-gray-300 flex justify-between text-xs gap-x-2 p-4 [&>*]:p-2 [&>*]:rounded-3xl">
            <a class="bg-theme-purple text-white">Families</a>
            <a>Soort lid</a>
            <a>Contributies</a>
            <a class="text-red-700">Log uit</a>
            <a class="hidden">Log in</a>
            <a class="hidden">Registreer</a>
        </nav>
        <main class="grow">
          {{ $slot }}
        </main>
        <footer class="bg-theme-ivory text-xs flex justify-between p-4">
            <img src="/images/Brand logo.png">
            <div class="flex flex-col">
                <span>© 2024  membership manager</span>
                <span>All rights reserved.</span>
            </div>
        </footer>
    </body>
</html>
