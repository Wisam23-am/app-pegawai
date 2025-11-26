<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="card-title mb-0">
            <i class="bi bi-person-badge-fill"></i> {{ __('Informasi Profil') }}
        </h5>
    </div>
    <div class="card-body">
        <div class="alert alert-info d-flex align-items-center" role="alert">
            <i class="bi bi-info-circle-fill me-2"></i>
            <div class="text-dark">
                {{ __("Berikut adalah informasi akun Anda. Hubungi Admin jika terdapat kesalahan data.") }}
            </div>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label text-white">{{ __('Nama Lengkap') }}</label>
            {{-- Tambahkan style inline untuk memaksa tampilan dark mode pada input disabled --}}
            <input type="text" id="name" class="form-control"
                style="background-color: rgba(30, 41, 59, 0.6); color: #ffffff; border: 1px solid rgba(255, 255, 255, 0.1);"
                value="{{ $user->name }}" disabled readonly>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label text-white">{{ __('Email') }}</label>
            <input type="email" id="email" class="form-control"
                style="background-color: rgba(30, 41, 59, 0.6); color: #ffffff; border: 1px solid rgba(255, 255, 255, 0.1);"
                value="{{ $user->email }}" disabled readonly>
        </div>
    </div>
</div>