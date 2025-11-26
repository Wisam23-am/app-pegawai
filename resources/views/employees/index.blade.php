@extends('master')

@section('title', 'Daftar Karyawan')
@section('page-title', 'Manajemen Karyawan')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">
                <i class="bi bi-people-fill"></i> Daftar Karyawan
            </h5>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row mb-3">
                <div class="col-md-6">
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('employees.create') }}" class="btn btn-success">
                            <i class="bi bi-plus-lg"></i> Tambah Karyawan
                        </a>
                    @endif
                </div>
                <div class="col-md-6">
                    <form action="{{ route('employees.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari Nama atau Email..."
                                value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i> Cari</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            <th style="width: 5%;">No.</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Telepon</th>
                            <th>Jabatan</th>
                            <th>Departemen</th>
                            <th>Status</th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $employee)
                            <tr>
                                <td class="text-center">{{ $employees->firstItem() + $loop->index }}</td>
                                <td>{{ $employee->nama_lengkap }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->nomor_telepon }}</td>
                                <td>{{ $employee->position->nama_jabatan ?? 'N/A' }}</td>
                                <td>{{ $employee->department->nama_departemen ?? 'N/A' }}</td>
                                <td class="text-center">
                                    @if($employee->status == 'aktif')
                                        <span class="badge bg-success">Aktif</span>
                                    @elseif($employee->status == 'cuti')
                                        <span class="badge bg-warning text-dark">Cuti</span>
                                    @else
                                        <span class="badge bg-secondary">Tidak Aktif</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        {{-- TOMBOL DETAIL BISA DILIHAT SEMUA ROLE --}}
                                        <a href="{{ route('employees.show', $employee->id) }}"
                                            class="btn btn-sm btn-info text-white" title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        {{-- TOMBOL EDIT & HAPUS HANYA UNTUK ADMIN --}}
                                        @if(Auth::user()->role === 'admin')
                                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-primary"
                                                title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form onsubmit="return confirm('Apakah Anda Yakin?');"
                                                action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center alert alert-danger">
                                    Data Karyawan belum Tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center mt-3">
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection