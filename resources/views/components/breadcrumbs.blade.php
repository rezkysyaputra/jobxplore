<nav {{ $attributes }}>
    <ul class="flex gap-2 font-medium text-slate-500 text-sm items-center ">
        <li>
            <a href="/" class="hover:underline">Home</a>
        </li>
        @foreach ($links as $label => $link)
        <li>/</li>
        <li>
            <a href="{{ $link }}" class=" hover:underline ">{{ $label }}</a>
        </li>
        @endforeach
    </ul>
</nav>
