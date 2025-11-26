@extends('master')

@section('title', 'Profil Pengguna')
@section('page-title', 'Pengaturan Akun')

@section('content')
    <div class="row g-4">
        {{-- Bagian 1: Informasi Profil --}}
        <div class="col-md-12">
            @include('profile.partials.update-profile-information-form')
        </div>

        {{-- Bagian 2: Update Password --}}
        <div class="col-md-12">
            @include('profile.partials.update-password-form')
        </div>

        {{-- Bagian 3: Hapus Akun --}}
        <div class="col-md-12">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
@endsection