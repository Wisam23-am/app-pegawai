@extends('master')

@section('title', 'Dashboard')

@section('content')
    <div class="card shadow-sm mb-4">
        <div class="card-body p-4">
            <h3 class="fw-bold mb-1">Selamat Datang, {{ Auth::user()->name }}!</h3>
            <p class="text-secondary mb-0">Berikut adalah ringkasan data kepegawaian hari ini.</p>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-start border-4 border-primary">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle p-3 bg-primary bg-opacity-10 text-primary me-3">
                        <i class="bi bi-people-fill fs-3"></i>
                    </div>
                    <div>
                        <div class="text-secondary small text-uppercase fw-bold">Total Pegawai</div>
                        <div class="fs-3 fw-bold text-light">{{ $total_employees ?? 0 }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-start border-4 border-success">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle p-3 bg-success bg-opacity-10 text-success me-3">
                        <i class="bi bi-building fs-3"></i>
                    </div>
                    <div>
                        <div class="text-secondary small text-uppercase fw-bold">Departemen</div>
                        <div class="fs-3 fw-bold text-light">{{ $total_departments ?? 0 }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-start border-4 border-info">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle p-3 bg-info bg-opacity-10 text-info me-3">
                        <i class="bi bi-briefcase-fill fs-3"></i>
                    </div>
                    <div>
                        <div class="text-secondary small text-uppercase fw-bold">Jabatan</div>
                        <div class="fs-3 fw-bold text-light">{{ $total_positions ?? 0 }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-start border-4 border-warning">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle p-3 bg-warning bg-opacity-10 text-warning me-3">
                        <i class="bi bi-person-badge fs-3"></i>
                    </div>
                    <div>
                        <div class="text-secondary small text-uppercase fw-bold">Akun User</div>
                        <div class="fs-3 fw-bold text-light">{{ $total_users ?? 0 }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body p-4">
                    <h4 class="card-title fw-bold mb-3"><i class="bi bi-lightning-charge-fill text-warning"></i> Aksi Cepat
                    </h4>
                    <div class="d-flex flex-wrap gap-2">


                        {{-- Tombol Cek Absensi (User Biasa) --}}
                        @if(Auth::user()->role !== 'admin')
                            <a href="{{ route('attendances.index') }}" class="btn btn-outline-light">
                                <i class="bi bi-calendar-check"></i> Cek Absensi Saya
                            </a>
                        @endif

                        {{-- Tombol Khusus Admin --}}
                        @if(Auth::user()->role === 'admin')
                            {{-- Tombol Tambah Pegawai --}}
                            <a href="{{ route('employees.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-lg"></i> Tambah Pegawai
                            </a>
                            
                            {{-- Kelola Absensi --}}
                            <a href="{{ route('attendances.index') }}" class="btn btn-info text-white">
                                <i class="bi bi-clipboard-data"></i> Kelola Absensi
                            </a>

                            {{-- BARU: Kelola Semua Gaji --}}
                            <a href="{{ route('salaries.index') }}" class="btn btn-success text-white">
                                <i class="bi bi-cash-stack"></i> Semua Data Gaji
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection