<x-layout>
    <x-breadcrumbs :links="['My Jobs'=> '#']" class="mb-4" />

    <div class="flex justify-end mb-4">
        <a href="{{ route('my-jobs.create') }}" class="border py-2 px-4 rounded-lg border-slate-300 hover:no-underline hover:bg-slate-200 font-medium">
            Create Job
        </a>
    </div>
    @forelse ($jobs as $job)
    <x-job-card :$job class="mb-4">
        <div class="text-sm items-center text-slate-500">
            <div class="flex justify-end mb-4">Created {{ $job->created_at->diffForHumans() }}</div>
            @forelse ($job->jobApplications as $application )
            <div class="flex justify-between items-center mb-4">
                <div>
                    <div>{{ $application->user->name }}</div>
                    <div>Applied {{ $application->created_at->diffForHumans() }}</div>
                    <div>Download CV</div>
                </div>
                <div>${{ number_format($application->expected_salary)  }}</div>
            </div>
            @empty
            <div class="mb-4">No Applicants!</div>
            @endforelse

            <div class="flex">
                <a href="{{ route('my-jobs.edit', $job) }}" class="border py-2 px-4 rounded-lg border-slate-300 hover:no-underline hover:bg-slate-200 font-medium">Edit</a>
            </div>
        </div>
    </x-job-card>
    @empty
    <div class="mt-4 py-8 text-center border-2 border-slate-300 rounded-lg p-4 border-dashed text-slate-500">
        <div class=" font-semibold italic">
            You have not created any job yet.
        </div>
        <div>
            Go create a job <a href="{{ route('my-jobs.create') }}" class="text-indigo-500 hover:underline font-medium text-sm">here!</a>
        </div>
    </div>
    @endforelse
</x-layout>
