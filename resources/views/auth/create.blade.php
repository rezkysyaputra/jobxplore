<x-layout>
    <x-card class="max-w-lg w-full py-12 px-16 bg-white shadow-lg rounded-lg mx-auto mt-24">

        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold">Log in to JobXplore</h1>
            <p class="mt-2 text-slate-500">Explore Your Dream Career</p>
        </div>



        <form action="{{ route('auth.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm">Email</label>
                <x-text-input class="w-full" type="email" name="email" value="{{ old('email') }}" />
            </div>
            <div class="mb-4">
                <label for="password" class="block mb-2 text-sm">Password</label>
                <x-text-input class="w-full" type="password" name="password" value="{{ old('password') }}" />
            </div>
            <div class="mb-8 flex justify-between">
                <div class="flex gap-2 items-center">
                    <x-text-input type="checkbox" name="remember" value="1" />
                    <label for="remember" class="text-sm">Remember me</label>
                </div>
                <div>
                    <a href="#" class="text-sm text-indigo-600 hover:underline">Forgot Password?</a>
                </div>
            </div>
            <x-button class="w-full" text="Log in" />
        </form>
    </x-card>
</x-layout>
