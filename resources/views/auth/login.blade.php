<x-guest-layout>
    <div class="auth-card">
        <a href="/" class="brand-logo">
            <i class="bi bi-stars"></i> SHEMSTARTUP
        </a>

        <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required
                    autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger small" />
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" class="form-control" type="password" name="password" required
                    autocomplete="current-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger small" />
            </div>

            <div class="form-check mb-4">
                <input id="remember_me" type="checkbox" class="form-check-input bg-transparent border-secondary"
                    name="remember">
                <label for="remember_me" class="form-check-label text-secondary small">
                    {{ __('Remember me') }}
                </label>
            </div>

            <button type="submit" class="btn btn-primary mb-3">
                {{ __('Log in') }}
            </button>

            <div class="d-flex justify-content-between auth-links">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">
                        {{ __('Register Account') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
</x-guest-layout>