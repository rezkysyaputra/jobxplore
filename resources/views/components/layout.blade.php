<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jobs Board</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="container max-w-6xl mx-auto text-slate-700">
    <nav class="flex justify-between items-center my-8">
        <ul>
            <li>
                <a href="{{ route('jobs.index') }}" class="text-2xl font-bold">
                    JobXplore
                </a>
            </li>
        </ul>

        <ul class="flex gap-4 items-center text-md font-semibold">
            @auth
            <li class="font-normal text-sm">
                <a href="{{ route('my-job-application.index') }}">
                    <div class="flex items-center gap-4">
                        <div class="relative inline-flex items-center justify-center w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                            <span class="font-medium text-gray-600 dark:text-gray-300">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}{{ strtoupper(substr(auth()->user()->name, strpos(auth()->user()->name, ' ') + 1, 1) ?? '') }}
                            </span>
                        </div>
                        <div class="font-medium dark:text-white">
                            <div>{{ auth()->user()->name }}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">
                                Joined in {{ \Carbon\Carbon::parse(auth()->user()->created_at)->format('F Y') }}
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <form action="{{ route('auth.destroy') }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="hover:underline flex items-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                        </svg>
                    </button>
                </form>
            </li>

            @else
            <li>
                @if(URL::current() !== route('auth.create'))
                <x-link href="{{ route('auth.create') }}" text="Log in" />
                @else
                <x-link href="" text="Sign up" />
                @endif
            </li>
            @endauth
        </ul>
    </nav>
    @if(session()->has('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-2" role="alert">
        <p class="font-bold">Success</p>
        <p>{{ session()->get('success') }}</p>
    </div>
    @endif
    {{ $slot }}
</body>
</html>
