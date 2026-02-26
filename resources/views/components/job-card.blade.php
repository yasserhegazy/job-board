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

<x-card class="mb-4 border-l-4 border-l-indigo-400 hover:shadow-md transition-shadow duration-200 relative">
  @if ($job->deleted_at)
    <div class="absolute top-2 right-2">
      <span class="inline-flex items-center rounded-full bg-red-100 px-2.5 py-0.5 text-xs font-medium text-red-700 border border-red-200">Deleted</span>
    </div>
  @endif

  <div class="mb-4 flex justify-between items-start">
    <h2 class="text-lg font-medium">{{ $job->title }}</h2>
    <span class="bg-green-50 text-green-700 rounded-full px-3 py-1 text-sm font-semibold">
      ${{ number_format($job->salary) }}
    </span>
  </div>

  <div class="mb-4 flex items-center justify-between text-sm text-slate-500">
    <div class="flex items-center space-x-4">
      <div>{{ $job->employer->company_name }}</div>
      <div>{{ $job->location }}</div>
    </div>
    <div class="flex space-x-1.5">
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
  </div>

  {{ $slot }}
</x-card>
