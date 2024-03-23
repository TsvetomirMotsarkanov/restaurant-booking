@props(['name', 'value'])

@if ($value)
    <li class="flex gap-x-3">
        <svg class="mt-1 h-5 w-5 flex-none text-indigo-600" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            {{ $slot }}
        </svg>
        <span><strong class="font-semibold text-gray-900">{{ $name }}</strong> {{ $value }}</span>
    </li>
@endif
