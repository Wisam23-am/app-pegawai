@extends('master')

@section('title', 'Detail Karyawan')
@section('page-title', 'Detail Karyawan')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h5 class="card-title mb-0">
                <i class="bi bi-person-circle"></i> Detail Karyawan: {{ $employee->nama_lengkap }}
            </h5>
        </div>
        <div class="card-body">

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong class="d-block">Nama Lengkap:</strong>
                    <p class="fs-5">{{ $employee->nama_lengkap }}</p>
                </div>
                <div class="col-md-6">
                    <strong class="d-block">Email:</strong>
                    <p class="fs-5">{{ $employee->email }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong class="d-block">Nomor Telepon:</strong>
                    <p class="fs-5">{{ $employee->nomor_telepon }}</p>
                </div>
                <div class="col-md-6">
                    <strong class="d-block">Tanggal Lahir:</strong>
                    <p class="fs-5">{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d F Y') }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong class="d-block">Departemen:</strong>
                    <p class="fs-5">{{ $employee->department->nama_departemen ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <strong class="d-block">Jabatan:</strong>
                    <p class="fs-5">{{ $employee->position->nama_jabatan ?? 'N/A' }}</p>
                </div>
            </div>

            <div class="mb-3">
                <strong class="d-block">Alamat:</strong>
                <p class="fs-5">{{ $employee->alamat }}</p>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <strong class="d-block">Tanggal Masuk:</strong>
                    <p class="fs-5">{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d F Y') }}</p>
                </div>
                <div class="col-md-6">
                    <strong class="d-block">Status:</strong>
                    <p class="fs-5">
                        @if($employee->status == 'aktif')
                            <span class="badge bg-success fs-6">Aktif</span>
                        @elseif($employee->status == 'cuti')
                            <span class="badge bg-warning text-dark fs-6">Cuti</span>
                        @else
                            <span class="badge bg-secondary fs-6">Tidak Aktif</span>
                        @endif
                    </p>
                </div>
            </div>

            <hr style="border-color: rgba(102, 126, 234, 0.3);">
            <div class="d-flex justify-content-end">
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
@endsection