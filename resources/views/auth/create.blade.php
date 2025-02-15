<x-layout>
    <x-card class="max-w-lg w-full py-12 px-16 bg-white shadow-lg rounded-lg mx-auto mt-12 ">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold">Sign in to JobXplore</h1>
            <p class="mt-2 text-slate-500">Explore Your Dream Career</p>
        </div>
        <form action="{{ route('auth.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-label for="email">Email</x-label>
                <x-text-input class="w-full" type="email" name="email" value="{{ old('email') }}" />
            </div>
            <div class="mb-4">
                <x-label for="password">Password</x-label>
                <x-text-input class="w-full" type="password" name="password" />
            </div>
            <div class="mb-8 flex justify-between">
                <div class="flex gap-2 items-center">
                    <input type="checkbox" id="remember" name="remember" class="rounded-sm border border-slate-400">
                    <label for="remember" class="text-sm w-fit">Remember me</label>
                </div>
                <div>
                    <a href="#" class="text-sm text-indigo-600 hover:underline">Forgot Password?</a>
                </div>
            </div>
            <x-button class="w-full mb-4">
                Sign in
            </x-button>

            <div class="text-center text-slate-500 text-sm">
                You don't have an account? <x-link :href="route('register.create')" class="text-indigo-500">Sign up</x-link>
            </div>
        </form>
    </x-card>
</x-layout>
