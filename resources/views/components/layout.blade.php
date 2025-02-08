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
            <li>
                <x-link href="{{ route('my-jobs.index') }}">
                    My Jobs
                </x-link>
            </li>
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
            <li class="text-lg">
                @if(URL::current() !== route('auth.create'))
                <x-link href="{{ route('auth.create') }}">
                    Log in
                </x-link>
                @else
                <x-link href="">
                    Sign up
                </x-link>
                @endif
            </li>
            @endauth
        </ul>
    </nav>

    @if (session('success') || session('error'))
    <div x-data="{ showAlert: true }" x-show="showAlert" x-transition.duration.300ms x-init="setTimeout(() => showAlert = false, 3000)" class="fixed top-4 right-4 z-50 w-96 shadow-lg rounded-lg p-4 text-sm" :class="{
                'bg-green-100 border border-green-400 text-green-700': '{{ session('success') }}',
                'bg-red-100 border border-red-400 text-red-700': '{{ session('error') }}'
            }" role="alert">

        <strong class="font-bold">
            {{ session('success') ? 'Success!' : 'Error!' }}
        </strong>
        <span class="block sm:inline">
            {{ session('success') ?? session('error') }}
        </span>

        <button @click="showAlert = false" class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-gray-600" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <title>Close</title>
                <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
            </svg>
        </button>
    </div>
    @endif
    {{ $slot }}
</body>
</html>
