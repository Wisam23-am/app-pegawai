@extends('master')

@section('title', 'Daftar Pegawai')

@section('page-title', 'Manajemen Pegawai')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title mb-0">Daftar Data Pegawai</h3>
        </div>
        <div class="card-body">
            <a href="{{ route('employees.create') }}" class="btn btn-success mb-3">
                + Tambah Pegawai Baru
            </a>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Tanggal Masuk</th>
                            <th>Status</th>
                            <th style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $employee)
                            <tr>
                                <td>{{ $employee->nama_lengkap }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->nomor_telepon }}</td>
                                <td>{{ $employee->tanggal_masuk }}</td>
                                <td class="text-center">
                                    <span class="badge {{ $employee->status == 'aktif' ? 'bg-success' : 'bg-danger' }}">
                                        {{ ucfirst($employee->status) }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                                        <a href="{{ route('employees.show', $employee->id) }}"
                                            class="btn btn-sm btn-dark">DETAIL</a>
                                        <a href="{{ route('employees.edit', $employee->id) }}"
                                            class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center alert alert-danger">
                                    Data Pegawai belum Tersedia.
                                <td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $employees->links() }}
            </div>
        </div>
    </div>
@endsection