@extends('master')

@section('title', 'Daftar Jabatan')
@section('page-title', 'Manajemen Jabatan')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Daftar Jabatan</h5>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <a href="{{ route('positions.create') }}" class="btn btn-success mb-3">
                <i class="bi bi-plus-lg"></i> Tambah Jabatan
            </a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            {{-- UBAH INI --}}
                            <th style="width: 5%;">No.</th>
                            <th>Nama Jabatan</th>
                            <th>Gaji Pokok</th>
                            <th style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($positions as $position)
                            <tr>
                                {{-- UBAH INI --}}
                                <td class="text-center">{{ $positions->firstItem() + $loop->index }}</td>
                                <td>{{ $position->nama_jabatan }}</td>
                                <td class="text-end">Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ingin menghapus data ini?');"
                                        action="{{ route('positions.destroy', $position->id) }}" method="POST">
                                        <a href="{{ route('positions.show', $position->id) }}"
                                            class="btn btn-sm btn-info text-white me-1">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>
                                        <a href="{{ route('positions.edit', $position->id) }}"
                                            class="btn btn-sm btn-primary me-1">
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
                                {{-- Pastikan colspan sesuai --}}
                                <td colspan="4" class="text-center alert alert-danger">
                                    Data Jabatan belum Tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $positions->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection