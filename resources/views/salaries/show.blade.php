@extends('master')

@section('title', 'Detail Gaji')
@section('page-title', 'Detail Gaji Karyawan')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h5 class="card-title mb-0">Slip Gaji (Sederhana)</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong class="d-block">Nama Karyawan:</strong>
                <p class="fs-5">{{ $salary->employee->nama_lengkap ?? 'Data Karyawan Tidak Ditemukan' }}</p>
            </div>
            <div class="mb-3">
                <strong class="d-block">Jabatan:</strong>
                <p class="fs-5">{{ $salary->employee->position->nama_jabatan ?? 'N/A' }}</p>
            </div>
            <div class="mb-3">
                <strong class="d-block">Bulan Gaji:</strong>
                {{-- Format YYYY-MM menjadi NamaBulan YYYY --}}
                <p class="fs-5">{{ \Carbon\Carbon::parse($salary->bulan . '-01')->format('F Y') }}</p>
            </div>
            <hr>

            <h4>Rincian Gaji:</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong class="d-block">Gaji Pokok:</strong>
                        <p class="fs-5 text-success">+ Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong class="d-block">Tunjangan:</strong>
                        <p class="fs-5 text-success">+ Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong class="d-block">Potongan:</strong>
                        <p class="fs-5 text-danger">- Rp {{ number_format($salary->potongan, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <hr>

            <div class="alert alert-success">
                <h4 class="alert-heading">Total Gaji (Take Home Pay)</h4>
                <p class="fs-3 mb-0"><b>Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</b></p>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
            </div>
        </div>
    </div>
@endsection