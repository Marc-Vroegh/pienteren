@vite('resources/css/app.css')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 custom-background">
    <div class="max-w-md w-full space-y-8 bg-black bg-opacity-75 py-12 px-4 sm:px-6 lg:px-8 rounded-lg">
        <div>
            <h2 class="text-center text-3xl font-extrabold text-white">
                {{ __('Herstel Wachtwoord2') }}
            </h2>
        </div>
        <form method="POST" action="{{ route('password.email') }}" class="mt-8 space-y-6">
            @csrf

            @if (session('status'))
                <div class="alert alert-success text-white" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="rounded-md shadow-sm -space-y-px">
                <div class="mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end text-white">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border-white border-2 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('Email Address') }}">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Stuur Wachtwoord Reset Link') }}
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
