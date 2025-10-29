@extends('master')

@section('title', 'Daftar Departemen')
@section('page-title', 'Manajemen Departemen')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Daftar Departemen</h5>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <a href="{{ route('departments.create') }}" class="btn btn-success mb-3">
                <i class="bi bi-plus-lg"></i> Tambah Departemen
            </a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            {{-- UBAH INI --}}
                            <th style="width: 5%;">No.</th>
                            <th>Nama Departemen</th>
                            <th style="width: 20%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($departments as $department)
                            <tr>
                                {{-- UBAH INI --}}
                                <td class="text-center">{{ $departments->firstItem() + $loop->index }}</td>
                                <td>{{ $department->nama_departemen }}</td>
                                <td class="text-center">
                                    <div class="action-buttons">
                                        <a href="{{ route('departments.show', $department->id) }}"
                                            class="btn btn-sm btn-info text-white" title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('departments.edit', $department->id) }}"
                                            class="btn btn-sm btn-primary" title="Edit">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form onsubmit="return confirm('Apakah Anda Yakin?');"
                                            action="{{ route('departments.destroy', $department->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                {{-- Pastikan colspan sesuai --}}
                                <td colspan="3" class="text-center alert alert-danger">
                                    Data Departemen belum Tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $departments->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection