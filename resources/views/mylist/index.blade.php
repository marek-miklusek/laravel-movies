<x-master-layout>
    
    <div class="mt-28 sm:mt-16">
        <div class="container mx-auto p-7 lg:px-10 pb-36">
            <h1 class="text-3xl text-white pb-4">My List</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
                @forelse ($my_lists as $list)
                    <div class="mt-5">
                        <div class="relative">
                            <img class="cursor-pointer" src="{{ $list->poster_path }}" alt="poster">
                            <div class="opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex justify-center 
                                items-center text-white font-semibold">
                                <a @popper(Play me!) href="{{ route($list->route, $list->movie_id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#000" viewBox="0 0 24 24" stroke-width="0.7" stroke="currentColor" 
                                        class="relative bottom-[3px] add-play w-16 h-16">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                    </svg>
                                </a>
                                <form action="{{ route('my-list.destroy', $list->movie_id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button @popper(Remove from My List)>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="#000" viewBox="0 0 24 24" stroke-width="0.7" 
                                            stroke="currentColor" class="remove-movie w-16 h-16">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>  
                                    </button>
                                </form>
                            </div>
                        </div>
    
                        <div class="mt-2">
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <section class="w-9" x-data="skillDisplay">
                                    <div class="flex items-center justify-center" x-data="{ circumference: 2 * 22 / 7 * 15 }"
                                        x-init="currentSkill.percent = {{ $list['vote_average'] }}">
                                        <svg class="transform -rotate-90 w-9 h-9">
                                            <circle cx="18" cy="18" r="16" stroke="currentColor" stroke-width="3" fill="transparent"
                                                class="text-gray-700" />
                                            <circle cx="18" cy="18" r="16" stroke="currentColor" stroke-width="3" fill="transparent"
                                                :stroke-dasharray="circumference"
                                                :stroke-dashoffset="circumference - currentSkill.percent / 100 * circumference"
                                                class="text-[#21d07a]" />
                                        </svg>
                                        <span class="absolute text-xs text-white" x-text="`${currentSkill.percent}%`"></span>
                                    </div>
                                </section>

                                {{-- Rate it --}}
                                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" @popper(Rate it!) 
                                    class="bg-black w-9 h-9 hover:border-[#21d07a] 
                                        ml-2 rounded-full flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                                        stroke-width="1.5" stroke="#FFD700" class="w-5 h-5 rate-svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 
                                        0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                    </svg>
                                </button>
                                <x-rating-stars :title="$list->name" />
                                <span class="mx-2">|</span>
                                <span>{{ $list['release_date'] }}</span>
                            </div>
                            <div class="text-gray-400 text-sm">{{ $list['genres'] }}</div>
                        </div>
                    </div>
                @empty
                    <div class="text-gray-100 h-80 col-span-5 text-xl pt-1">
                        Your list is currently empty as you haven't added any titles yet.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</x-master-layout>