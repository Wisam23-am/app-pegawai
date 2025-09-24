@extends('layouts.app')

@section('content')
    <h2>Edit Data Pegawai</h2>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <table class="table table-bordered">
            <tr>
                <td><label class="form-label">Nama Lengkap</label></td>
                <td><input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $employee->nama_lengkap) }}"
                        class="form-control"></td>
            </tr>
            <tr>
                <td><label class="form-label">Email</label></td>
                <td><input type="email" name="email" value="{{ old('email', $employee->email) }}" class="form-control"></td>
            </tr>
            <tr>
                <td><label class="form-label">Nomor Telepon</label></td>
                <td><input type="text" name="nomor_telepon" value="{{ old('nomor_telepon', $employee->nomor_telepon) }}"
                        class="form-control"></td>
            </tr>
            <tr>
                <td><label class="form-label">Tanggal Lahir</label></td>
                <td><input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $employee->tanggal_lahir) }}"
                        class="form-control"></td>
            </tr>
            <tr>
                <td><label class="form-label">Alamat</label></td>
                <td><input type="text" name="alamat" value="{{ old('alamat', $employee->alamat) }}" class="form-control">
                </td>
            </tr>
            <tr>
                <td><label class="form-label">Tanggal Masuk</label></td>
                <td><input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk', $employee->tanggal_masuk) }}"
                        class="form-control"></td>
            </tr>
            <tr>
                <td><label class="form-label">Status</label></td>
                <td>
                    <select name="status" class="form-select">
                        <option value="aktif" {{ old('status', $employee->status) == 'aktif' ? 'selected' : '' }}>Aktif
                        </option>
                        <option value="nonaktif" {{ old('status', $employee->status) == 'nonaktif' ? 'selected' : '' }}>
                            Nonaktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </td>
            </tr>
        </table>
    </form>
@endsection