<x-master-layout>

    <x-popular-one :popular="$popular[0]" />

    <div class="container mb-40 mt-16 space-y-8 px-4">
        <x-movies :movies="$popular">
            <x-slot:category>Popular on Netflix &rsaquo;</x-slot:category>
        </x-movies>
    
        <x-movies :movies="$trending">
            <x-slot:category>Trending on Netflix &rsaquo;</x-slot:category>
        </x-movies>
    
        <x-movies :movies="$comedies">
            <x-slot:category>Comedies &rsaquo;</x-slot:category>
        </x-movies>
    
        <x-movies :movies="$action">
            <x-slot:category>Action &rsaquo;</x-slot:category>
        </x-movies>
    
        <x-movies :movies="$mystery">
            <x-slot:category>Mystery &rsaquo;</x-slot:category>
        </x-movies>
    
        <x-movies :movies="$horror">
            <x-slot:category>Horror &rsaquo;</x-slot:category>
        </x-movies>
    
        <x-movies :movies="$war">
            <x-slot:category>War &rsaquo;</x-slot:category>
        </x-movies>
    </div>

    <x-gap></x-gap>

</x-master-layout>