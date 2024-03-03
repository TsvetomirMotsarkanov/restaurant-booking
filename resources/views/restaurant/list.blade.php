<x-app-layout>
    @foreach ($restaurants as $restaurant)
        <a href="/restaurants/{{ $restaurant->id }}">
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h2>#{{ $restaurant->id }} {{ $restaurant->name }}</h2>
                            <p>
                                {{ $restaurant->description }}
                            </p>

                            @if ($restaurant->tables->count())
                                <hr>
                                <div>{{ $restaurant->tables->count() }} tables:</div>
                                <ul>
                                    @foreach ($restaurant->tables as $table)
                                        <li>
                                            <div>
                                                {{ $table->seats }} seats | {{ $table->bookings->count() }} bookings
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>

                                @foreach ($restaurant->slots as $slot)
                                    <x-booking-slot :disabled="$slot['disabled']" :class="$slot['disabled']
                                        ? 'pointer-events-none dark:bg-gray-600 bg-gray-400'
                                        : 'bg-gray-800 dark:bg-gray-200'" :href="$slot['disabled'] ? '#' : '/booking/' . $restaurant->id . '?date=' . $slot['value']">
                                        {{ $slot['value']->format('H:i') }}
                                        </x-booking-slotk>
                                @endforeach
                            @else
                                <p>No Tables</p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
</x-app-layout>
