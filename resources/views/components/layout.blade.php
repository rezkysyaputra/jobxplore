<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jobs Board</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="container max-w-4xl mx-auto text-slate-700">
    <nav class="flex justify-between items-center my-8">
        <ul>
            <li>
                <a href="{{ route('jobs.index') }}" class="text-2xl font-bold">
                    JobXplore
                </a>
            </li>
        </ul>

        <ul class="flex gap-4 items-center text-lg font-semibold">
            @auth
            <li class="font-normal">Welcome, {{ auth()->user()->name ?? 'Anonymous' }}</li>
            <li>
                <form action="{{ route('auth.destroy') }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="hover:underline">Log out</button>
                </form>

            </li>
            @else
            <li>
                <x-link href="{{ route('auth.create') }}" text="Log in" />
            </li>
            @endauth
        </ul>
    </nav>
    {{ $slot }}
</body>

</html>
