<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <div class="flex">
                    <x-label for="password" :value="__('Password')" />

                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-100 hover:text-purple-800 transition duration-150 ease-in-out ml-auto" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                </div>

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-purple-900 shadow-sm focus:border-indigo-300 focus:ring focus:ring-purple-700 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-100 hover:text-purple-800 transition duration-150 ease-in-out">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex mt-4">
                <a class="text-sm text-gray-100 hover:text-purple-800 transition duration-150 ease-in-out my-auto" href="{{ route('register') }}">
                    {{ 'Register here!' }}
                </a>


                <x-button class="ml-auto text-gray-100">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
