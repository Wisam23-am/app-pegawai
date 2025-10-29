@extends('master')

@section('title', 'Edit Gaji')
@section('page-title', 'Edit Data Gaji')

@section('content')
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('salaries.update', $salary->id) }}" method="POST">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="karyawan_id" class="form-label">Nama Karyawan <span class="text-danger">*</span></label>
                    <select class="form-select @error('karyawan_id') is-invalid @enderror" id="karyawan_id"
                        name="karyawan_id" required>
                        <option value="" disabled>Pilih Karyawan</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}" {{ old('karyawan_id', $salary->karyawan_id) == $employee->id ? 'selected' : '' }}>
                                {{ $employee->nama_lengkap }} (Jabatan: {{ $employee->position->nama_jabatan ?? 'N/A' }})
                            </option>
                        @endforeach
                    </select>
                    @error('karyawan_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3"> {{-- Input Gaji Pokok Dihapus --}}
                    <label for="bulan" class="form-label">Bulan Gaji (YYYY-MM) <span class="text-danger">*</span></label>
                    <input type="month" class="form-control @error('bulan') is-invalid @enderror" id="bulan" name="bulan"
                        value="{{ old('bulan', $salary->bulan) }}" required>
                    @error('bulan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tunjangan" class="form-label">Tunjangan</label>
                            <input type="number" class="form-control @error('tunjangan') is-invalid @enderror"
                                id="tunjangan" name="tunjangan" value="{{ old('tunjangan', $salary->tunjangan) }}" min="0">
                            @error('tunjangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="potongan" class="form-label">Potongan</label>
                            <input type="number" class="form-control @error('potongan') is-invalid @enderror" id="potongan"
                                name="potongan" value="{{ old('potongan', $salary->potongan) }}" min="0">
                            @error('potongan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>

                <p class="text-muted">
                    * Gaji Pokok akan diambil otomatis dari Jabatan Karyawan saat disimpan. Total Gaji akan dihitung ulang.
                </p>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('salaries.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection