<x-layout>
    <x-card class="mb-4">
        <div class="flex items-center gap-4 justify-between">
            <div class="space-y-2">
                <h1 class="text-3xl font-bold">Find your dream Jobs</h1>
                <p>Look for jobs? Browse our latest jobs openings to view & apply to the best jobs today!</p>
            </div>
            <div class="">
                <img src="{{ asset('images/job_banner.jpg') }}" alt="job_banner" width="200">
            </div>
        </div>
    </x-card>

    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index')]" />

    <div x-data="">
        <form x-ref="filters" action="{{ route('jobs.index') }}" method="GET">
            <div class="grid grid-cols-4 gap-4">
                <!-- Sidebar Filter (1 kolom) -->
                <aside class="col-span-1 sticky top-4 h-fit text-sm">
                    <x-card>
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-lg font-semibold">Filters</h2>
                            <x-link href="{{ route('jobs.index') }}" class="text-red-500">
                                Clear all
                            </x-link>
                        </div>
                        <!-- Category Filter -->
                        <div class="mb-4">
                            <x-label for="category">Category</x-label>
                            <select name="category" id="category" class="w-full p-2 border border-gray-300 rounded-md text-sm">
                                <option value="">All Categories</option>
                                @foreach (App\Models\Job::$categories as $category)
                                <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                                    {{ ucfirst($category) }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Range salary Filter -->
                        <div class="mb-4">
                            <x-label>Salary</x-label>
                            <div class="flex gap-2 items-center">
                                <x-text-input name="min_salary" placeholder="Min" value="{{ request('min_salary') }}" class="w-full" />
                                <span class="text-sm">to</span>
                                <x-text-input name="max_salary" placeholder="Max" value="{{ request('max_salary') }}" class="w-full" />
                            </div>
                        </div>

                        <!-- Job Type Filter -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-2">Job Type</label>
                            <div class="grid grid-cols-2 gap-2">
                                @foreach (App\Models\Job::$types as $type)
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="checkbox" name="job_type[]" value="{{ $type }}" {{ in_array($type, request('job_type', [])) ? 'checked' : '' }} class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm">
                                    <span class="text-sm">{{ ucfirst($type) }}</span>
                                </label>
                                @endforeach
                            </div>


                        </div>

                        <!-- Experience Filter -->
                        <div class="mb-4">
                            <label class="block text-sm font-medium mb-2">Experience</label>
                            <x-radio-group name="experience" :options="App\Models\Job::$experiences" />
                        </div>

                    </x-card>
                </aside>

                <!-- Main Content (Daftar Jobs) -->
                <main class="col-span-3">
                    <div class="grid grid-cols-5 gap-4 items-center mb-4">
                        <div class="col-span-2">
                            <x-text-input formRef="filters" name="search" placeholder="Search for jobs by title or keywords" value="{{ request('search') }}" />
                        </div>
                        <div class="col-span-2">
                            <x-text-input formRef="filters" name="location" placeholder="Location" value="{{ request('location') }}" />
                        </div>
                        <div class="col-span-1">
                            <x-button class="w-full">
                                Find jobs
                            </x-button>
                        </div>
                    </div>

                    <div class="mb-4 text-sm font-semibold">{{ $jobs->total() }} Job available</div>
                    @foreach ($jobs as $job)
                    <x-job-card :job="$job" class="mb-4">
                        <div class="flex justify-between text-sm items-center">
                            <x-link href="{{ route('jobs.show', $job) }}" class="mt-4 font-medium text-blue-500">
                                Details
                            </x-link>
                            <div class="text-slate-400">Posted {{ $job->created_at->diffForHumans() }}</div>
                        </div>
                    </x-job-card>
                    @endforeach
                    <div class="mb-4">
                        {{ $jobs->links() }}
                    </div>
                </main>
            </div>
        </form>
    </div>

</x-layout>
