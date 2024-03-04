<x-app-layout>
    @include('restaurant.partials.search-form')

    @foreach ($restaurants as $restaurant)
        <div class="py-6 mt-2">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl rounded-3xl flex flex-wrap md:flex-nowrap">
                    <img src="https://picsum.photos/200/200" alt="">
                    <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col justify-between">
                        <a href="/restaurants/{{ $restaurant->id }}">
                            <h2>#{{ $restaurant->id }} {{ $restaurant->name }}</h2>
                            <p>
                                {{ $restaurant->description }}
                            </p>

                            @if ($restaurant->tables->count())
                                {{-- this is for debugging purposes --}}
                                {{-- <hr>
                                <div>{{ $restaurant->tables->count() }} tables:</div>
                                <ul>
                                    @foreach ($restaurant->tables as $table)
                                        <li>
                                            <div>
                                                {{ $table->seats }} seats | {{ $table->bookings->count() }} bookings
                                            </div>
                                        </li>
                                    @endforeach
                                </ul> --}}

                                <div>
                                    @foreach ($restaurant->slots as $slot)
                                        <x-booking-slot :disabled="$slot['disabled']" :class="$slot['disabled']
                                            ? 'pointer-events-none dark:bg-gray-600 bg-gray-400'
                                            : 'bg-gray-800 dark:bg-gray-200'" :href="$slot['disabled'] ? '#' : '/booking/' . $restaurant->id . '?date=' . $slot['value']">
                                            {{ $slot['value']->format('H:i') }}
                                            </x-booking-slotk>
                                    @endforeach
                                </div>
                            @else
                                <p>No Tables</p>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</x-app-layout>
