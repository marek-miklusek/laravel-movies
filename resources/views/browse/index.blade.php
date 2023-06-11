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
            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
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
            <div id="dropdownb" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="{{ route('browse.sortBy', ['release', $movies[0]['original_language']]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            Year Released
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('browse.sortBy', ['az', $movies[0]['original_language']]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            A-Z
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('browse.sortBy', ['za', $movies[0]['original_language']]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            Z-A
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="container mx-auto px-6 py-16">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach ($movies as $movie)
                <a href="{{ route('movies.show', $movie['id']) }}">
                    <img class="cursor-pointer" src="{{ $movie['poster_path'] }}" alt="poster">
                </a>
            @endforeach
        </div>
    </div>

    <x-gap></x-gap>

</x-master-layout>