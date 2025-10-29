<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with('employee')->latest()->paginate(10);
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::with('position')
            ->orderBy('nama_lengkap', 'asc')
            ->get();

        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:10',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        $employee = Employee::with('position')->find($validated['karyawan_id']);
        if (!$employee || !$employee->position) {
            return back()->withInput()->withErrors(['karyawan_id' => 'Karyawan terpilih tidak memiliki data jabatan/gaji pokok.']);
        }
        $gaji_pokok = $employee->position->gaji_pokok;

        $validated['gaji_pokok'] = $gaji_pokok;

        $tunjangan = $validated['tunjangan'] ?? 0;
        $potongan = $validated['potongan'] ?? 0;
        $total_gaji = ($gaji_pokok + $tunjangan) - $potongan;

        $validated['tunjangan'] = $tunjangan;
        $validated['potongan'] = $potongan;
        $validated['total_gaji'] = $total_gaji;

        Salary::create($validated);

        return redirect()->route('salaries.index')
            ->with('success', 'Data gaji berhasil ditambahkan.');
    }

    public function show(Salary $salary)
    {
        $salary->load('employee.position', 'employee.department');
        return view('salaries.show', compact('salary'));
    }

    public function edit(Salary $salary)
    {
        $employees = Employee::with('position')
            ->orderBy('nama_lengkap', 'asc')
            ->get();

        return view('salaries.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, Salary $salary)
    {
        $validated = $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'bulan' => 'required|string|max:10',
            'tunjangan' => 'nullable|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
        ]);

        $employee = Employee::with('position')->find($validated['karyawan_id']);
        if (!$employee || !$employee->position) {
            return back()->withInput()->withErrors(['karyawan_id' => 'Karyawan terpilih tidak memiliki data jabatan/gaji pokok.']);
        }
        $gaji_pokok = $employee->position->gaji_pokok;

        $validated['gaji_pokok'] = $gaji_pokok;

        $tunjangan = $validated['tunjangan'] ?? 0;
        $potongan = $validated['potongan'] ?? 0;
        $total_gaji = ($gaji_pokok + $tunjangan) - $potongan;

        $validated['tunjangan'] = $tunjangan;
        $validated['potongan'] = $potongan;
        $validated['total_gaji'] = $total_gaji;

        $salary->update($validated);

        return redirect()->route('salaries.index')
            ->with('success', 'Data gaji berhasil diperbarui.');
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salaries.index')
            ->with('success', 'Data gaji berhasil dihapus.');
    }
}