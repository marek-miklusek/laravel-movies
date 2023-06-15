<section class="mt-28 flex justify-center h-screen w-full sm:mt-20">

    <div class="absolute z-10 h-full w-full">
        <div class="flex h-full items-center justify-start px-16">
            <div class="hidden w-2/5 flex-col space-y-4 py-12 lg:flex">
                <h1 class="text-5xl font-semibold text-white">
                    {{ $title }}
                </h1>
                <p class="text-lg font-semibold text-white">
                    {{ $popular['overview'] }}
                </p>
                <div class="flex w-full flex-row space-x-4">
                    <a href="{{ route('movies.show', $popular['id']) }}" 
                        class="bg-orange-500 hover:bg-orange-600 mt-5 flex w-28 items-center justify-center 
                        space-x-2 rounded px-2 py-2 shadow-md">
                        <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                        <span class="font-semibold text-black">Play</span>
                    </a>
                    <a href="{{ $route }}" 
                        class="mt-5 flex w-36 items-center justify-center space-x-2 rounded-lg 
                        bg-gray-500 bg-opacity-50 hover:bg-gray-700 px-3 py-2 font-semibold shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                          </svg>
                        <span class="font-semibold text-white">More Info</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="w-1/2"> --}}
        <img class="h-screen w-screen object-contain" 
            src="{{ 'https://image.tmdb.org/t/p/w342/'.$popular['poster_path'] }}">
    {{-- </div> --}}

</section>
