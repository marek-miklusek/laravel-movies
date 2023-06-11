<x-master-layout>
    <div class="mt-32 lg:mt-24">
        <h1 class="text-3xl text-white pl-14">My List</h1>
        <div class="container mx-auto px-6 py-16">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 place-items-center gap-4">
                @forelse ($my_lists as $list)
                    <div class="relative">
                        <img class="cursor-pointer" src="{{ $list->poster_path }}" alt="poster">
                        <div class="opacity-0 hover:opacity-100 duration-300 absolute inset-0 z-10 flex justify-center 
                            items-center text-white font-semibold">
                            <a href="{{ route($list->getRoute(), $list->movie_id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#000" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" 
                                    class="relative bottom-[3px] list-svg w-16 h-16">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                </svg>
                            </a>
                            <form action="{{ route('my-list.destroy', $list->movie_id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#000" viewBox="0 0 24 24" stroke-width="1" 
                                        stroke="currentColor" class="list-svg w-16 h-16">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>  
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="text-gray-100 h-72 col-span-5 text-2xl">
                        You haven't added any titles to your list yet.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-master-layout>