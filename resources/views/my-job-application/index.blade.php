<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Job Application ' => '#']" />

    @forelse ( $applications as $application )
    <x-job-card class="mb-4" :job="$application->job">
        <div class="flex items-center justify-between">
            <div class="text-sm text-slate-500">
                <div>Applied on {{ $application->created_at->diffForHumans() }}</div>

                <div>
                    Your asking salary ${{ number_format($application->expected_salary) }}

                </div>

                <div>
                    Other {{ Str::plural('applicant', $application->job->job_applications_count - 1) }} {{ $application->job->job_applications_count - 1 }}
                </div>
            </div>
            <div>
                <form action="{{ route('my-job-application.destroy', $application) }}" method="post">
                    @csrf
                    @method('delete')

                    <x-button text="Cancel" class="bg-red-500 hover:bg-red-600" />
                </form>
            </div>
        </div>
    </x-job-card>
    @empty
    <div class="mt-4 py-8 text-center border-2 border-slate-300 rounded-lg p-4 border-dashed text-slate-500">
        <div class=" font-semibold italic">
            You have not applied any job yet.
        </div>
        <div>
            Go find a job <a href="{{ route('jobs.index') }}" class="text-indigo-500 hover:underline font-medium text-sm">here!</a>
        </div>
    </div>
    @endforelse
</x-layout>
