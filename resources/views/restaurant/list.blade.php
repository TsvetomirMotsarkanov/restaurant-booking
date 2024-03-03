<x-app-layout>
    {{-- SEARCH --}}
    <div class="py-8 mb-2 mt-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl rounded-3xl">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <form class="block w-full" method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- 1 row -->
                        <div class="mt-4 flex gap-4 w-full">
                            <input id="date" class="block mt-1 w-full" placeholder="Date" type="date"
                                name="date" min="{{ $today->format('Y-m-d') }}" value="{{ $today->format('Y-m-d') }}"
                                defaultValue="{{ $today->format('Y-m-d') }}" required />

                            <input id="time" class="block mt-1 w-full" placeholder="Tiem" type="time"
                                name="time" min="09:00" step="900" required />
                        </div>

                        <!-- 2 row -->
                        <div class="mt-4 block w-full">
                            <x-text-input id="email" class="block mt-1 w-full" placeholder="Name" type="text"
                                name="email" :value="old('email')" required />
                        </div>

                        <!-- 3 row -->
                        <div class="mt-4">
                            <x-text-input id="password" class="block mt-1 w-full" placeholder="Restaurant or Cuisine"
                                type="text" name="locationName" />
                        </div>

                        <div class="mt-4">
                            <x-primary-button class="block mt-1 w-full justify-center text-center">
                                {{ __('Search') }}
                            </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- END SEARCH --}}
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
