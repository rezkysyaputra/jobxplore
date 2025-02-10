<x-layout>
    <x-breadcrumbs :links="['My Jobs'=> route('my-jobs.index'), 'Edit' => '#']" class="mb-4" />
    <x-card class="mb-4">
        <h1 class="text-2xl font-semibold mb-4">Edit your Job</h1>
        <form action="{{ route('my-jobs.update', $job) }}" method="post">
            @csrf
            @method('put')
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">Title</x-label>
                    <x-text-input name="title" :value="$job->title" />
                </div>
                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input name="location" :value="$job->location" />
                </div>

                <div class="col-span-full">
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input name="salary" type="number" :value="$job->salary" />
                </div>

                <div class="col-span-full">
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        <div>
                            <x-label for="type" :required="true">Type</x-label>
                            <x-radio-group :allOption="false" :value="$job->type" name="type" :options="\App\Models\Job::$types" />
                        </div>
                        <div>
                            <x-label for="experience" :required="true">Experience</x-label>
                            <x-radio-group name="experience" :allOption="false" :value="$job->experience" :options="\App\Models\Job::$experiences" />
                        </div>
                        <div>
                            <x-label for="category" :required="true">Category</x-label>
                            <select name="category" id="category" class="w-full p-2 border border-gray-300 rounded-md text-sm">
                                <option value="" {{ old('category', $job->category) == '' ? 'selected' : '' }}>Select Category</option>
                                @foreach (App\Models\Job::$categories as $category)
                                <option value="{{ $category }}" {{ old('category', $job->category) == $category ? 'selected' : '' }}>
                                    {{ ucfirst($category) }}
                                </option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="mt-1 text-xs text-red-500">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-span-full">
                    <x-label for="description" :required="true">Description</x-label>
                    <x-text-input name="description" type="textarea" :value="$job->description" />
                </div>

                <div class="col-span-full">
                    <x-button class="w-full">Edit Job</x-button>
                </div>
            </div>
        </form>
    </x-card>
</x-layout>
