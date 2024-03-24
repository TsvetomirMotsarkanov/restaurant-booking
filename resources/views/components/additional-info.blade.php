@props(['name' => null, 'value'])

@if ($value)
    <li {{ $attributes->merge(['class' => 'flex gap-x-3']) }}>
        {{ $slot }}
        <span>
            @if ($name)
                <strong class="font-semibold text-gray-900">{{ $name }}</strong>
            @endif

            {{ $value }}
        </span>
    </li>
@endif
