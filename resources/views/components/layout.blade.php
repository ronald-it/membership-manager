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

    <body class="min-h-screen flex flex-col lg:grid lg:grid-areas-[header_header,nav_content,footer_footer] grid-cols-[auto_1fr] grid-rows-[auto_1fr]">

        <header class="text-2xl flex justify-between items-center p-4 sm:p-8 lg:grid-in-[header]">
            <a href="/">
                <img src="/images/Brand logo.png">
            </a>
            <span class="text-base sm:text-lg uppercase">ledenadministratie</span>
        </header>

        <nav class="bg-theme-lavender border-y lg:border-y-0 lg:border-t lg:border-r border-gray-300 text-xs sm:text-sm p-4 sm:p-8 lg:grid-in-[nav] lg:flex lg:flex-col">
            <div class="[&>*]:p-2 lg:[&>*]:p-4 [&>*]:rounded-3xl lg:[&>*]:gap-x-2 w-full flex lg:flex-col lg:justify-start {{Auth::check() ? 'justify-between' : 'justify-center'}} flex-wrap lg:grow">
                @if (Auth::check())
                <a href="/" @class([
                    'flex',
                    'bg-theme-purple' => request()->is('/'),
                    'text-white' => request()->is('/')
                ])>
                    <img class="hidden lg:block" src="/images/overview icon {{request()->is('/') ? 'white' : 'black'}}.png"/>
                    <span class="block first-letter:uppercase">families</span>
                </a>
                <a href="/lidsoort" @class([
                    'flex',
                    'bg-theme-purple' => request()->is('lidsoort'),
                    'text-white' => request()->is('lidsoort')
                ])>
                    <img class="hidden lg:block" src="/images/member type icon {{request()->is('lidsoort') ? 'white' : 'black'}}.png"/>
                    <span class="block first-letter:uppercase">soort leden</span>
                </a>
                <a href="/contributie" @class([
                    'flex',
                    'bg-theme-purple' => request()->is('contributie'),
                    'text-white' => request()->is('contributie')
                ])>
                    <img class="hidden lg:block" src="/images/contributions icon {{request()->is('contributie') ? 'white' : 'black'}}.png"/>
                    <span class="block first-letter:uppercase">contributies</span>
                </a>
                <form class="text-[#CD0000] flex lg:hidden p-2 lg:p-4 rounded-3xl" action="/uitloggen" method="POST">
                    @csrf
                    <button class="lg:flex lg:gap-x-2" type="submit">
                        <img class="hidden lg:block" src="/images/logout icon.png"/>
                        <span class="block first-letter:uppercase">log uit</span>
                    </button>
                </form>
                @else
                <a href="/login" @class([
                    'flex',
                    'bg-theme-purple' => request()->is('login'),
                    'text-white' => request()->is('login')
                ])>
                    <img class="hidden lg:block" src="/images/login icon {{request()->is('login') ? 'white' : 'black'}}.png"/>
                    <span class="block first-letter:uppercase">log in</span>
                </a>
                <a href="/registratie" @class([
                    'flex',
                    'bg-theme-purple' => request()->is('registratie'),
                    'text-white' => request()->is('registratie')
                ])>
                    <img class="hidden lg:block" src="/images/register icon {{request()->is('registratie') ? 'white' : 'black'}}.png"/>
                    <span class="block first-letter:uppercase">registreer</span>
                </a>
                @endif
            </div>
            @if (Auth::check())
            <form class="text-[#CD0000] hidden lg:flex p-2 lg:p-4 rounded-3xl" action="/uitloggen" method="POST">
                @csrf
                <button class="lg:flex lg:gap-x-2" type="submit">
                    <img class="hidden lg:block" src="/images/logout icon.png"/>
                    <span class="block first-letter:uppercase">log uit</span>
                </button>
            </form>
            @endif
        </nav>

        <main class="grow lg:grid-in-[content] lg:border-t border-gray-300 flex flex-col">
            @if (Auth::check() || request()->is('login') || request()->is('registratie'))
            {{ $slot }}
            @else
            <x-not_logged_in/>
            @endif
        </main>

        <footer class="bg-theme-ivory text-xs sm:text-sm flex justify-between p-4 sm:p-8 text-gray-500 border-t border-gray-300 lg:grid-in-[footer]">
            <a href="/">
                <img src="/images/Brand logo.png">
            </a>
            <div class="flex flex-col sm:flex-row sm:gap-x-1 sm:items-center sm:order-first">
                    <div>© 2024
                        <span class="text-theme-purple capitalize">Ledenadministratie</span>
                    </div>
                    <span class="hidden sm:block">|</span>
                <span class="capitalize">all rights reserved.</span>
            </div>
        </footer>

    </body>
</html>
