@props([
    'icon' => null,
    'value',
])
<a {{ $attributes->merge(['class' => 'text-capitalize rounded-pill btn']) }}>
    @if ($icon)
        <i class="{{ $icon }}"></i>
    @endif
    {{ $value ?? $slot }}
</a>
