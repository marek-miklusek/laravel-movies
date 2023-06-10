<x-master-layout>

    <x-popular-one :popular="$popular[0]" />

    <div class="container mb-40 mt-16 space-y-8 px-4">
        <x-movies-tv :items="$popular">
            <x-slot:category>Popular Tv Shows &rsaquo;</x-slot:category>
        </x-movies-tv>
    
        <x-movies-tv :items="$topRated">
            <x-slot:category>Top Rated Tv Shows &rsaquo;</x-slot:category>
        </x-movies-tv>
    
        <x-movies-tv :items="$comedy">
            <x-slot:category>Comedy &rsaquo;</x-slot:category>
        </x-movies-tv>
    
        <x-movies-tv :items="$action">
            <x-slot:category>Action &rsaquo;</x-slot:category>
        </x-movies-tv>
    
        <x-movies-tv :items="$mystery">
            <x-slot:category>Mystery &rsaquo;</x-slot:category>
        </x-movies-tv>
    
        <x-movies-tv :items="$documentary">
            <x-slot:category>Documentary &rsaquo;</x-slot:category>
        </x-movies-tv>
    
        <x-movies-tv :items="$war">
            <x-slot:category>War &rsaquo;</x-slot:category>
        </x-movies-tv>
    </div>

    <x-gap></x-gap>
    
</x-master-layout>