<div class="space-y-1.5">
  @if ($allOption)
    <label for="{{ $name }}" class="flex cursor-pointer items-center rounded-md px-2 py-1.5 transition hover:bg-slate-50">
      <input type="radio" name="{{ $name }}" value=""
        class="text-indigo-600 focus:ring-indigo-500"
        @checked(!request($name)) />
      <span class="ml-2 text-sm text-slate-600">All</span>
    </label>
  @endif

  @foreach ($optionsWithLabels as $label => $option)
    <label for="{{ $name }}" class="flex cursor-pointer items-center rounded-md px-2 py-1.5 transition hover:bg-slate-50">
      <input type="radio" name="{{ $name }}" value="{{ $option }}"
        class="text-indigo-600 focus:ring-indigo-500"
        @checked($option === ($value ?? request($name))) />
      <span class="ml-2 text-sm text-slate-600">{{ $label }}</span>
    </label>
  @endforeach
    @error($name)
    <div class="mt-1 text-xs text-red-500">
      {{ $message }}
    </div>
  @enderror
</div>
