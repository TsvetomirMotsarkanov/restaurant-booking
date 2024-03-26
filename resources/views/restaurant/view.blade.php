<x-app-layout>
    <div class="relative isolate overflow-hidden bg-white px-6 pt-24 lg:overflow-visible lg:px-0">
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <div class="app-background absolute left-[max(50%,25rem)] top-0 h-[64rem] w-[128rem] -translate-x-1/2 stroke-gray-200 [mask-image:radial-gradient(64rem_64rem_at_top,white,transparent)]"
                aria-hidden="true"></div>
        </div>
        <div
            class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-2 lg:items-start lg:gap-y-10">
            <div
                class="lg:col-span-2 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                <div class="lg:pr-4">
                    <div class="lg:max-w-lg">
                        <p class="text-base font-semibold leading-7 text-indigo-600">Welcome to</p>
                        <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                            {{ $restaurant->name }}</h1>

                        <div class="flex justify-between mt-5">
                            <x-raiting :raiting="$restaurant->raiting" />
                            <x-price :priceInfo="$restaurant->additional_info_price" :noLabel="true" />
                            <x-additional-info class="gap-x-0" :value="$restaurant->additional_info_cuisines">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960"
                                    width="24">
                                    <path
                                        d="M280-80v-366q-51-14-85.5-56T160-600v-280h80v280h40v-280h80v280h40v-280h80v280q0 56-34.5 98T360-446v366h-80Zm400 0v-320H560v-280q0-83 58.5-141.5T760-880v800h-80Z" />
                                </svg>
                            </x-additional-info>
                        </div>

                        <p class="mt-6 text-xl leading-8 text-gray-700">{{ $restaurant->description }}</p>
                    </div>
                </div>
            </div>
            <div
                class="-mt-12 p-0 lg:p-12 lg:pb-2 lg:sticky lg:top-4 lg:col-start-2 lg:row-span-2 lg:row-start-1 lg:overflow-hidden">

                <img class="w-[48rem] max-w-600 rounded-xl bg-gray-900 shadow-xl ring-1 ring-gray-400/10 sm:w-[57rem]"
                    src="{{ $restaurant->image }}?auto=compress&cs=tinysrgb&h=350">
            </div>
            @include('restaurant.partials.additional-info')
        </div>

        @include('restaurant.partials.gallery')
        <div class="px-20 pb-20 mt-8">
            <h2 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                Make a booking
            </h2>

            <form class="block w-full" method="get" action="/booking/{{ $restaurant->id }}">
                <input type="hidden" name="date" value="{{ $now->format('Y-m-d') }} {{ $hours[0] }}">
                <div class="mt-4 flex gap-4 w-full">
                    <input id="date"
                        class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                        placeholder="Date" type="date" name="date-date" min="{{ $now->format('Y-m-d') }}"
                        value="{{ $now->format('Y-m-d') }}" required />

                    <select name="date-time" id="time"
                        class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        @foreach ($hours as $hour)
                            <option value="{{ $hour }}">{{ $hour }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4 block w-full">
                    <select name="people" id="people"
                        class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                        @foreach ($peopleOptions as $option)
                            <option value="{{ $option }}" {!! $option === 3 ? 'selected="selected"' : '' !!}>
                                {{ $option }}
                                {{ $option > 1 ? 'people' : 'person' }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <x-primary-button class="block mt-1 w-full justify-center text-center">
                        Confirm
                    </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
