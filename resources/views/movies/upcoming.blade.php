<x-master-layout>

    <x-popular-one :popular="$upcoming[0]" />

    <div class="container mb-40 mt-16 space-y-8 px-4">
        <x-movies-tv :items="$upcoming">
            <x-slot:category>Upcoming Movies &rsaquo;</x-slot:category>
        </x-movies-tv>

        <x-movies-tv :items="$nowPlaying">
            <x-slot:category>Now Playing Movies &rsaquo;</x-slot:category>
        </x-movies-tv>

        <x-movies-tv :items="$airingToday">
            <x-slot:category>Now Playing Tv Shows &rsaquo;</x-slot:category>
        </x-movies-tv>

        <x-movies-tv :items="$topRated">
            <x-slot:category>Top Rated Movies &rsaquo;</x-slot:category>
        </x-movies-tv>
    </div>

</x-master-layout>