@props(['raiting'])

<div class="flex">
    @for ($i = 0; $i < floor($raiting); $i++)
        <svg fill="#e1b955" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
            <path d="m233-120 65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z" />
        </svg>
    @endfor

    @if (round($raiting) > floor($raiting))
        <svg fill="#e1b955" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24">
            <path
                d="m606-286-33-144 111-96-146-13-58-136v312l126 77ZM233-120l65-281L80-590l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z" />
        </svg>
    @endif
    <strong>{{ number_format($raiting, 1) }}</strong>
</div>
