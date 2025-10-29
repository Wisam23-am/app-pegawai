@extends('master')

@section('title', 'Tambah Absensi')
@section('page-title', 'Tambah Absensi Baru')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('attendances.store') }}" method="POST">
                @csrf

                {{-- Error Handling --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="karyawan_id" class="form-label">Nama Karyawan <span
                                    class="text-danger">*</span></label>
                            {{-- UBAH BAGIAN INI --}}
                            <select class="form-select @error('karyawan_id') is-invalid @enderror" id="karyawan_id"
                                name="karyawan_id" required>
                                <option value="" disabled selected>Pilih Karyawan</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}" {{ old('karyawan_id') == $employee->id ? 'selected' : '' }}>
                                        {{-- Tampilkan Nama Lengkap dan ID --}}
                                        {{ $employee->nama_lengkap }} (ID: {{ $employee->id }})
                                    </option>
                                @endforeach
                            </select>
                            {{-- UBAH BAGIAN INI --}}
                            @error('karyawan_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                name="tanggal" value="{{ old('tanggal') }}" required>
                            @error('tanggal')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="waktu_masuk" class="form-label">Jam Masuk <span class="text-danger">*</span></label>
                            <input type="time" class="form-control @error('waktu_masuk') is-invalid @enderror"
                                id="waktu_masuk" name="waktu_masuk" value="{{ old('waktu_masuk') }}" required>
                            @error('waktu_masuk')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="waktu_keluar" class="form-label">Jam Keluar</label>
                            <input type="time" class="form-control @error('waktu_keluar') is-invalid @enderror"
                                id="waktu_keluar" name="waktu_keluar" value="{{ old('waktu_keluar') }}">
                            @error('waktu_keluar')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="status_absensi" class="form-label">Status <span class="text-danger">*</span></label>
                    <select class="form-select @error('status_absensi') is-invalid @enderror" id="status_absensi"
                        name="status_absensi" required>
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="hadir" {{ old('status_absensi') == 'hadir' ? 'selected' : '' }}>Hadir</option>
                        <option value="alpha" {{ old('status_absensi') == 'alpha' ? 'selected' : '' }}>Alpha</option>
                        <option value="izin" {{ old('status_absensi') == 'izin' ? 'selected' : '' }}>Izin</option>
                        <option value="sakit" {{ old('status_absensi') == 'sakit' ? 'selected' : '' }}>Sakit</option>
                    </select>
                    @error('status_absensi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('attendances.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection