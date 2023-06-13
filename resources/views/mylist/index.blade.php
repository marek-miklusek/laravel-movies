<x-master-layout>
    
    <div class="mt-28 sm:mt-16">
        <div class="container mx-auto p-7 lg:px-14 pb-36">
            <h1 class="text-3xl text-white pb-4">My List</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5  gap-4">
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
                                <span class="mx-2">|</span>
                                <span>{{ $list['release_date'] }}</span>
                            </div>
                            <div class="text-gray-400 text-sm">{{ $list['genres'] }}</div>
                        </div>
                    </div>
                @empty
                    <div class="text-gray-100 h-80 col-span-5 text-xl pt-1">
                        You haven't added any titles to your list yet.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('skillDisplay', () => ({
                currentSkill: {
                    'percent': 0,
                }
            }));
        });
    </script>

</x-master-layout>