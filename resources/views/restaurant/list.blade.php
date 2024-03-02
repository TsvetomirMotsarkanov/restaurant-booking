<x-app-layout>
    @foreach ($restaurants as $restaurant)
        <a href="/restaurants/{{ $restaurant->id }}">
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h2>{{ $restaurant->name }}</h2>
                            <p>
                                {{ $restaurant->description }}
                            </p>
                            <div>{{ $restaurant->tables->count() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
</x-app-layout>
