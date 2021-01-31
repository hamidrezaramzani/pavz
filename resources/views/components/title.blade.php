<div data-aos="zoom-in" class="title">
    @if ($mode == 'light')
        <h2>
            {{ $title }}
        </h2>
        <p>{{ $description }}</p>
    @else
        <h2 class="text-light">
            {{ $title }}
        </h2>
        <p class="text-light">{{ $description }}</p>
    @endif

</div>
