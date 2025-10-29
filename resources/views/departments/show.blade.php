@extends('master')

@section('title', 'Detail Departemen')
@section('page-title', 'Detail Departemen')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h5 class="card-title mb-0">Detail</h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <strong class="d-block">ID Departemen:</strong>
                <p class="fs-5">{{ $department->id }}</p>
            </div>
            <div class="mb-3">
                <strong class="d-block">Nama Departemen:</strong>
                <p class="fs-5">{{ $department->nama_departemen }}</p>
            </div>
            <div class="mb-3">
                <strong class="d-block">Dibuat Pada:</strong>
                <p class="fs-5">{{ $department->created_at->format('d M Y, H:i:s') }}</p>
            </div>
            <div class="mb-3">
                <strong class="d-block">Terakhir Diperbarui:</strong>
                <p class="fs-5">{{ $department->updated_at->format('d M Y, H:i:s') }}</p>
            </div>

            <hr>
            <div class="d-flex justify-content-end">
                <a href="{{ route('departments.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
            </div>
        </div>
    </div>
@endsection