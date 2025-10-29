@extends('master')

@section('title', 'Edit Departemen')
@section('page-title', 'Edit Departemen')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('departments.update', $department->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- Gunakan method PUT untuk update --}}

                <div class="mb-3">
                    <label for="nama_departemen" class="form-label">Nama Departemen <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('nama_departemen') is-invalid @enderror"
                        id="nama_departemen" name="nama_departemen"
                        value="{{ old('nama_departemen', $department->nama_departemen) }}" required>

                    {{-- Pesan Error --}}
                    @error('nama_departemen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('departments.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection