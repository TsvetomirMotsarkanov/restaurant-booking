<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Confirm Your Booking
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('booking.create') }}">
                        @csrf

                        <div>
                            <x-input-label for="people" :value="__('People')" />

                            <x-text-input id="people" class="block mt-1 w-full" type="text" name="people"
                                value="{{ $people }}" required />

                            <x-input-error :messages="$errors->get('people')" class="mt-2" />
                            <x-input-error :messages="$errors->get('restaurantId')" class="mt-2" />
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                            <input type="hidden" name="restaurantId" value="{{ $restaurantId }}">
                            <input type="hidden" name="date" value="{{ $date }}">
                        </div>

                        <div class="flex justify-end mt-4">
                            <x-primary-button>
                                {{ __('Confirm') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
