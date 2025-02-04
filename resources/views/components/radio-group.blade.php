<div>
    <label for="all" class="flex gap-2 mb-0 items-center">
        <input type="radio" id="all" name="{{ $name }}" value="" @checked(!request($name)) class="w-4 h-4 bg-gray-100 border-gray-300" />

        <span>All</span>
    </label>

    @foreach ($options as $option )
    <label for="{{ $option }}" class="flex gap-2 mb-0 items-center w-fit">
        <input type="radio" id="{{ $option }}" name="{{ $name }}" value="{{ $option }}" @checked(request($name)===$option) class="w-4 h-4 bg-gray-100 border-gray-300" />
        <span>{{ ucfirst( $option) }}</span>
    </label>
    @endforeach
</div>
