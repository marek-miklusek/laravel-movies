<div x-data="{ scrollDown: false }" x-init="window.addEventListener('scroll', () => scrollDown = window.pageYOffset > 50)" 
    class="w-full fixed top-0 z-50 text-white" :class="{ 'hidden': scrollDown }">
    <div class="flex flex-wrap items-center px-3 sm:px-16 py-6 justify-center">

        {{-- <div> --}}
            <a href="/home">
                {{-- <img src="{{ url('/img/netflix-logo.png') }}" alt="netflix-logo" class="w-36 mr-4 md:mr-0"> --}}
                <div class="flex items-center text-3xl font-bold uppercase md:mb-0 h-[45px] w-[130px] mr-4 md:mr-0">
                    <svg viewBox="0 0 111 30" data-uia="netflix-logo" aria-hidden="true" focusable="false"><g id="netflix-logo"><path fill="#e50914" d="M105.06233,14.2806261 L110.999156,30 C109.249227,29.7497422 107.500234,29.4366857 105.718437,29.1554972 L102.374168,20.4686475 L98.9371075,28.4375293 C97.2499766,28.1563408 95.5928391,28.061674 93.9057081,27.8432843 L99.9372012,14.0931671 L94.4680851,-5.68434189e-14 L99.5313525,-5.68434189e-14 L102.593495,7.87421502 L105.874965,-5.68434189e-14 L110.999156,-5.68434189e-14 L105.06233,14.2806261 Z M90.4686475,-5.68434189e-14 L85.8749649,-5.68434189e-14 L85.8749649,27.2499766 C87.3746368,27.3437061 88.9371075,27.4055675 90.4686475,27.5930265 L90.4686475,-5.68434189e-14 Z M81.9055207,26.93692 C77.7186241,26.6557316 73.5307901,26.4064111 69.250164,26.3117443 L69.250164,-5.68434189e-14 L73.9366389,-5.68434189e-14 L73.9366389,21.8745899 C76.6248008,21.9373887 79.3120255,22.1557784 81.9055207,22.2804387 L81.9055207,26.93692 Z M64.2496954,10.6561065 L64.2496954,15.3435186 L57.8442216,15.3435186 L57.8442216,25.9996251 L53.2186709,25.9996251 L53.2186709,-5.68434189e-14 L66.3436123,-5.68434189e-14 L66.3436123,4.68741213 L57.8442216,4.68741213 L57.8442216,10.6561065 L64.2496954,10.6561065 Z M45.3435186,4.68741213 L45.3435186,26.2498828 C43.7810479,26.2498828 42.1876465,26.2498828 40.6561065,26.3117443 L40.6561065,4.68741213 L35.8121661,4.68741213 L35.8121661,-5.68434189e-14 L50.2183897,-5.68434189e-14 L50.2183897,4.68741213 L45.3435186,4.68741213 Z M30.749836,15.5928391 C28.687787,15.5928391 26.2498828,15.5928391 24.4999531,15.6875059 L24.4999531,22.6562939 C27.2499766,22.4678976 30,22.2495079 32.7809542,22.1557784 L32.7809542,26.6557316 L19.812541,27.6876933 L19.812541,-5.68434189e-14 L32.7809542,-5.68434189e-14 L32.7809542,4.68741213 L24.4999531,4.68741213 L24.4999531,10.9991564 C26.3126816,10.9991564 29.0936358,10.9054269 30.749836,10.9054269 L30.749836,15.5928391 Z M4.78114163,12.9684132 L4.78114163,29.3429562 C3.09401069,29.5313525 1.59340144,29.7497422 0,30 L0,-5.68434189e-14 L4.4690224,-5.68434189e-14 L10.562377,17.0315868 L10.562377,-5.68434189e-14 L15.2497891,-5.68434189e-14 L15.2497891,28.061674 C13.5935889,28.3437998 11.906458,28.4375293 10.1246602,28.6868498 L4.78114163,12.9684132 Z" id="Fill-14"></path></g></svg>
                </div>
           </a>
        {{-- </div> --}}

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
                    <button @click="open = !open" @click.away="open = false" class="flex items-center">
                        <img src="http://occ-0-6221-2218.1.nflxso.net/dnm/api/v6/K6hjPJd6cR6FpVELC5Pd6ovHRSk/AAAABY20DrC9-11ewwAs6nfEgb1vrORxRPP9IGmlW1WtKuaLIz8VxCx5NryzDK3_ez064IsBGdXjVUT59G5IRuFdqZlCJCneepU.png?r=229"
                            alt="avatar" class="rounded">
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
                    <button  @click="open = !open" @click.away="open = false" class="flex items-center">
                        <img src="http://occ-0-6221-2218.1.nflxso.net/dnm/api/v6/K6hjPJd6cR6FpVELC5Pd6ovHRSk/AAAABY20DrC9-11ewwAs6nfEgb1vrORxRPP9IGmlW1WtKuaLIz8VxCx5NryzDK3_ez064IsBGdXjVUT59G5IRuFdqZlCJCneepU.png?r=229"
                        alt="avatar" class="rounded">
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
