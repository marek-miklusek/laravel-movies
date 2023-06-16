<x-gap></x-gap>

<footer class="bg-black mx-auto grid grid-cols-3 justify-items-center sm:grid-cols-4 px-3
    pt-10 pb-20 sm:pb-14 text-sm text-[#afafaf]">
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
    <div class="mx-3 sm:space-y-3 underline ">
        <div>Gift Cards</div>
        <div>Terms of Use</div>
        <div>Media centre</div>
        <div>Cookie Preferences</div>
    </div>
    <div class="hidden sm:block mx-3 sm:space-y-3">
        @guest
            <div class="underline">Help Centre</div>
            <div class="underline">Jobs</div>
            <div class="underline">Corporate Information</div>
            <div>Media centre</div>
        @endguest
        @auth
            <div class="underline">Help Centre</div>
            <div class="underline">Jobs</div>
            <div class="bg-[#1a1a1a] py-4 px-3 md:px-5 hover:bg-[#e50914] cursor-pointer hover:text-[#fff]
                text-[#e50914] font-semibold text-xl capitalize rounded {{ Auth::user()->name ?? 'hidden' }}">
                <a href="/profile">
                    Hi {{ Auth::user()->name ?? '' }}!
                </a>
            </div>
        @endauth
    </div>
</footer>
