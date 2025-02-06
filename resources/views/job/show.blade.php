<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => '#']" />
    <x-job-card :$job class="mb-6">
        <div class="text-sm my-4">
            {!! nl2br(e($job->description)) !!}
        </div>
        <div class="my-4">
            @can('apply', $job)
            <x-link href="{{ route('job.application.create', $job) }}" text="Apply" class="border border-slate-300 rounded-lg hover:no-underline hover:bg-slate-200 py-2 px-4 font-medium" />
            @else
            <div class="flex items-center p-3 w-fit text-sm text-gray-800 border border-gray-300 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600" role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="font-medium">
                    Your has been applied this job.
                </div>
            </div>
            @endcan
        </div>
    </x-job-card>

    <div>
        <div class="flex gap-2 font-medium  items-center mb-4  text-slate-700   text-lg">
            <div>Explore more from {{ $job->employer->company_name }} jobs</div> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.0" stroke="currentColor" class="size-5">

                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            @foreach ($job->employer->jobs as $otherJob)
            <x-card>
                <div class="mb-4">
                    <a class="underline line-clamp-2" href="{{ route('jobs.show', $otherJob) }}">{{ $otherJob->title }}</a>
                    <div class="text-slate-400 text-xs mt-2">${{ number_format($otherJob->salary) }} USD | Posted {{ $otherJob->created_at->diffForHumans() }}</div>
                </div>
                <div class="flex flex-col md:flex-row gap-2">
                    <x-tag>{{ $otherJob->type }}</x-tag>
                    <x-tag>{{ $otherJob->experience }}</x-tag>
                    <x-tag>{{ $otherJob->category }}</x-tag>
                </div>
            </x-card>
            @endforeach
        </div>
    </div>
</x-layout>
