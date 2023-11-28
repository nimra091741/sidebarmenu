@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300 p-4,m-4']) }}>
    {{ $value ?? $slot }}
</label>
