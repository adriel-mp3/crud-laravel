<div
    {{ $attributes->merge(['class' => 'flex p-4 text-sm rounded-lg bg-gray-600 text-red-400 border-2 border-gray-500']) }} role="alert">
    <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
        fill="currentColor" viewBox="0 0 20 20">
        <path
            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
    </svg>
    <span class="sr-only">
        Ocorreu um erro.
    </span>
    <div>
        <span class="font-medium">{{ $label }}</span>
        <ul class="mt-1.5 list-disc list-inside">
            @foreach ($errors as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
