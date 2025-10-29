@extends('master')

@section('title', 'Daftar Absensi')
@section('page-title', 'Manajemen Absensi')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Daftar Absensi</h5>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <a href="{{ route('attendances.create') }}" class="btn btn-success mb-3">
                <i class="bi bi-plus-lg"></i> Tambah Absensi
            </a>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            {{-- UBAH INI --}}
                            <th style="width: 5%;">No.</th>
                            <th>Nama Karyawan</th>
                            <th>Tanggal</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($attendances as $att)
                            <tr>
                                {{-- UBAH INI --}}
                                <td class="text-center">{{ $attendances->firstItem() + $loop->index }}</td>
                                <td>{{ $att->employee->nama_lengkap ?? 'Karyawan Dihapus' }}</td>
                                <td>{{ \Carbon\Carbon::parse($att->tanggal)->format('d M Y') }}</td>
                                <td class="text-center">{{ $att->waktu_masuk }}</td>
                                <td class="text-center">{{ $att->waktu_keluar ?? '-' }}</td>
                                <td class="text-center">
                                    @if($att->status_absensi == 'hadir')
                                        <span class="badge bg-success">Hadir</span>
                                    @elseif($att->status_absensi == 'izin')
                                        <span class="badge bg-warning text-dark">Izin</span>
                                    @elseif($att->status_absensi == 'sakit')
                                        <span class="badge bg-info">Sakit</span>
                                    @else
                                        <span class="badge bg-danger">Alpha</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin?');"
                                        action="{{ route('attendances.destroy', $att->id) }}" method="POST">
                                        <a href="{{ route('attendances.show', $att->id) }}"
                                            class="btn btn-sm btn-info text-white me-1">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>
                                        <a href="{{ route('attendances.edit', $att->id) }}" class="btn btn-sm btn-primary me-1">
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
                                <td colspan="7" class="text-center alert alert-danger">
                                    Data Absensi belum Tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $attendances->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection