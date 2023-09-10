@props([
    'size' => 16,
    'color' => 'white'
])

<div {{ $attributes->merge(['class' => 'p-6'])->class(['p-6' => true]) }}>
    {{ $slot }}
</div>