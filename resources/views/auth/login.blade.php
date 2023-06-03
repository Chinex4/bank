{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!-- Session Status -->
<x-auth-session-status class="mb-4 text-red-700" :status="session('status')" />
<div class="max-w-80 h-80 p-4 bg-white shadow-2xl rounded-xl md:hidden hidden sign-on">
    <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="flex flex-col space-y-4">
                <div class="flex flex-col">
                    <label for="#" class="text-sm mb-1">Email</label>
                    <input type="email" placeholder="e.g JoeDavid4@gmail.com" name="email" :value="old('email')" required autofocus autocomplete="username"
                    class="focus:outline-none focus:ring-1 focus:ring-indigo-700 hover:border-indigo-700 px-3 py-2 border border-gray-600 rounded-lg">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-700" />
                </div>
                <div class="flex flex-col">
                    <label for="#" class="text-sm mb-1">Password</label>
                    <input type="password" placeholder="Enter Your Password"  name="password" required autocomplete="current-password"
                    class="focus:outline-none focus:ring-1 focus:ring-indigo-700 hover:border-indigo-700 px-3 py-2 border border-gray-600 rounded-lg">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-700" />
                </div>
        </div>
        <div class="flex space-x-1 mt-2">
        <input type="checkbox" class="border-indigo-700" name="" id="">
        <p>Remember Me</p>
        </div>
        <button type="submit" class="w-full bg-indigo-900 text-white rounded-lg py-2 mt-4 hover:bg-indigo-500">Sign On</button>
    </form>
    <div class="flex justify-between mt-4">

       <p><a href="/register" class="hover:text-indigo-700">Register</a> / <a href="/register"
          class="hover:text-indigo-700">Activate</a></p>
        @if (Route::has('password.request'))
          <p>Forgot <a href="{{ route('password.request') }}" class="hover:text-indigo-700">UserID</a> or <a href="{{ route('password.request') }}"
            class="hover:text-indigo-700">Password</a></p>
        @endif
    </div>
  </div>




