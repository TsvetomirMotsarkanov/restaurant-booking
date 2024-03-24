<div class="py-8 mb-2 mt-2">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-2xl rounded-3xl">
            <div class="p-6 text-gray-900 dark:text-gray-100 ">
                <form class="block w-full" method="get" action="{{ route('home') }}">
                    <!-- 1 row -->
                    <div class="mt-4 flex gap-4 w-full">
                        <input id="date"
                            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                            placeholder="Date" type="date" name="date" min="{{ $now->format('Y-m-d') }}"
                            value="{{ $date->format('Y-m-d') }}" defaultValue="{{ $date->format('Y-m-d') }}" required />

                        <select name="time" id="time"
                            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            @foreach ($hours as $hour)
                                <option value="{{ $hour }}" {!! $timeOption === $hour ? 'selected="selected"' : '' !!}>{{ $hour }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- 2 row -->
                    <div class="mt-4 block w-full">
                        <select name="people" id="people"
                            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                            @foreach ($peopleOptions as $option)
                                <option value="{{ $option }}" {!! $option === $people ? 'selected="selected"' : '' !!}> {{ $option }}
                                    {{ $option > 1 ? 'people' : 'person' }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- 3 row -->
                    <div class="mt-4">
                        <x-text-input id="restaurantName" class="block mt-1 w-full" placeholder="Restaurant or Cuisine"
                            type="text" name="restaurantName" value="{{ $restaurantName }}" />
                    </div>

                    <div class="mt-4">
                        <x-primary-button class="block mt-1 w-full justify-center text-center">
                            Search
                        </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>
