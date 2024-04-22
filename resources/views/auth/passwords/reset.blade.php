@vite('resources/css/app.css')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 custom-background">
    <div class="max-w-md w-full space-y-8 bg-black bg-opacity-75 py-12 px-4 sm:px-6 lg:px-8 rounded-lg">
        <div>
            <h2 class="text-center text-3xl font-extrabold text-white">
                {{ __('Herstel Wachtwoord') }}
            </h2>
        </div>
        <form method="POST" action="{{ route('password.update') }}" class="mt-8 space-y-6">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="rounded-md shadow-sm -space-y-px">
                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end text-white">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border-white border-2 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Email Address') }}">

                        @error('email')
                            <span class="text-white invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end text-white">{{ __('Wachtwoord') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border-white border-2 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">

                        @error('password')
                            <span class="invalid-feedback text-red" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end text-white">{{ __('Bevestig Wachtwoord') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control border-white border-2 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                    </div>
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Hestel Password') }}
                    </button>
                </div>
            </div>
        </form>
        <div class="text-white text-sm flex justify-around">
            <a href="{{ route('register') }}" class="text-indigo-400 hover:text-indigo-300">{{ __('Registreer hier') }}</a>
            <a href="{{ route('login') }}"class="text-indigo-400 hover:text-indigo-300">{{ __('Inloggen') }}
            </a>
        </div>
    </div>
</div>
