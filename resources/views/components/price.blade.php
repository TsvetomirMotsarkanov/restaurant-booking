@props(['priceInfo', 'noLabel' => false, 'iconOnly' => false])

@php
    $price = '';
    switch ($priceInfo) {
        case 1:
            $price = '£20 and under';
            break;

        case 2:
            $price = '£25 and under';
            break;

        case 3:
            $price = '£26 to £40';
            break;

        case 4:
            $price = '£40 and over';
            break;

        default:
            $price = '£26 to £40';
            break;
    }
@endphp

@if ($iconOnly)
    <div class="flex">
        @for ($i = 0; $i < 4; $i++)
            <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $priceInfo > $i ? 'black' : '#dfdbe5' }}" height="24"
                viewBox="0 -960 960 960" width="20">
                <path
                    d="M240-120v-80l16.5-10q16.5-10 36-29.5t35.5-50q16-30.5 16-70.5 0-11-1.5-21t-3.5-19h-99v-80h60q-21-33-40.5-69.5T240-640q0-92 64-156t156-64q71 0 126 39t79 101l-74 31q-15-40-50.5-65.5T460-780q-58 0-99 41t-41 99q0 48 24 80t49 80h167v80H421q2 9 2.5 19t.5 21q0 50-17.5 90T364-200h196q40 0 61-21t29-54l70 35q-11 55-56.5 87.5T560-120H240Z" />
            </svg>
        @endfor
    </div>
@else
    <x-additional-info class="{{ $noLabel ? 'gap-x-0' : 'gap-x-3' }}" name="{{ $noLabel ? '' : 'Price' }}"
        :value="$price">
        <svg class="{{ $noLabel ? '' : 'mt-1 h-5 w-5 flex-none text-indigo-600' }}" fill="currentColor"
            xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
            <path
                d="M240-120v-80l16.5-10q16.5-10 36-29.5t35.5-50q16-30.5 16-70.5 0-11-1.5-21t-3.5-19h-99v-80h60q-21-33-40.5-69.5T240-640q0-92 64-156t156-64q71 0 126 39t79 101l-74 31q-15-40-50.5-65.5T460-780q-58 0-99 41t-41 99q0 48 24 80t49 80h167v80H421q2 9 2.5 19t.5 21q0 50-17.5 90T364-200h196q40 0 61-21t29-54l70 35q-11 55-56.5 87.5T560-120H240Z" />
        </svg>
    </x-additional-info>
@endif
