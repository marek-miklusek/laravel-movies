<x-master-layout>
    
    <div class="relative mt-32 sm:mt-24 px-8 font-semibold">
        <h1 class="text-white font-semibold text-2xl">Browse by Languages</h1>
        <div class="flex gap-4 items-center flex-wrap mt-3">
            <h3 class="text-white font-semibold">Select Your Preferences</h3>

            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-black bg-gray-100
                font-semibold text-sm px-2 py-1 text-center inline-flex items-center" type="button">
                Choose language:<span class="pl-1 text-[#e50914]">{{ $movies[0]['original_language'] }}</span>
                <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="{{ route('browse.selectByLang', 'en') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            English
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('browse.selectByLang', 'fr') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            France
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('browse.selectByLang', 'sk') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            Slovakia
                        </a>
                    </li>
                        <a href="{{ route('browse.selectByLang', 'cs') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            Czechia
                        </a>
                    </li>
                </ul>
            </div>

            <div class="sm:flex flex-wrap gap-3">
                <div class="text-white font-semibold mb-3 sm:mb-0">Sort by</div>
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdownb" class="text-black bg-gray-100
                    font-semibold text-sm px-2 py-1 text-center inline-flex items-center" type="button">
                    Suggestions for you:<span class="pl-1 text-[#e50914]">{{ $movies[0]['sort'] }}</span>
                    <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
            </div>
            <div id="dropdownb" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="{{ route('browse.sortBy', ['release', $movies[0]['original_language']]) }}" 
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            Year Released
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('browse.sortBy', ['rating', $movies[0]['original_language']]) }}" 
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            Rating
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('browse.sortBy', ['az', $movies[0]['original_language']]) }}" 
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            A-Z
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('browse.sortBy', ['za', $movies[0]['original_language']]) }}" 
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            Z-A
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
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