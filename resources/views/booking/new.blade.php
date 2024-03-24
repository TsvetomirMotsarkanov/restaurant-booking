<x-app-layout>
    <div class="relative isolate overflow-hidden bg-white px-6 pt-24 lg:overflow-visible lg:px-0">
        <div class="absolute inset-0 -z-10 overflow-hidden">
            <div class="app-background absolute left-[max(50%,25rem)] top-0 h-[64rem] w-[128rem] -translate-x-1/2 stroke-gray-200 [mask-image:radial-gradient(64rem_64rem_at_top,white,transparent)]"
                aria-hidden="true"></div>
        </div>
        <div
            class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-2 lg:items-start lg:gap-y-10">
            <div
                class="order-2 lg:order-1 lg:col-span-2 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
                <div class="lg:pr-4">
                    <div class="lg:max-w-lg">
                        <p class="text-base font-semibold leading-7 text-indigo-600">You’re almost done!</p>
                        <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                            Confirm your booking
                        </h1>

                        <div class="mt-6">
                            <div>
                                <p class="text-xl leading-8 text-gray-700">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Animi cum magni ipsa neque
                                    quos distinctio, officiis eveniet sint, deserunt blanditiis voluptas tempore
                                    voluptatem sunt rerum iure, molestiae ipsum nobis laudantium.
                                </p>
                            </div>
                            <div class="mt-8" x-data="appTimerComponent()" x-init="init()">
                                <div x-show="!outOftime"
                                    class="relative block w-full p-4 mb-4 text-base leading-5 text-white bg-blue-500 rounded-lg opacity-100 font-regular">
                                    We’re holding this table for you for
                                    <strong x-text="getTime()">5:00 minutes</strong>
                                </div>

                                <div x-show="outOftime" :class="{ 'hidden': !outOftime }"
                                    class="hidden relative block w-full p-4 mb-4 text-base leading-5 text-white bg-orange-500 rounded-lg opacity-100 font-regular">
                                    You can still try to complete your booking, but this table may no longer be
                                    available.
                                </div>
                            </div>

                            <form method="POST" action="{{ route('booking.create') }}" class="block w-full mt-6">
                                @csrf
                                <input type="hidden" name="restaurantId" value="{{ $restaurantId }}">
                                <input type="hidden" name="date" value="{{ $date }}">
                                <input type="hidden" name="people" value="{{ $people }}">
                                <x-input-error :messages="$errors->get('people')" class="mt-2" />
                                <x-input-error :messages="$errors->get('restaurantId')" class="mt-2" />
                                <x-input-error :messages="$errors->get('date')" class="mt-2" />
                                <x-text-input id="name" class="block mt-8 w-full" placeholder="Full name"
                                    type="text" name="name" value="" />

                                <x-text-input id="mail" class="block mt-8 w-full" placeholder="Email"
                                    type="email" name="mail" value="" />

                                <x-text-input id="phone" class="block mt-8 w-full" placeholder="Phone number"
                                    type="text" name="phone" value="" />

                                <div class="mt-8 flex items-center">
                                    <input type="checkbox" name="newslatter" id="newslatter" checked>
                                    <label for="newslatter" class="ml-2 text-xl leading-8 text-gray-700">Sign me up to
                                        receive dining offers and news from <strong>{{ config('app.name') }}</strong> by
                                        email.</label>
                                </div>
                                <div class="mt-8 mb-8">
                                    <x-primary-button class="w-full justify-center text-xl leading-8">
                                        Confirm
                                    </x-primary-button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <div
                class="order-1 lg:order-2 -mt-12 p-0 lg:p-12 lg:pb-2 lg:sticky lg:top-4 lg:col-start-2 lg:row-span-2 lg:row-start-1 lg:overflow-hidden">

                <strong class="block text-xl leading-8 text-gray-700">What to know before you go</strong>
                <strong class="mt-6 block text-xl leading-8 text-gray-700">Important dining information</strong>

                <p class="text-xl leading-8 text-gray-700">
                    We have a 10 minute grace period. Please call us if you are running later than 10 minutes after your
                    booked time.
                </p>
                <p class="mt-6 text-xl leading-8 text-gray-700">
                    We may contact you about this booking, so please ensure your email and phone number are up-to-date.
                </p>

                <p class="mt-6 text-xl leading-8 text-gray-700">
                    Your table will be booked for <strong> 30 minutes</strong>
                </p>

                <p class="mt-6 text-xl leading-8 text-gray-700">
                    A note from the restaurant
                </p>
                <p class="mt-3 text-xl leading-8 text-gray-700">
                    Please let us know if you have any allergies or dietary requirements.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function appTimerComponent() {
        return {
            time: 10,
            outOftime: false,
            interval: null,
            init() {
                this.interval = setInterval(() => {
                    if (this.time) {
                        this.time--;
                    }
                }, 1000);
            },
            getTime() {
                console.log(this.time)
                if (this.time > 0) {
                    this.interval && clearInterval(this.interval);
                    const minutes = Math.floor(this.time / 60);
                    const seconds = this.time - minutes * 60;
                    return `0${minutes}:${seconds < 10 ? '0' + seconds : seconds} minutes.`;
                } else {
                    this.outOftime = true;
                    this.interval && clearInterval(this.interval);
                    return '00:00 minutes.';
                }
            },
        }
    }
</script>
