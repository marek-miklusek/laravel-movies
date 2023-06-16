<div class="relative flex flex-col h-screen">
    <img class="absolute top-0 bottom-0 z-0 h-full w-full object-cover"
        src="{{ url('img/home1.jpg') }}" alt="movies">
        
    {{-- Overlay --}}
    <div class="absolute top-0 bottom-0 left-0 right-0 z-10 h-full w-full bg-black opacity-60"></div>

    <div class="z-30 flex flex-col items-center justify-center py-48 text-gray-100">
        <h1 class="w-full px-2 sm:px-12 text-center text-4xl font-bold lg:px-0 lg:text-5xl">
            Incredible movies, TV shows, and more. 
        </h1>
        <p class="mt-6 px-12 text-center font-semibold text-2xl md:text-2xl">
            On this platform, you can watch movies and TV show trailers.
        </p>
        <x-newsletter />
    </div>
</div>

<x-gap></x-gap>

<section class="pb-12 lg:pb-0">
    <div class="text-white font-bold flex flex-wrap lg:flex-nowrap justify-center lg:p-20">
        <div class="p-10 flex flex-col items-center justify-center">
            <div>
                <div class="text-5xl">Enjoy on your TV.</div>
                <div class="pt-10 text-2xl">
                    watch on Smart TV, Playstation, Xbox, Chromecast, Apple TV, Blu-ray players, and more.
                </div>
            </div>
        </div>
        <img width="600" src="{{ asset('img/home2.webp') }}" class="object-contain"/>
    </div>
</section>

<x-gap></x-gap>

<section class="py-12 lg:py-0">
    <div class="text-white font-bold flex flex-wrap lg:flex-nowrap justify-center lg:p-20">
        <img width="600" src="{{ asset('img/home3.webp') }}" class="object-contain"/>
        <div class="p-10 flex flex-col items-center justify-center">
            <div>
                <div class="text-5xl">Download your shows to watch offline.</div>
                <div class="pt-10 text-2xl">
                    Save your favorites easily and always have something to watch.
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
                <div class="text-5xl">Watch everywhere.</div>
                <div class="pt-10 text-2xl">
                    Stream unlimited movies and TV shows on your phone, tablet, laptop, and TV. 
                </div>
            </div>
        </div>
        <img width="600" src="{{ asset('img/home4.jpg') }}" class="object-contain"/>
    </div>
</section>






