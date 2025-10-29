<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Menampilkan daftar jabatan (Read)
     */
    public function index()
    {
        $positions = Position::latest()->paginate(10);
        return view('positions.index', compact('positions'));
    }

    /**
     * Menampilkan form tambah jabatan (Create)
     */
    public function create()
    {
        return view('positions.create');
    }

    /**
     * Menyimpan data jabatan baru (Create)
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_jabatan' => 'required|string|max:100|unique:positions,nama_jabatan',
            'gaji_pokok' => 'required|numeric|min:0', // Gaji tidak boleh negatif
        ]);

        Position::create($request->all());

        return redirect()->route('positions.index')
            ->with('success', 'Jabatan berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu jabatan (Read)
     */
    public function show(Position $position)
    {
        return view('positions.show', compact('position'));
    }

    /**
     * Menampilkan form edit jabatan (Update)
     */
    public function edit(Position $position)
    {
        return view('positions.edit', compact('position'));
    }

    /**
     * Mengupdate data jabatan (Update)
     */
    public function update(Request $request, Position $position)
    {
        // Validasi input
        $request->validate([
            'nama_jabatan' => 'required|string|max:100|unique:positions,nama_jabatan,' . $position->id,
            'gaji_pokok' => 'required|numeric|min:0',
        ]);

        $position->update($request->all());

        return redirect()->route('positions.index')
            ->with('success', 'Jabatan berhasil diperbarui.');
    }

    /**
     * Menghapus data jabatan (Delete)
     */
    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()->route('positions.index')
            ->with('success', 'Jabatan berhasil dihapus.');
    }
}