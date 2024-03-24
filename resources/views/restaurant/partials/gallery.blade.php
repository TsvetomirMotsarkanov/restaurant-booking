<div class="grid grid-cols-6 lg:px-8 mb-20 col-span-2 gap-2">
    @foreach ($restaurant->images as $image)
        @if ($loop->index < 2)
            <div class="overflow-hidden rounded-xl col-span-3 max-h-[14rem]">
                <img class="h-full w-full object-cover " src="{{ $image->url }}?auto=compress&cs=tinysrgb&h=650&w=940">
            </div>
        @else
            <div class="overflow-hidden rounded-xl col-span-2 max-h-[10rem]">
                <img class="h-full w-full object-cover " src="{{ $image->url }}?auto=compress&cs=tinysrgb&h=350">
            </div>
        @endif
    @endforeach
</div>
