<label for="{{ $for  }}" class="block text-sm font-medium mb-2">
    {{ $slot }} @if($required)
    <span class="text-red-500">*</span>
    @endif
</label>
