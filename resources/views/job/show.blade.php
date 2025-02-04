<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => '#']" />
    <x-job-card :$job class="mb-6">
        <div class="text-sm mt-4">
            {!! nl2br(e($job->description)) !!}
        </div>
    </x-job-card>

    <div>
        <div class="flex gap-2  items-center mb-4  text-slate-700   text-lg">
            <div>Explore more from {{ $job->employer->company_name }} jobs</div> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">

                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
