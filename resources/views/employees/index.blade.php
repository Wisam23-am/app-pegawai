@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Daftar Pegawai</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Tambah Data Pegawai</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Tanggal Masuk</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->nama_lengkap }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->nomor_telepon }}</td>
                    <td>{{ $employee->tanggal_lahir }}</td>
                    <td>{{ $employee->alamat }}</td>
                    <td>{{ $employee->tanggal_masuk }}</td>
                    <td>{{ $employee->status }}</td>
                    <td>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
                            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $employees->links() }}
@endsection