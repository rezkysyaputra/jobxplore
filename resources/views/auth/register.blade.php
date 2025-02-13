<x-layout>
    <x-card class="max-w-lg w-full py-12 px-16 bg-white shadow-lg rounded-lg mx-auto mt-12 ">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold">Create an account</h1>
            <p class="mt-2 text-slate-500">Explore Your Dream Career</p>
        </div>
        <form action="{{ route('register.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-label for="name">Name</x-label>
                <x-text-input class="w-full" type="name" name="name" value="{{ old('name') }}" />
            </div>
            <div class="mb-4">
                <x-label for="email">Email</x-label>
                <x-text-input class="w-full" type="email" name="email" value="{{ old('email') }}" />
            </div>
            <div class="mb-4">
                <x-label for="password">Password</x-label>
                <x-text-input class="w-full" type="password" name="password" />
            </div>
            <div class="mb-4">
                <x-label for="password_confirmation">Confirm Password</x-label>
                <x-text-input class="w-full" type="password" name="password_confirmation" />
            </div>
            <x-button class="w-full mb-4">
                Sign up
            </x-button>

            <div class="text-center text-slate-500 text-sm">
                Already have an account? <x-link :href="route('register.create')" class="text-indigo-500">Sign in</x-link>
            </div>
        </form>
    </x-card>
</x-layout>
