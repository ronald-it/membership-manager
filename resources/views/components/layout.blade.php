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

    <body class="min-h-screen flex flex-col lg:grid lg:grid-areas-[header_header,nav_content,footer_footer] grid-cols-[auto_1fr]">

        <header class="text-2xl flex justify-between items-center p-4 sm:p-8 lg:grid-in-[header]">
            <a href="/">
                <img src="/images/Brand logo.png">
            </a>
            <span class="text-base sm:text-lg uppercase">ledenadministratie</span>
        </header>

        <nav class="bg-theme-lavender border-y lg:border-y-0 lg:border-t lg:border-r border-gray-300 flex lg:flex-col flex-wrap justify-between lg:justify-start text-xs sm:text-sm gap-x-2 p-4 sm:p-8 [&>*]:p-2 [&>*]:rounded-3xl lg:grid-in-[nav]">
            <a href="/" class="bg-theme-purple text-white">Families</a>
            <a href="/member-type">Soort lid</a>
            <a href="/contributions">Contributies</a>
            <a href="/" class="text-red-700">Log uit</a>
            <a href="/login" class="">Log in</a>
            <a href="/registration" class="">Registreer</a>
        </nav>

        <main class="grow lg:grid-in-[content] lg:border-t border-gray-300">
            {{ $slot }}
        </main>

        <footer class="bg-theme-ivory text-xs sm:text-sm flex justify-between p-4 sm:p-8 text-gray-500 border-t border-gray-300 lg:grid-in-[footer]">
            <a href="/">
                <img src="/images/Brand logo.png">
            </a>
            <div class="flex flex-col sm:flex-row sm:gap-x-1 sm:items-center sm:order-first">
                    <div>© 2024
                        <span class="text-theme-purple capitalize">membership manager</span>
                    </div>
                    <span class="hidden sm:block">|</span>
                <span class="capitalize">all rights reserved.</span>
            </div>
        </footer>

    </body>
</html>
