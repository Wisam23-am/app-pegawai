@extends('master')

@section('title', 'Absensi')
@section('page-title', 'Manajemen Absensi')

@section('content')
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">
                {{ Auth::user()->role === 'admin' ? 'Data Absensi Semua Pegawai' : 'Absensi Saya' }}
            </h5>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- BAGIAN TOMBOL ABSENSI (Hanya untuk Non-Admin atau Semua User jika admin juga absen) --}}
            @if(Auth::user()->role !== 'admin' || true) {{-- Hapus '|| true' jika admin tidak butuh tombol absen sendiri
                --}}
                <div class="text-center mb-4">
                    <h4 class="mb-3">Halo, {{ Auth::user()->name }}</h4>
                    <p class="text-muted">{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y') }}</p>

                    <form action="{{ route('attendances.submit') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow">
                            <i class="bi bi-fingerprint"></i> KLIK UNTUK ABSEN
                        </button>
                    </form>
                    <small class="text-muted d-block mt-2">
                        Klik sekali untuk Datang, klik lagi untuk Pulang/Update Pulang.
                    </small>
                </div>
                <hr>
            @endif

            <div class="row mb-3 align-items-center">
                <div class="col-md-6">
                    {{-- Form Pencarian --}}
                    <form action="{{ route('attendances.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control"
                                placeholder="Cari Nama atau Tanggal (YYYY-MM-DD)..." value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i> Cari</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-end">
                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('attendances.create') }}" class="btn btn-success">
                            <i class="bi bi-plus-lg"></i> Tambah Manual (Admin)
                        </a>
                    @endif
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            <th style="width: 5%;">No.</th>
                            {{-- Hanya tampilkan nama karyawan jika Admin --}}
                            @if(Auth::user()->role === 'admin')
                                <th>Nama Karyawan</th>
                            @endif
                            <th>Tanggal</th>
                            <th>Jam Masuk</th>
                            <th>Jam Keluar</th>
                            <th>Status</th>
                            {{-- Aksi hanya untuk Admin --}}
                            @if(Auth::user()->role === 'admin')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($attendances as $att)
                            <tr>
                                <td class="text-center">{{ $attendances->firstItem() + $loop->index }}</td>

                                @if(Auth::user()->role === 'admin')
                                    <td>{{ $att->employee->nama_lengkap ?? 'Karyawan Dihapus' }}</td>
                                @endif

                                <td class="text-center">{{ \Carbon\Carbon::parse($att->tanggal)->format('d M Y') }}</td>
                                <td class="text-center">{{ $att->waktu_masuk }}</td>
                                <td class="text-center">{{ $att->waktu_keluar ?? '-' }}</td>
                                <td class="text-center">
                                    <span
                                        class="badge bg-{{ $att->status_absensi == 'hadir' ? 'success' : ($att->status_absensi == 'izin' ? 'warning' : 'danger') }}">
                                        {{ ucfirst($att->status_absensi) }}
                                    </span>
                                </td>

                                @if(Auth::user()->role === 'admin')
                                    <td class="text-center">
                                        <div class="action-buttons">
                                            <a href="{{ route('attendances.edit', $att->id) }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form onsubmit="return confirm('Hapus data ini?');"
                                                action="{{ route('attendances.destroy', $att->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ Auth::user()->role === 'admin' ? 7 : 5 }}"
                                    class="text-center alert alert-secondary">
                                    Belum ada riwayat absensi.
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