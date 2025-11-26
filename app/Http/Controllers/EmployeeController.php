<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $query = Employee::with(['department', 'position']);

        // Logika Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        $employees = $query->latest()
            ->paginate(10)
            ->withQueryString(); 

        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::orderBy('nama_departemen', 'asc')->get();
        $positions = Position::orderBy('nama_jabatan', 'asc')->get();

        return view('employees.create', compact('departments', 'positions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email',
            'nomor_telepon' => 'required|string|max:15',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|in:aktif,tidak aktif,cuti',
            'departemen_id' => 'required|exists:departments,id',
            'jabatan_id' => 'required|exists:positions,id',
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index')
            ->with('success', 'Karyawan berhasil ditambahkan. Silakan minta karyawan untuk Register akun.');
    }

    public function show(Employee $employee)
    {
        $employee->load(['department', 'position']);

        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $departments = Department::orderBy('nama_departemen', 'asc')->get();
        $positions = Position::orderBy('nama_jabatan', 'asc')->get();

        return view('employees.edit', compact('employee', 'departments', 'positions'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'nomor_telepon' => 'required|string|max:15',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|in:aktif,tidak aktif,cuti',
            'departemen_id' => 'required|exists:departments,id',
            'jabatan_id' => 'required|exists:positions,id',
        ]);

        $employee->update($validated);

        if ($employee->user) {
            $position = Position::find($request->jabatan_id);

            $role = 'employee';
            if ($position && stripos($position->nama_jabatan, 'admin') !== false) {
                $role = 'admin';
            }

            $employee->user->update([
                'name' => $employee->nama_lengkap,
                'email' => $employee->email,
                'role' => $role,
            ]);
        }

        return redirect()->route('employees.index')->with('success', 'Data Karyawan berhasil diperbarui.');
    }

    public function destroy(Employee $employee)
    {
        if ($employee->user) {
            $employee->user->delete();
        }

        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Karyawan berhasil dihapus.');
    }
}