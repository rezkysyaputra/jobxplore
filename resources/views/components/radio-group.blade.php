@if($allOption)
<label for="all" class="flex gap-2 mb-0 items-center">
    <input type="radio" id="all" name="{{ $name }}" value="" @checked(!request($name)) class="w-4 h-4 bg-gray-100 border-gray-300" />

    <span>All</span>
</label>
@endif

@foreach ($options as $option )
<label for="{{ $option }}" class="flex gap-2 mb-0 items-center w-fit">
    <input type="radio" id="{{ $option }}" name="{{ $name }}" value="{{ $option }}" @checked($option===$value ?? request($name)) class="w-4 h-4 bg-gray-100 border-gray-300" />
    <span>{{ ucfirst( $option) }}</span>
</label>
@endforeach

@error($name)
<div class="mt-1 text-xs text-red-500">
    {{ $message }}
</div>
@enderror
