<div class="relative mt-32 sm:mt-24 px-8 font-semibold">
    <h1 class="text-white font-semibold text-2xl">Browse by Languages and Genres</h1>
    <div class="flex gap-4 items-center flex-wrap mt-3">
        <h3 class="text-white font-semibold">Select Your Preferences</h3>

        {{-- Language input --}}
        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-[#333]
            font-semibold text-sm px-2 py-1 text-center inline-flex items-center" type="button">
            Choose language:<span class="pl-1 text-[#e50914]">{{ $movies[0]['original_language'] }}</span>
            <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </button>
        <div id="dropdown" class="z-10 hidden divide-y divide-gray-100 rounded-lg w-44 bg-[#333]">
            <ul class="py-2 text-sm text-white" aria-labelledby="dropdownDefaultButton">
                @foreach ($languages as $key => $lang)
                    <li>
                        <a href="{{ route('browse.lang', $key) }}" class="block px-4 py-2 hover:bg-gray-200
                            hover:text-gray-800 rounded-md">
                            {{ $lang }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        
        {{-- Genres input --}}
        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdownc" class="text-white bg-[#333]
            font-semibold text-sm px-2 py-1 text-center inline-flex items-center" type="button">
            Genres:<span class="pl-1 text-[#e50914]">{{ $genre }}</span>
            <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </button>
        <div id="dropdownc" class="z-10 hidden divide-y divide-gray-100 rounded-lg w-44 bg-[#333]">
            <ul class="py-2 text-sm text-white" aria-labelledby="dropdownDefaultButton">
                @foreach ($genres['name'] as $name)
                    <li>
                        <a href="{{ route('browse.genre', [$name, $genres['route_lang'], $genres['route_sort'] ?? '']) }}" 
                            class="capitalize block px-4 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md">
                            {{ $name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Sort by input --}}
        <div class="sm:flex flex-wrap gap-3">
            <div class="text-white font-semibold mb-3 sm:mb-0">Sort by</div>
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdownb" class="text-white bg-[#333]
                font-semibold text-sm px-2 py-1 text-center inline-flex items-center" type="button">
                Suggestions for you:<span class="pl-1 text-[#e50914]">{{ $movies[0]['sort'] }}</span>
                <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </button>
        </div>
        <div id="dropdownb" class="z-10 hidden divide-y divide-gray-100 rounded-lg w-44 bg-[#333]">
            <ul class="py-2 text-sm text-white" aria-labelledby="dropdownDefaultButton">
                @foreach ($sorts['name'] as $key => $name)
                    <li>
                        <a href="{{ route('browse.sortBy', [$key, $sorts['route_lang'], $sorts['route_genre'] ?? '']) }}" 
                            class="capitalize block px-4 py-2 hover:bg-gray-200 hover:text-gray-800 rounded-md">
                            {{ $name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>