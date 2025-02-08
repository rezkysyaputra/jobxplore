<x-card {{ $attributes->class(['flex flex-col gap-2']) }}>
    <div class="flex justify-between items-center text-slate-700">
        <div class="font-semibold text-2xl  ">{{ $job->title }}</div>
        <div class="font-semibold text-lg">${{ number_format($job->salary) }} USD</div>
    </div>
    <div class="flex justify-between text-sm flex-col md:flex-row gap-2">
        <div class="flex gap-2 items-center text-slate-500 font-medium">
            <div>{{ $job->employer->company_name }}</div>
            <div class="flex gap-1 items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                </svg>
                {{ $job->location }}
            </div>
        </div>
        <div class="flex gap-2">
            <x-tag>{{ ucfirst($job->experience) }}</x-tag>
            <x-tag>{{ ucfirst($job->type) }}</x-tag>
            <x-tag>{{ $job->category }}</x-tag>
        </div>
    </div>
    <div>
        {{ $slot }}
    </div>
</x-card>
