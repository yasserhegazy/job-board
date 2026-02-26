@props(['color' => 'slate'])
@php
$colorClasses = match($color) {
    'green' => 'border-green-200 bg-green-50 text-green-700',
    'yellow' => 'border-yellow-200 bg-yellow-50 text-yellow-700',
    'red' => 'border-red-200 bg-red-50 text-red-700',
    'blue' => 'border-blue-200 bg-blue-50 text-blue-700',
    'purple' => 'border-purple-200 bg-purple-50 text-purple-700',
    'indigo' => 'border-indigo-200 bg-indigo-50 text-indigo-700',
    default => 'border-slate-200 bg-slate-50 text-slate-700',
};
@endphp
<span {{ $attributes->merge(['class' => "inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-medium $colorClasses"]) }}>
    {{ $slot }}
</span>
