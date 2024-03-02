<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $restaurant->name }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>
                        {{ $restaurant->description }}
                    </p>

                    Tables:
                    @foreach ($restaurant->tables as $table)
                        <div>#{{ $table->id }} with {{ $table->seats }} seats {{ $table->bookings->count() }} </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
