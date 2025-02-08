<div class="relative">
    @if($formRef)
    <button class="absolute top-1/2 right-2 -translate-y-1/2" @click="$refs['input-{{ $name }}'].value = ''; $refs['{{ $formRef }}'].submit();">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
        </svg>
    </button>

    @endif
    <input x-ref="input-{{ $name }}" type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}" @class(['w-full rounded-md border-0 py-1.5 px-2.5 text-sm ring-1 placeholder:text-slate-400 focus:ring-2', 'pr-8'=> $formRef,'ring-slate-300'=> !$errors->has($name),
    'ring-red-300'=> $errors->has($name)
    ])>
</div>

@error($name)
<div class="mt-1 text-xs text-red-500">
    {{ $message }}
</div>
@enderror
