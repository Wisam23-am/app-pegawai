<div class="card shadow-sm border-danger border-opacity-25" style="border: 1px solid rgba(220, 38, 38, 0.3);">
    <div class="card-header bg-danger text-white">
        <h5 class="card-title mb-0">
            <i class="bi bi-exclamation-triangle-fill"></i> {{ __('Hapus Akun') }}
        </h5>
    </div>
    <div class="card-body">
        <div class="alert alert-warning text-dark">
            <i class="bi bi-exclamation-circle"></i>
            {{ __('Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen. Sebelum menghapus akun, harap unduh data atau informasi apa pun yang ingin Anda simpan.') }}
        </div>

        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
            <i class="bi bi-trash"></i> {{ __('Hapus Akun Saya') }}
        </button>
    </div>
</div>

<div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="background: #1e293b; color: white; border: 1px solid rgba(255,255,255,0.1);">
            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <div class="modal-header border-bottom border-secondary">
                    <h5 class="modal-title text-white" id="confirmUserDeletionModalLabel">
                        {{ __('Apakah Anda yakin ingin menghapus akun?') }}
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p class="text-white-50 mb-3">
                        {{ __('Setelah akun Anda dihapus, semua sumber daya dan data akan dihapus secara permanen. Silakan masukkan password Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.') }}
                    </p>

                    <div class="mb-3">
                        <label for="password" class="form-label text-white">{{ __('Password') }}</label>
                        <input type="password" class="form-control text-white"
                            style="background-color: rgba(15, 23, 42, 0.8); border-color: rgba(255,255,255,0.2);"
                            id="password" name="password" placeholder="{{ __('Password') }}">

                        @if($errors->userDeletion->has('password'))
                            <div class="text-danger mt-1 small">
                                {{ $errors->userDeletion->first('password') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="modal-footer border-top border-secondary">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Batal') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('Hapus Akun') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if($errors->userDeletion->isNotEmpty())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var myModal = new bootstrap.Modal(document.getElementById('confirmUserDeletionModal'));
            myModal.show();
        });
    </script>
@endif