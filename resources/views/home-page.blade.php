<x-master-layout>

    <div class="relative flex flex-col h-screen">
        <img class="absolute top-0 bottom-0 z-0 h-full w-full object-cover"
            src="{{ url('img/home1.jpg') }}" alt="movies">
            
        {{-- Overlay --}}
        <div class="absolute top-0 bottom-0 left-0 right-0 z-10 h-full w-full bg-black opacity-60"></div>
    
        <div class="z-30 flex flex-col items-center justify-center py-48 text-gray-100">
            <h1 class="w-full px-2 sm:px-12 text-center text-4xl font-bold lg:px-0 lg:text-5xl">
                Awesome Movies, TV shows, and more. 
            </h1>
            <p class="mt-6 px-12 text-center font-semibold text-2xl">
                On this platform, you can watch movies and TV shows trailers.
            </p>
            <p class="mt-6 px-12 text-center font-semibold text-xl">
                Just go to <a href="{{ route('register') }}" class="text-[#e50914] hover:underline">register</a>
                or <a href="{{ route('login') }}" class="text-[#e50914] hover:underline">log in</a> if you are already registered and start enjoying.
            </p>
        </div>
    </div>
    
    <x-gap></x-gap>
    
    <section class="pb-12 lg:pb-0">
        <div class="text-white font-bold flex flex-wrap lg:flex-nowrap justify-center lg:p-20">
            <div class="p-10 flex flex-col items-center justify-center">
                <div>
                    <div class="text-5xl">James Cameron</div>
                    <div class="pt-10 text-2xl">
                        “ My job is to make sure I am in the right place at the right time with the right equipment
                        to capture what is happening. ” 
                    </div>
                </div>
            </div>
            <img width="600" src="{{ asset('img/home2.jpg') }}" class="object-contain"/>
        </div>
    </section>
    
    <x-gap></x-gap>
    
    <section class="py-12 lg:py-0">
        <div class="text-white font-bold flex flex-wrap lg:flex-nowrap justify-center lg:p-20">
            <img width="600" src="{{ asset('img/home3.jpg') }}" class="object-contain"/>
            <div class="p-10 flex flex-col items-center justify-center">
                <div>
                    <div class="text-5xl">Steven Spielberg</div>
                    <div class="pt-10 text-2xl">
                        “ I dream for a living. Once a month the sky falls on my head, I come to, and I see another
                        movie I want to make. ” 
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <x-gap></x-gap>
    
    <section class="pb-12 lg:pb-0">
        <div class="text-white font-bold flex flex-wrap lg:flex-nowrap justify-center lg:p-20">
            <div class="p-10 flex flex-col items-center justify-center">
                <div>
                    <div class="text-5xl">Alfred Hitchcock</div>
                    <div class="pt-10 text-2xl">
                        “ The length of a film should be directly related to the endurance of the human bladder. ” 
                    </div>
                </div>
            </div>
            <img width="600" src="{{ asset('img/home4.webp') }}" class="object-contain"/>
        </div>
    </section>
        
</x-master-layout>