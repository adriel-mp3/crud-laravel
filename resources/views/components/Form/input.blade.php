<div class="mb-4">
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-600">
        {{ $label }}
    </label>
    <input name="{{ $name }}"
        {{ $attributes->merge(['class' => 'border text-sm rounded-lg block w-full p-2.5 bg-gray-150 border-gray-400 placeholder-gray-400 text-gray-700 focus:ring-blue-500 focus:border-blue-500']) }} />
    {{ $slot }}
</div>
