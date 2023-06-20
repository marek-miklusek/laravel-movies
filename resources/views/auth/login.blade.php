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

            <form method="POST" action="{{ route('login') }}">
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

            <div class="flex justify-center gap-2 text-white mt-4">
                continue with
                <a href="{{ route('sign-in') }}" target="_blank" class="transition-transform transform hover:scale-125">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" viewBox="0 0 186.69 190.5" xmlns:v="https://vecta.io/nano"><g transform="translate(1184.583 765.171)"><path clip-path="none" mask="none" d="M-1089.333-687.239v36.888h51.262c-2.251 11.863-9.006 21.908-19.137 28.662l30.913 23.986c18.011-16.625 28.402-41.044 28.402-70.052 0-6.754-.606-13.249-1.732-19.483z" fill="#4285f4"/><path clip-path="none" mask="none" d="M-1142.714-651.791l-6.972 5.337-24.679 19.223h0c15.673 31.086 47.796 52.561 85.03 52.561 25.717 0 47.278-8.486 63.038-23.033l-30.913-23.986c-8.486 5.715-19.31 9.179-32.125 9.179-24.765 0-45.806-16.712-53.34-39.226z" fill="#34a853"/><path clip-path="none" mask="none" d="M-1174.365-712.61c-6.494 12.815-10.217 27.276-10.217 42.689s3.723 29.874 10.217 42.689c0 .086 31.693-24.592 31.693-24.592-1.905-5.715-3.031-11.776-3.031-18.098s1.126-12.383 3.031-18.098z" fill="#fbbc05"/><path d="M-1089.333-727.244c14.028 0 26.497 4.849 36.455 14.201l27.276-27.276c-16.539-15.413-38.013-24.852-63.731-24.852-37.234 0-69.359 21.388-85.032 52.561l31.692 24.592c7.533-22.514 28.575-39.226 53.34-39.226z" fill="#ea4335" clip-path="none" mask="none"/></g></svg>
                </a>
            </div>

            <!-- Password -->
            <div class="pt-2">
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

