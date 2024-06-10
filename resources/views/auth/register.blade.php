@vite('resources/css/app.css')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 custom-background">
    <div class="max-w-md w-full space-y-8 bg-black bg-opacity-75 py-12 px-4 sm:px-6 lg:px-8 rounded-lg">
        <div>
            <h2 class="text-center text-3xl font-extrabold text-white">
                {{ __('Register') }}
            </h2>
        </div>
        <form class="mt-8 space-y-6" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="rounded-md shadow-sm ">
                <div class="mb-2">
                    <label for="first_name" class="block text-white text-sm font-medium mb-1">{{ __('First Name') }}</label>
                    <input id="first_name" name="first_name" type="text" autocomplete="given-name" required class="border-white border-2 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="{{ __('First Name') }}" value="{{ old('first_name') }}">
                    @error('first_name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="last_name" class="block text-white text-sm font-medium mb-1">{{ __('Last Name') }}</label>
                    <input id="last_name" name="last_name" type="text" autocomplete="family-name" required class="border-white border-2 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="{{ __('Last Name') }}" value="{{ old('last_name') }}">
                    @error('last_name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="email" class="block text-white text-sm font-medium mb-1">{{ __('Email Address') }}</label>
                    <input id="email" name="email" type="email" autocomplete="email" required class="border-white border-2 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="{{ __('Email Address') }}" value="{{ old('email') }}">
                    @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="password" class="block text-white text-sm font-medium mb-1">{{ __('Password') }}</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required class="border-white border-2 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="{{ __('Password') }}">
                    @error('password')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="password_confirmation" class="block text-white text-sm font-medium mb-1">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required class="border-white border-2 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="{{ __('Confirm Password') }}">
                </div>
            </div>
            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
        <div class="text-white text-sm text-center">
            {{ __('Already have an account?') }} <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300">{{ __('Sign in here') }}</a>
        </div>
    </div>
</div>
