<div class="relative flex flex-col h-screen">
    <img class="absolute top-0 bottom-0 z-0 h-full w-full object-cover"
        src="https://assets.nflxext.com/ffe/siteui/vlv3/e178a4e7-4f52-4661-b2ae-41efa25dca7c/60dd20cf-7213-48a1-b253-6484d62d96a8/IN-en-20210222-popsignuptwoweeks-perspective_alpha_website_small.jpg" alt="">
        
    {{-- Overlay --}}
    <div class="absolute top-0 bottom-0 left-0 right-0 z-10 h-full w-full bg-black opacity-60"></div>

    <div class="z-30 flex flex-col items-center justify-center py-48 text-gray-100">
        <h1 class="w-full px-12 text-center text-4xl font-bold lg:px-0 lg:text-5xl">
            Unlimited movies, TV shows, and more. </h1>
        <p class="mt-6 px-12 text-center font-semibold text-xl md:text-2xl">
            Watch anywhere. Cancel anytime.
        </p>
        <x-newsletter />
    </div>
</div>

<x-gap></x-gap>

<section>
    <div class="text-white font-bold flex flex-wrap lg:flex-nowrap justify-center lg:p-20">
        <div class="p-10 lg:p-0 flex items-center justify-center">
            <div>
                <div class="text-5xl text-[#e50914]">Disclaimer.</div>
                <div class="pt-10 lg:w-3/4 text-2xl">
                    This website is an imitation of Netflix, where you can watch movie and 
                    tv show trailers. If you want to watch full movies and tv shows, go to the original 
                    <a href="https://netflix.com" target="_blanket" class="text-[#e50914] hover:underline">
                        NETFLIX.
                    </a> 
                </div>
            </div>
        </div>
        <img width="600" src="{{ asset('img/img4.jpg') }}" />
    </div>
</section>

<x-gap></x-gap>

<section>
    <div class="text-white font-bold flex flex-wrap lg:flex-nowrap justify-center lg:p-20">
        <div class="p-10 lg:p-0 flex flex-col items-center justify-center">
            <div>
                <div class="text-5xl">Enjoy on your TV.</div>
                <div class="pt-10 lg:w-3/4 text-2xl">
                    watch on Smart TV, Playstation, Xbox, Chromecast, Apple TV, Blu-ray players, and more.
                </div>
            </div>
        </div>
        <img width="600" src="{{ asset('img/img1.png') }}" />
    </div>
</section>

<x-gap></x-gap>

<section>
    <div class="text-white font-bold flex flex-wrap lg:flex-nowrap justify-center lg:p-20">
        <img width="600" src="{{ asset('img/img2.png') }}" />
        <div class="p-10 lg:p-0 flex flex-col items-center justify-center">
            <div>
                <div class="text-5xl">Download your shows to watch offline.</div>
                <div class="pt-10 lg:w-3/4 text-2xl">
                    Save your favorites easily and always have something to watch.</div>
            </div>
        </div>
    </div>
</section>

<x-gap></x-gap>

<section>
    <div class="text-white font-bold flex flex-wrap lg:flex-nowrap justify-center lg:p-20">
        <div class="p-10 lg:p-0 flex flex-col items-center justify-center">
            <div>
                <div class="text-5xl">Watch everywhere.</div>
                <div class="pt-10 lg:w-3/4 text-2xl">
                    Stream unlimited movies and TV shows on your phone, tablet, laptop, and TV. 
                </div>
            </div>
        </div>
        <img width="600" src="{{ asset('img/img3.png') }}" />
    </div>
</section>






