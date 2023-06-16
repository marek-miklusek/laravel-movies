<x-gap></x-gap>

<footer class="bg-black text-[#afafaf]">
    <div class="container flex items-center mx-auto py-8 justify-center">
        <div>&copy; MOVIESFUN</div>
        <div class="pl-1"> | 2023</div>
        @auth
            <div class="bg-[#1a1a1a] ml-5 py-4 px-3 md:px-5 hover:bg-[#e50914] cursor-pointer hover:text-[#fff]
                text-[#e50914] font-semibold text-xl capitalize rounded {{ Auth::user()->name ?? 'hidden' }}">
                <a href="/profile">
                    Hi {{ Auth::user()->name ?? '' }}!
                </a>
            </div>
        @endauth
    </div>
</footer>
