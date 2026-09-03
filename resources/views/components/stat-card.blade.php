@props(['label', 'value', 'color' => 'blue'])

@php
$colors = [
    'blue' => 'bg-blue-50 text-blue-700 border-blue-100',
    'green' => 'bg-green-50 text-green-700 border-green-100',
    'purple' => 'bg-purple-50 text-purple-700 border-purple-100',
    'orange' => 'bg-orange-50 text-orange-700 border-orange-100',
];
$colorClass = $colors[$color] ?? $colors['blue'];
@endphp

<div class="bg-white rounded-xl border border-gray-100 shadow-sm p-8">
    <div class="flex items-center gap-5">
        <div class="w-16 h-16 rounded-lg {{ $colorClass }} flex items-center justify-center border shrink-0">
            {{ $icon }}
        </div>
        <div>
            <p class="text-base text-gray-500">{{ $label }}</p>
            <p class="text-4xl font-bold text-gray-900">{{ $value }}</p>
        </div>
    </div>
</div>