@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-neutral-400']) }}>
    {{ $value ?? $slot }}
</label>
