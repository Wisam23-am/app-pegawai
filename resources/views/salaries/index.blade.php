@extends('master')

@section('title', 'Daftar Gaji')
@section('page-title', 'Manajemen Gaji')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Daftar Gaji Karyawan</h5>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <a href="{{ route('salaries.create') }}" class="btn btn-success mb-3">
                <i class="bi bi-plus-lg"></i> Tambah Data Gaji
            </a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            <th style="width: 5%;">No.</th>
                            <th>Nama Karyawan</th>
                            <th>Bulan</th>
                            <th>Gaji Pokok</th>
                            <th>Total Gaji</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($salaries as $salary)
                            <tr>
                                <td class="text-center">{{ $salaries->firstItem() + $loop->index }}</td>
                                <td>{{ $salary->employee->nama_lengkap ?? 'Karyawan Dihapus' }}</td>
                                <td>{{ \Carbon\Carbon::parse($salary->bulan . '-01')->format('F Y') }}</td>
                                <td class="text-end">Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                                <td class="text-end"><b>Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</b></td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin?');"
                                        action="{{ route('salaries.destroy', $salary->id) }}" method="POST">
                                        <a href="{{ route('salaries.show', $salary->id) }}"
                                            class="btn btn-sm btn-info text-white me-1">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>
                                        <a href="{{ route('salaries.edit', $salary->id) }}" class="btn btn-sm btn-primary me-1">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center alert alert-danger">
                                    Data Gaji belum Tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $salaries->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection