<nav {{ $attributes }}>
  <ul class="flex items-center space-x-2 text-sm text-slate-500">
    <li>
      <a href="/" class="hover:text-indigo-600 transition-colors">Home</a>
    </li>

    @foreach ($links as $label => $link)
      <li class="text-slate-400">›</li>
      <li>
        @if ($loop->last)
          <span class="font-medium text-slate-700">{{ $label }}</span>
        @else
          <a href="{{ $link }}" class="hover:text-indigo-600 transition-colors">{{ $label }}</a>
        @endif
      </li>
    @endforeach
  </ul>
</nav>
