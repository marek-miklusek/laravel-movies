<x-master-layout>
  
    <div class="w-full relative h-screen flex justify-center items-center">
        <img class="absolute top-0 bottom-0 z-0 h-full w-full object-cover"
        src="{{ url('img/login-register.jpeg') }}" alt="movies">
        
        {{-- Overlay --}}
        <div class="absolute top-0 bottom-0 left-0 right-0 z-10 h-full w-full bg-black opacity-60"></div>
        
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="z-30 bg-black bg-opacity-50 p-10 rounded-md">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-white"/>
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="text-white"/>

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-white">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="mt-4">
                {{-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif --}}
                <x-primary-button>
                    {{ __('Log in') }}
                </x-primary-button>
                <div class="text-white text-center mt-4">
                    or
                    <a href="{{ route('register') }}" class="underline hover:text-[#21d07a] pl-2">
                        Register?
                    </a>
                </div>
            </div>
        </form>

    </div>

</x-master-layout>

