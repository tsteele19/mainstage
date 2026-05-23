<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Mainstage') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-white">
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <x-sidebar />

        {{-- Main Wrapper --}}
        <div class="flex flex-1 flex-col overflow-hidden">
            {{-- Header --}}
            <x-header />

            {{-- Page Content --}}
            <main class="flex-1 p-8 bg-slate-900 overflow-y-auto">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
