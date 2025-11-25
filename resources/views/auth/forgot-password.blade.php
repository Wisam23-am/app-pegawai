<x-guest-layout>
    <div class="auth-card">
        <a href="/" class="brand-logo">
            <i class="bi bi-stars"></i> SHEMSTARTUP
        </a>

        <div class="mb-4 text-secondary small text-center">
            {{ __('Lupa kata sandi Anda? Tidak masalah. Beri tahu kami alamat email Anda dan kami akan mengirimkan tautan pengaturan ulang kata sandi.') }}
        </div>

        <x-auth-session-status class="mb-4 text-success text-center small" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-secondary text-secondary"
                        style="border-color: var(--border-glow);">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input id="email" class="form-control border-start-0 ps-0" type="email" name="email"
                        value="{{ old('email') }}" required autofocus placeholder="nama@email.com">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger small" />
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">
                    {{ __('Kirim Link Reset Password') }}
                </button>

                <a href="{{ route('login') }}" class="btn btn-sm text-secondary mt-2">
                    <i class="bi bi-arrow-left"></i> {{ __('Kembali ke Login') }}
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>