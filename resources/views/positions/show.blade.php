@extends('master')

@section('title', 'Detail Jabatan')
@section('page-title', 'Detail Jabatan')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h5 class="card-title mb-0">Detail</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong class="d-block">ID Jabatan:</strong>
                <p class="fs-5">{{ $position->id }}</p>
            </div>
            <div class="mb-3">
                <strong class="d-block">Nama Jabatan:</strong>
                <p class="fs-5">{{ $position->nama_jabatan }}</p>
            </div>
            <div class="mb-3">
                <strong class="d-block">Gaji Pokok:</strong>
                <p class="fs-5">Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</p>
            </div>
            <div class="mb-3">
                <strong class="d-block">Dibuat Pada:</strong>
                <p class="fs-5">{{ $position->created_at->format('d M Y, H:i:s') }}</p>
            </div>
            <div class="mb-3">
                <strong class="d-block">Terakhir Diperbarui:</strong>
                <p class="fs-5">{{ $position->updated_at->format('d M Y, H:i:s') }}</p>
            </div>

            <hr>
            <div class="d-flex justify-content-end">
                <a href="{{ route('positions.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
            </div>
        </div>
    </div>
@endsection