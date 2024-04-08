<x-app-layout>
    <div class="px-6 lg:px-0">
        @include('restaurant.partials.search-form')

        @foreach ($restaurants as $restaurant)
            @if ($restaurant->tables->count() > 0 && count($restaurant->slots) > 0)
                <div class="py-6 mt-2" x-data="{}">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white cursor-pointer dark:bg-gray-800 overflow-hidden shadow-2xl rounded-3xl flex flex-wrap justify-center md:flex-nowrap md:justify-start"
                            role="link" tabindex="0"
                            @keyup.enter="window.location.href='/restaurants/{{ $restaurant->id }}'"
                            @click="window.location.href='/restaurants/{{ $restaurant->id }}'">
                            <img src="{{ $restaurant->image }}?auto=compress&cs=tinysrgb&dpr=1&fit=crop&h=200&w=280"
                                alt="" />
                            <div
                                class="p-6 w-full max-w-lg text-gray-900 dark:text-gray-100 flex flex-col justify-between items-center md:items-start">
                                <h2 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                                    {{ $restaurant->name }}</h2>

                                <x-raiting :raiting="$restaurant->raiting" />

                                <div class="flex items-center gap-x-3 md:justify-start">
                                    <x-price :priceInfo="$restaurant->additional_info_price" :iconOnly="true" />

                                    <svg xmlns="http://www.w3.org/2000/svg" height="10" viewBox="0 -960 960 960"
                                        width="10">
                                        <path
                                            d="M480-200q-117 0-198.5-81.5T200-480q0-117 81.5-198.5T480-760q117 0 198.5 81.5T760-480q0 117-81.5 198.5T480-200Z" />
                                    </svg>

                                    <x-additional-info :value="$restaurant->additional_info_cuisines" />

                                    <svg xmlns="http://www.w3.org/2000/svg" height="10" viewBox="0 -960 960 960"
                                        width="10">
                                        <path
                                            d="M480-200q-117 0-198.5-81.5T200-480q0-117 81.5-198.5T480-760q117 0 198.5 81.5T760-480q0 117-81.5 198.5T480-200Z" />
                                    </svg>

                                    <x-additional-info :value="$restaurant->additional_info_area" />
                                </div>
                                @if ($restaurant->tables->count())
                                    <div>
                                        @foreach ($restaurant->slots as $slot)
                                            <x-booking-slot :disabled="$slot['disabled']" :class="$slot['disabled']
                                                ? 'pointer-events-none dark:bg-gray-600 bg-gray-400'
                                                : 'bg-gray-800 dark:bg-gray-200'" :href="$slot['disabled'] ? '#' : '/booking/' . $restaurant->id . '?date=' . $slot['value'] . '&people=' . $people">
                                                {{ $slot['value']->format('H:i') }}
                                                </x-booking-slotk>
                                        @endforeach
                                    </div>
                                @endif

                                @if ($restaurant->bookings->count())
                                    @php
                                        $count = $restaurant->bookings->count();
                                        $text = 'Booked ' . $count . ' time' . ($count > 1 ? 's' : '');
                                    @endphp
                                    <x-additional-info class="mt-4" :value="$text">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-0 flex-none text-indigo-600"
                                            height="24" viewBox="0 -960 960 960" width="24" fill="currentColor">
                                            <path
                                                d="M120-120v-80l80-80v160h-80Zm160 0v-240l80-80v320h-80Zm160 0v-320l80 81v239h-80Zm160 0v-239l80-80v319h-80Zm160 0v-400l80-80v480h-80ZM120-327v-113l280-280 160 160 280-280v113L560-447 400-607 120-327Z" />
                                        </svg>
                                    </x-additional-info>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</x-app-layout>
