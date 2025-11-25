<x-guest-layout>
    <div class="auth-card">
        <a href="/" class="brand-logo">
            <i class="bi bi-stars"></i> SHEMSTARTUP
        </a>

        <h5 class="text-center text-light mb-4">Create Account</h5>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Logika cek employee --}}
            @if(isset($employee))
                <input type="hidden" name="email" value="{{ $employee->email }}">

                <div class="mb-3">
                    <label class="form-label">{{ __('Nama Lengkap') }}</label>
                    <input class="form-control" type="text" value="{{ $employee->nama_lengkap }}" disabled
                        style="background: rgba(255,255,255,0.1); cursor: not-allowed;">
                </div>
            @else
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required
                        autofocus>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger small" />
                    <div class="form-text text-secondary mt-1" style="font-size: 0.8rem;">
                        *Masukkan email yang sudah terdaftar sebagai pegawai.
                    </div>
                </div>
            @endif

            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" class="form-control" type="password" name="password" required
                    autocomplete="new-password">
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger small" />
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation"
                    required autocomplete="new-password">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger small" />
            </div>

            <button type="submit" class="btn btn-primary mb-3">
                {{ __('Register') }}
            </button>

            <div class="text-center auth-links">
                <span class="text-secondary small">Already registered?</span>
                <a href="{{ route('login') }}" class="ms-1">
                    {{ __('Log in') }}
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>