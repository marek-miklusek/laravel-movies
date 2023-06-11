<x-master-layout>
    
    {{-- Details about movie --}}
    <div class="p-2 lg:p-8 mt-16 sm:mt-10">
        <div class="container mx-auto px-4 py-12 flex flex-col md:flex-row">
            <div class="flex-none">
                <img src="{{ $movie['poster_path'] }}" alt="poster" class="w-64 lg:w-96">
            </div>
            <div class="md:ml-24">
                <h2 class="text-4xl text-white mb-2 mt-4 md:mt-0 font-semibold">{{ $movie['title'] }}</h2>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <svg class="fill-current text-orange-500 w-4" viewBox="0 0 24 24"><g data-name="Layer 2"><path d="M17.56 21a1 1 0 01-.46-.11L12 18.22l-5.1 2.67a1 1 0 01-1.45-1.06l1-5.63-4.12-4a1 1 0 01-.25-1 1 1 0 01.81-.68l5.7-.83 2.51-5.13a1 1 0 011.8 0l2.54 5.12 5.7.83a1 1 0 01.81.68 1 1 0 01-.25 1l-4.12 4 1 5.63a1 1 0 01-.4 1 1 1 0 01-.62.18z" data-name="star"/></g></svg>
                    <span class="ml-1">{{ $movie['vote_average'] }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $movie['release_date'] }}</span>
                    <span class="mx-2">|</span>
                    <span>{{ $movie['genres'] }}</span>
                </div>

                <p class="text-gray-300 mt-8">
                    {{ $movie['overview'] }}
                </p>

                <div class="mt-12">
                    <h4 class="text-gray-400 font-semibold text-lg">Featured Crew</h4>
                    <div class="flex mt-4">
                        @foreach ($movie['crew'] as $crew)
                            <div class="mr-8">
                                <div class="font-semibold text-white">{{ $crew['name'] }}</div>
                                <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div x-data="{ isOpen: false }">
                    @if (count($movie['videos']['results']) > 0)
                        <div class="flex items-center gap-4">
                            <div @click.outside="isOpen = false" class="mt-12">
                                <button @click="isOpen = true" class="flex items-center bg-orange-500 text-gray-900
                                    rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                                    <svg class="w-6 fill-current" viewBox="0 0 24 24"><path d="M0 0h24v24H0z" fill="none"/><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>
                                    <span class="ml-2">Play Trailer</span>
                                </button>
                            </div>
                            <div class="mt-14">
                                <form action="{{ route('my-list.store') }}" method="post" class="mb-0">
                                    @csrf
                                    <button class="hover:text-white font-semibold">
                                        <div class="flex items-center gap-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="#fff" 
                                            class="w-12 h-12 add-to-list hover:text-orange-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <span>Add to My List</span>
                                    </div>
                                    </button>
                                    <input type="hidden" name="name" value="movie">
                                    <input type="hidden" name="id" value="{{ $movie['id'] }}">
                                    <input type="hidden" name="poster_path" value="{{ $movie['poster_path'] }}">
                                </form>
                            </div>
                        </div>

                        <template x-if="isOpen">
                            <div class="fixed top-0 left-0 z-50 w-full h-full flex items-center">
                                <div class="container mx-auto lg:px-32">
                                    <div @keydown.escape.window="isOpen = false">
                                        <div class="modal-body px-8 py-8">
                                            <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                                <iframe class="responsive-iframe absolute top-0 left-0 w-full h-full" 
                                                    src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}" 
                                                    style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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
            <h2 class="text-white text-4xl font-semibold">Actors</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($movie['cast'] as $cast)
                    <div class="mt-8">
                        <a href="{{ route('actors.show', ['name' => $cast['name'], 'id' => $cast['id']]) }}">
                            <img src="{{ $cast['profile_path'] }}" alt="actor1" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('actors.show', ['name' => $cast['name'], 'id' => $cast['id']]) }}" class="text-lg mt-2 hover:text-gray:300">
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

    {{-- Movies images --}}
    <div class="p-2 mb-24 lg:p-8" x-data="{ isOpen: false, image: ''}">
        <div class="container mx-auto px-4 pt-16">
            <h2 class="text-white text-4xl font-semibold">Images</h2>
            <div @click.outside="isOpen = false" @keydown.escape.window="isOpen = false"
                class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach ($movie['images'] as $image)
                    <div class="mt-8">
                        <a href="#" @click.prevent=" isOpen = true 
                            image='{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}'">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt="image of actor" 
                                class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                @endforeach
            </div>

            {{-- Full image --}}
            <div class="fixed top-0 left-0 z-50 w-full h-full flex 
                items-center shadow-lg overflow-y-auto" x-show="isOpen">
                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                    <img :src="image" alt="poster">
                </div>
            </div>
        </div>
    </div>

    <x-gap></x-gap>
    
</x-master-layout>