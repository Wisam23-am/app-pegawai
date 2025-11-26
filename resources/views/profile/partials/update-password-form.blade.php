<div class="card shadow-sm">
    <div class="card-header bg-secondary text-white">
        <h5 class="card-title mb-0">
            <i class="bi bi-shield-lock-fill"></i> {{ __('Perbarui Password') }}
        </h5>
    </div>
    <div class="card-body">
        <p class="text-white-50 mb-4">
            {{ __('Pastikan akun Anda menggunakan password yang panjang dan acak agar tetap aman.') }}
        </p>

        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="update_password_current_password"
                    class="form-label text-white">{{ __('Password Saat Ini') }}</label>
                <input type="password" class="form-control text-white"
                    style="background-color: rgba(30, 41, 59, 0.6); border-color: rgba(71, 85, 105, 0.5);"
                    id="update_password_current_password" name="current_password" autocomplete="current-password">
                @if($errors->updatePassword->has('current_password'))
                    <div class="text-danger mt-1 small">
                        {{ $errors->updatePassword->first('current_password') }}
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="update_password_password" class="form-label text-white">{{ __('Password Baru') }}</label>
                <input type="password" class="form-control text-white"
                    style="background-color: rgba(30, 41, 59, 0.6); border-color: rgba(71, 85, 105, 0.5);"
                    id="update_password_password" name="password" autocomplete="new-password">
                @if($errors->updatePassword->has('password'))
                    <div class="text-danger mt-1 small">
                        {{ $errors->updatePassword->first('password') }}
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="update_password_password_confirmation"
                    class="form-label text-white">{{ __('Konfirmasi Password Baru') }}</label>
                <input type="password" class="form-control text-white"
                    style="background-color: rgba(30, 41, 59, 0.6); border-color: rgba(71, 85, 105, 0.5);"
                    id="update_password_password_confirmation" name="password_confirmation" autocomplete="new-password">
                @if($errors->updatePassword->has('password_confirmation'))
                    <div class="text-danger mt-1 small">
                        {{ $errors->updatePassword->first('password_confirmation') }}
                    </div>
                @endif
            </div>

            <div class="d-flex align-items-center gap-3">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ __('Simpan Password') }}
                </button>

                @if (session('status') === 'password-updated')
                    <div class="text-success fw-bold fade show" role="alert">
                        <i class="bi bi-check-circle"></i> {{ __('Berhasil disimpan.') }}
                    </div>
                @endif
            </div>
        </form>
    </div>
</div>