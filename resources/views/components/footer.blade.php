<x-gap></x-gap>

<footer class="bg-black mx-auto grid grid-cols-3 justify-items-center sm:grid-cols-4 px-3 py-10 text-sm text-[#afafaf]">
    <div class="mx-3 sm:space-y-3 w-20 h-20">
        <a href="https://netflix.com" target="_blanket" class="hover:text-[#e50914] hover:underline">
            <div class="uppercase font-bold text-center mb-2">
                Go to original
            </div>
        </a>
        <img src="{{ asset('img/netflix.png') }}" alt="netflix logo">
        <div class="flex flex-wrap sm:flex-nowrap gap-2 md:gap-4 justify-center">
            <a href="https://www.facebook.com/netflix/" target="_blanket"><i class="hover:text-white fab fa-facebook-square fa-2x"></i></a>
            <a href="https://www.instagram.com/netflix/" target="_blanket"><i class="hover:text-white fab fa-instagram fa-2x"></i></a>
            <a href="https://twitter.com/netflix?" target="_blanket"><i class="hover:text-white fab fa-twitter fa-2x"></i></a>
            <a href="https://www.youtube.com/channel/UCWOA1ZGywLbqmigxE4Qlvuw" target="_blanket"><i class="hover:text-white fab fa-youtube fa-2x"></i></a>
        </div>
    </div>
    <div class="mx-3 sm:space-y-3 underline">
        <div>Audio and Subtitles</div>
        <div>Media centre</div>
        <div>Privacy</div>
        <div>Contact Us</div>
    </div>
    <div class="mx-3 sm:space-y-3 underline">
        <div>Audio Description</div>
        <div>Investor Relations</div>
        <div>Legal Notices</div>
        <div>Terms of Use</div>
    </div>
    <div class="hidden sm:block mx-3 sm:space-y-3">
        <div class="underline">Help Centre</div>
        <div class="underline">Jobs</div>
        <div class="underline {{ isset(Auth::user()->name) ? 'hidden' : 'block'  }}">Corporate Information</div>
        <div class="underline {{ isset(Auth::user()->name) ? 'hidden' : 'block'  }}">Cookie Preferences</div>
        <div class="bg-[#1a1a1a] py-3 px-3 md:px-5 hover:bg-[#e50914] cursor-pointer hover:text-[#fff]
            text-[#e50914] font-semibold text-xl capitalize rounded {{ Auth::user()->name ?? 'hidden' }}">
            <a href="#">
                Hi {{ Auth::user()->name ?? '' }}!
            </a>
        </div>
    </div>
</footer>
