<x-guest-layout>
    <div class="auth-card">
        <a href="/" class="brand-logo">
            <i class="bi bi-stars"></i> SHEMSTARTUP
        </a>

        <h5 class="text-center text-light mb-4">{{ __('Reset Password') }}</h5>

        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" class="form-control" type="email" name="email"
                    value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger small" />
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password Baru') }}</label>
                <input id="password" class="form-control" type="password" name="password" required
                    autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger small" />
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label">{{ __('Konfirmasi Password') }}</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
                    required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger small" />
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>