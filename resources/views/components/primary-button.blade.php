<button {{ $attributes->merge(['type' => 'submit', 'class' => 
    'w-full justify-center inline-flex items-center px-4 py-4 bg-[#e50914] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-opacity-50 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
