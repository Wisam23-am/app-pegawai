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

            {{-- HANYA ADMIN --}}
            @if(Auth::user()->role === 'admin')
                <a href="{{ route('positions.create') }}" class="btn btn-success mb-3">
                    <i class="bi bi-plus-lg"></i> Tambah Jabatan
                </a>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            <th style="width: 5%;">No.</th>
                            <th>Nama Jabatan</th>
                            <th>Gaji Pokok</th>
                            <th style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($positions as $position)
                            <tr>
                                <td class="text-center">{{ $positions->firstItem() + $loop->index }}</td>
                                <td>{{ $position->nama_jabatan }}</td>
                                <td class="text-end">Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <div class="action-buttons">
                                        {{-- DETAIL UNTUK SEMUA --}}
                                        <a href="{{ route('positions.show', $position->id) }}"
                                            class="btn btn-sm btn-info text-white" title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        {{-- EDIT & DELETE HANYA ADMIN --}}
                                        @if(Auth::user()->role === 'admin')
                                            <a href="{{ route('positions.edit', $position->id) }}" class="btn btn-sm btn-primary"
                                                title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form onsubmit="return confirm('Apakah Anda Yakin?');"
                                                action="{{ route('positions.destroy', $position->id) }}" method="POST"
                                                class="d-inline">
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