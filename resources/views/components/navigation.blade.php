<div x-data="{ scrollDown: false }" x-init="window.addEventListener('scroll', () => scrollDown = window.pageYOffset > 50)" 
    class="w-full fixed top-0 z-50 text-white" :class="{ 'hidden': scrollDown }">
    <div class="px-3 sm:px-10 flex flex-wrap items-center py-6 justify-center">

        <div class="mr-5 lg:mr-0 text-3xl text-[#e50914] font-bold">
            <a href="/home">MOVIESFUN</a>
        </div>

        @auth
            <ul class="font-bold hidden ml-auto text-md flex-row gap-6 lg:flex">
                @foreach ($lists as $item)
                    <li>
                        <a href="{{ $item['href'] }}" class="hover:text-[#e50914] 
                            {{ change_color($item['title'], Request::segment(1)) }}">
                            {{ $item['title'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endauth
            
        <nav class="flex flex-wrap items-center justify-center space-x-6 text-base font-bold md:ml-auto">
            @auth
                <livewire:search-dropdown>
                <div x-data="{ open: false }" class="relative inline-block" 
                    :class="{'text-gray-900': open, 'text-gray-600': !open }">
                    <button @click="open = !open" @click.away="open = false" class="flex items-center hover:opacity-80">
                        <img width="30" src="{{ url('img/favicon.ico') }}" alt="logo">
                        <span :class="open = !open ? '': '-rotate-180'" class="ml-1 transform transition-transform duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </button>

                    <div x-cloak x-show="open"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-90"
                        class="absolute right-0 min-w-max rounded-md bg-[#333] text-white">
                        <ul class="lg:hidden bg-[#333]">
                            @foreach ($lists as $item)
                                <li class="b">
                                    <a href="{{ $item['href'] }}" class="block rounded-md px-8 py-2 font-bold hover:bg-gray-200 hover:text-gray-800">
                                        {{ $item['title'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('profile.edit') }}" 
                            class="block rounded-md px-8 py-2 font-bold text-orange-500 bg-[#333] hover:bg-gray-200 hover:text-gray-800">
                            Profile
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full text-left text-orange-500 rounded-md px-8 py-2 font-bold bg-[#333]
                                hover:bg-gray-200 hover:text-gray-800">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div x-data="{ open: false }"
                    class="relative inline-block"
                    :class="{'text-gray-900': open, 'text-gray-600': !open }">
                    <button  @click="open = !open" @click.away="open = false" class="flex items-center hover:opacity-80">
                        <img width="30" src="{{ url('img/favicon.ico') }}" alt="logo">
                        <span :class="open = ! open ? '': '-rotate-180'" class="ml-2 transform transition-transform duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>
                    </button>

                    <div x-cloak x-show="open"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-90"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-90"
                        class="absolute right-0 min-w-max rounded-md bg-[#333] text-white">
                        <a href="{{ route('register') }}" class="block rounded-t-md px-8 py-2 bg-[#333] hover:bg-gray-200 hover:text-gray-800">
                            Register
                        </a>
                        <a href="{{ route('login') }}" class="block rounded-b-md px-8 py-2 bg-[#333] hover:bg-gray-200 hover:text-gray-800">
                            Log in
                        </a>
                    </div>
                </div>
            @endauth
        </nav>
        
    </div>
</div>
