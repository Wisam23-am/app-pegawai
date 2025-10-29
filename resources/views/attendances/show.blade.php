@extends('master')

@section('title', 'Detail Absensi')
@section('page-title', 'Detail Absensi')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h5 class="card-title mb-0">Detail Absensi Karyawan</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong class="d-block">Nama Karyawan:</strong>
                <p class="fs-5">{{ $attendance->employee->nama_lengkap ?? 'Data Karyawan Tidak Ditemukan' }}</p>
            </div>
            <div class="mb-3">
                <strong class="d-block">Tanggal:</strong>
                <p class="fs-5">{{ \Carbon\Carbon::parse($attendance->tanggal)->format('l, d F Y') }}</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong class="d-block">Jam Masuk:</strong>
                        {{-- GANTI INI --}}
                        <p class="fs-5">{{ $attendance->waktu_masuk }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong class="d-block">Jam Keluar:</strong>
                        {{-- GANTI INI --}}
                        <p class="fs-5">{{ $attendance->waktu_keluar ?? '(Belum Absen Pulang)' }}</p>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <strong class="d-block">Status Kehadiran:</strong>
                <p class="fs-5">
                    {{-- GANTI INI --}}
                    @if($attendance->status_absensi == 'hadir')
                        <span class="badge bg-success fs-6">Hadir</span>
                    @elseif($attendance->status_absensi == 'izin')
                        <span class="badge bg-warning text-dark fs-6">Izin</span>
                    @elseif($attendance->status_absensi == 'sakit')
                        <span class="badge bg-info fs-6">Sakit</span>
                    @else
                        <span class="badge bg-danger fs-6">Alpha</span>
                    @endif
                </p>
            </div>

            <hr>
            <div class="d-flex justify-content-end">
                <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
            </div>
        </div>
    </div>
@endsection