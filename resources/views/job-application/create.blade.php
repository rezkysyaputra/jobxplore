<x-layout>

    <x-breadcrumbs class="mb-4" :links="['Jobs' => route(name: 'jobs.index'), $job->title => route('jobs.show', $job), 'Apply' => '#']" />

    <x-job-card class="mb-4" :$job />
    <x-card>
        <div>
            <h1 class="text-xl font-bold mb-4">Apply for {{ $job->title }}</h1>
            <form action="{{ route('job.application.store', $job) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <x-label for="expected_salary" :required="true">Expected Salary</x-label>
                    <x-text-input class="w-full" name="expected_salary" type="number" value="{{ old('expected_salary') }}" />
                </div>

                <div class="mb-4">
                    <x-label for="cv" :required="true">Cover Letter</x-label>
                    <x-text-input type="file" name="cv" />
                </div>

                <x-button class="w-full">
                    Apply
                </x-button>
            </form>
        </div>
    </x-card>
</x-layout>
