<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Jika employee ditemukan dari link /register?email=... --}}
        @if(isset($employee))
            {{-- Hidden input untuk email --}}
            <input type="hidden" name="email" value="{{ $employee->email }}">

            <div>
                <x-input-label :value="__('Nama')" />
                <x-text-input class="block mt-1 w-full bg-gray-100" type="text" value="{{ $employee->nama_lengkap }}"
                    disabled />
            </div>

        @else
            {{-- Jika employee belum ditemukan, user harus isi email dulu --}}
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                <p class="text-sm text-gray-600 mt-2">
                    Masukkan email yang sudah terdaftar sebagai pegawai.
                </p>
            </div>
        @endif

        {{-- Password --}}
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Konfirmasi Password --}}
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>