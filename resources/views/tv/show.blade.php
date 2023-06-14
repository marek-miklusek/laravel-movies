<x-master-layout>

    <div class="p-2 lg:p-8 mt-16 sm:mt-10">
        <div class="container mx-auto px-4 py-12 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ $tvshow['poster_path'] }}" alt="parasite" class="w-64 lg:w-96">
            </div>
            <div class="md:ml-24">

                {{-- Details about tvshow --}}
                <h2 class="text-white mb-2 text-4xl mt-4 md:mt-0 font-semibold">{{ $tvshow['name'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <section class="w-9" x-data="skillDisplay">
                        <div class="flex items-center justify-center" x-data="{ circumference: 2 * 22 / 7 * 15 }"
                            x-init="currentSkill.percent = {{ $tvshow['vote_average'] }}">
                            <svg class="transform -rotate-90 w-9 h-9">
                                <circle cx="18" cy="18" r="16" stroke="currentColor" stroke-width="3" fill="transparent"
                                    class="text-gray-700" />
                                <circle cx="18" cy="18" r="16" stroke="currentColor" stroke-width="3" fill="transparent"
                                    :stroke-dasharray="circumference"
                                    :stroke-dashoffset="circumference - currentSkill.percent / 100 * circumference"
                                    class="text-orange-500" />
                            </svg>
                            <span class="absolute text-xs text-white" x-text="`${currentSkill.percent}%`"></span>
                        </div>
                    </section>
                    <span class="mx-2">|</span>
                    <span>{{ $tvshow['human_date'] }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $tvshow['genres'] }}</span>
                </div>

                <p class="text-gray-300 mt-8">{{ $tvshow['overview'] }}</p>

                {{-- Crew --}}
                <div class="mt-12">
                    <div class="flex mt-4">
                        @foreach ($tvshow['created_by'] as $crew)
                            <div class="mr-8">
                                <div class="text-white font-semibold">{{ $crew['name'] }}</div>
                                <div class="text-sm text-gray-400">Creator</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div x-data="{ isOpen: false }">
                    @if (count($tvshow['videos']['results']) > 0)
                    <div class="flex items-center gap-4">
                        <div @click.outside="isOpen = false" class="mt-12">
                            <button @click="isOpen = true" class="flex items-center bg-orange-500 text-gray-900 
                                rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                                <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                                <span class="ml-2">Play Trailer</span>
                            </button>
                        </div>
                        <div class="mt-12">
                            <form action="{{ route('my-list.store') }}" method="post" class="flex mb-0">
                                @csrf
                                <button @popper(Add to My List!) class="hover:text-white font-semibold">
                                    <div class="flex items-center gap-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="#fff" 
                                            class="w-12 h-12 add-play">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </div>
                                </button>
                                <input type="hidden" name="movie" value="{{ $tvshow }}">
                            </form>
                        </div>

                        {{-- Rate it button --}}
                        <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" @popper(Rate it!) 
                            class="bg-black mt-12 w-10 h-10 border-2 border-white hover:border-[#21d07a]
                                rounded-full flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#FFD700" viewBox="0 0 24 24" 
                                stroke-width="1.5" stroke="#FFD700" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 
                                0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                            </svg>
                        </button>
                      
                        <x-rating-stars :title="$tvshow['name']" />
                    </div>

                        <template x-if="isOpen">
                            <div class="fixed top-0 left-0 w-full h-full flex items-center">
                                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                    <div @keydown.escape.window="isOpen = false">
                                        <div class="px-8 py-8">
                                            <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                                <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/{{ $tvshow['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Cast --}}
    <div class="p-2 lg:p-8">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold text-white">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($tvshow['cast'] as $cast)
                    <div class="mt-8">
                        <a href="{{ route('actors.show', $cast['id']) }}">
                            <img src="{{ $cast['profile_path'] }}" alt="actor1" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('actors.show', $cast['id']) }}" class="text-lg mt-2 hover:text-gray:300">
                                {{ $cast['name'] }}
                            </a>
                            <div class="font-semibold text-gray-400">
                                {{ $cast['name'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Tv images --}}
    <div class="p-2 lg:p-8" x-data="{ isOpen: false, image: ''}">
        <div class="container mx-auto px-4 pt-16 pb-24">
            <h2 class="text-4xl font-semibold text-white">Images</h2>
            <div @click.outside="isOpen = false" @keydown.escape.window="isOpen = false" 
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($tvshow['images'] as $image)
                    <div class="mt-8">
                        <a @click.prevent=" isOpen = true
                            image='{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}'" href="#">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt="image1" 
                                class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- Full image --}}
            <div class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                x-show="isOpen">
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <img :src="image" alt="poster">
                </div>
            </div>
        </div>
    </div> 

</x-master-layout>
