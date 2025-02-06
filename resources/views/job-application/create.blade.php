<x-layout>

    <x-breadcrumbs class="mb-4" :links="['Jobs' => route(name: 'jobs.index'), $job->title => route('jobs.show', $job), 'Apply' => '#']" />

    <x-job-card class="mb-4" :$job />
    <x-card>
        <h1 class="text-xl font-bold mb-4">Apply for {{ $job->title }}</h1>
        <form action="{{ route('job.application.store', $job) }}" method="post">
            @csrf
            <div class="mb-4">
                <label for="expected_salary" class="block mb-2 text-sm">Expected Salary</label>
                <x-text-input class="w-full" name="expected_salary" type="number" value="{{ old('expected_salary') }}" />
            </div>

            <x-button text="Apply" class="w-full" />
        </form>
    </x-card>
</x-layout>
