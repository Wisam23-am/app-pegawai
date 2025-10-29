<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Menampilkan daftar departemen (Read)
     */
    public function index()
    {
        // Ambil data departemen terbaru, 10 data per halaman
        $departments = Department::latest()->paginate(10);
        return view('departments.index', compact('departments'));
    }

    /**
     * Menampilkan form tambah departemen (Create)
     */
    public function create()
    {
        return view('departments.create');
    }

    /**
     * Menyimpan data departemen baru ke database (Create)
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_departemen' => 'required|string|max:100|unique:departments,nama_departemen',
        ]);

        // Buat data baru
        Department::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('departments.index')
            ->with('success', 'Departemen berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu departemen (Read)
     */
    public function show(Department $department)
    {
        return view('departments.show', compact('department'));
    }

    /**
     * Menampilkan form edit departemen (Update)
     */
    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    /**
     * Mengupdate data departemen di database (Update)
     */
    public function update(Request $request, Department $department)
    {
        // Validasi input
        $request->validate([
            'nama_departemen' => 'required|string|max:100|unique:departments,nama_departemen,' . $department->id,
        ]);

        // Update data
        $department->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('departments.index')
            ->with('success', 'Departemen berhasil diperbarui.');
    }

    /**
     * Menghapus data departemen (Delete)
     */
    public function destroy(Department $department)
    {
        // Hapus data
        $department->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('departments.index')
            ->with('success', 'Departemen berhasil dihapus.');
    }
}