@php
$expColor = match($job->experience) {
    'entry' => 'green',
    'intermediate' => 'yellow',
    'senior' => 'red',
    default => 'slate',
};
$catColor = match($job->category) {
    'IT' => 'blue',
    'Finance' => 'purple',
    'Sales' => 'indigo',
    'Marketing' => 'yellow',
    default => 'slate',
};
@endphp

<x-card class="mb-4 transition-all duration-200 hover:shadow-md relative {{ $job->deleted_at ? 'opacity-75' : '' }}">
  @if ($job->deleted_at)
    <div class="absolute top-3 right-3">
      <span class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-700 border border-red-200">Deleted</span>
    </div>
  @endif

  <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
    <div class="min-w-0 flex-1">
      <h2 class="text-lg font-semibold text-slate-900">{{ $job->title }}</h2>
      <div class="mt-1.5 flex flex-wrap items-center gap-x-4 gap-y-1 text-sm text-slate-500">
        <span class="flex items-center gap-1">
          <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" /></svg>
          {{ $job->employer->company_name }}
        </span>
        <span class="flex items-center gap-1">
          <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" /></svg>
          {{ $job->location }}
        </span>
      </div>
    </div>
    <span class="inline-flex items-center rounded-lg bg-green-50 px-3 py-1.5 text-sm font-bold text-green-700 ring-1 ring-green-200 shrink-0">
      ${{ number_format($job->salary) }}
    </span>
  </div>

  <div class="mt-4 flex flex-wrap gap-2">
    <x-tag :color="$expColor">
      <a href="{{ route('jobs.index', ['experience' => $job->experience]) }}">
          {{ Str::ucfirst($job->experience) }}
      </a>
    </x-tag>
    <x-tag :color="$catColor">
      <a href="{{ route('jobs.index', ['category' => $job->category]) }}">
          {{ $job->category }}
      </a>
    </x-tag>
  </div>

  {{ $slot }}
</x-card>
