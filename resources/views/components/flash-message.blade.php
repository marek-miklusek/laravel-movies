@if (session('message') || session('message_d') || session('message_w') )
    <div x-data="{show: true}"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        x-transition.duration.400ms
        class="{{ session('message') ? 'bg-green-100 text-green-700' : (session('message_w') ?  
            'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }} 
            z-30 flex fixed bottom-3 right-3 rounded-xl px-4 py-2 text-sm">
        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd">
            </path>
        </svg>
        <p>{{ session('message') ? session('message') : 
            (session('message_w') ? session('message_w') : session('message_d')) }}
        </p>
    </div>
@endif




