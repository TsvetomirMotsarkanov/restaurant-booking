@props(['isError' => false])

@php
    $alertStyle = $isError ? 'bg-red-100 text-red-700' : 'bg-green-100 text-green-700';
@endphp

<div x-data="{ visible: true }" x-init="setTimeout(() => { visible = false }, 8000)">
    <div x-show="visible" class="z-50 fixed bottom-4 right-4 {{ $alertStyle }}">
        <div class="flex rounded-lg p-4 mb-4 text-sm" role="alert">
            <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <div>
                {{ $slot }}
            </div>
            <div x-on:click="visible = ! open" class="rounded-lg transition-all hover:bg-white hover:bg-opacity-20">
                <div role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
