<x-master-layout>
    
    <x-browse-inputs :movies="$movies" :genre="$genre ?? '' " />
    
    <div class="container mx-auto px-6 py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
            @foreach ($movies as $movie)
                <div class="mt-5">
                    <div class="relative">
                        <img class="cursor-pointer h-[px]" src="{{ $movie['poster_path'] }}" alt="poster">
                        <div class="opacity-0 hover:opacity-100 duration-300 absolute inset-0 flex justify-center 
                            items-center text-white font-semibold">
                            <a @popper(Play me!) href="{{ route('movies.show', $movie['id']) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#000" viewBox="0 0 24 24" stroke-width="0.7" stroke="currentColor" 
                                    class="relative bottom-[3px] add-play w-16 h-16">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                </svg>
                            </a>
                            <form action="{{ route('my-list.store') }}" method="post">
                                @csrf
                                    <button @popper(Add to My List!) class="font-semibold">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="#000" viewBox="0 0 24 24" stroke-width="0.7" stroke="#fff" 
                                            class="w-16 h-16 add-play">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                <input type="hidden" name="movie" value="{{ $movie }}">
                            </form> 
                        </div>
                    </div>

                    <div class="mt-2">
                        <div class="flex items-center text-gray-400 text-sm mt-1">
                            <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                            <span class="ml-1">{{ $movie['vote_average'] }}</span>
                            <span class="mx-2">|</span>
                            <span>{{ $movie['human_date'] }}</span>
                        </div>
                        <div class="text-gray-400 text-sm">{{ $movie['genres'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-master-layout>