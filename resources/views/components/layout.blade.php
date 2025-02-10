<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jobs Board</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-head.tinymce-config />
</head>

<body class="container max-w-6xl mx-auto text-slate-700">
    <x-navbar />

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
