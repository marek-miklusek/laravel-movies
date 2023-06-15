<div class="pt-10">
    <div class="mb-5 ml-5 text-2xl sm:text-3xl antialiased font-bold tracking-wider text-gray-200">
        {{ $category }}
    </div>
    <div class="carousel" data-flickity='{ "freeScroll": true, "wrapAround": true }'
        class="carousel flex flex-nowrap">
        @foreach ($items as $item)
            <div @click="open = true" class="mb-8 flex flex-col overflow-hidden rounded-md bg-[#181818]">
                <div @click="open = true" class="w-72">
                    <a href="{{ route($route, $item['id']) }}">
                        <img class="cursor-pointer"
                            src="{{ 'https://image.tmdb.org/t/p/w342' . $item['poster_path'] }}"
                            alt="poster">
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>





