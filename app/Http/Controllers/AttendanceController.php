<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * Menampilkan daftar absensi (Read)
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $attendances = Attendance::with('employee')->latest()->paginate(10);
        }
        else {
            $attendances = Attendance::with('employee')
                ->where('karyawan_id', $user->employee_id)
                ->latest()
                ->paginate(10);
        }

        return view('attendances.index', compact('attendances'));
    }

    /**
     * Menampilkan form tambah absensi (Create)
     */
    public function create()
    {
        $employees = Employee::orderBy('nama_lengkap', 'asc')->get();
        return view('attendances.create', compact('employees'));
    }

    /**
     * Menyimpan data absensi baru (Create)
     */
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'required|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i|after:waktu_masuk',
            'status_absensi' => 'required|in:hadir,alpha,izin,sakit',
        ]);
        // ===================================================

        Attendance::create($request->all());

        return redirect()->route('attendances.index')
            ->with('success', 'Data absensi berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu absensi (Read)
     */
    public function show(Attendance $attendance)
    {
        // Load relasi employee jika belum
        $attendance->load('employee');
        return view('attendances.show', compact('attendance'));
    }

    /**
     * Menampilkan form edit absensi (Update)
     */
    public function edit(Attendance $attendance)
    {
        $employees = Employee::orderBy('nama_lengkap', 'asc')->get();
        return view('attendances.edit', compact('attendance', 'employees'));
    }

    /**
     * Mengupdate data absensi (Update)
     */
    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:employees,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'required|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i|after:waktu_masuk',
            'status_absensi' => 'required|in:hadir,alpha,izin,sakit',
        ]);
        // ===================================================

        $attendance->update($request->all());

        return redirect()->route('attendances.index')
            ->with('success', 'Data absensi berhasil diperbarui.');
    }

    /**
     * Menghapus data absensi (Delete)
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendances.index')
            ->with('success', 'Data absensi berhasil dihapus.');
    }

    public function submitAttendance()
    {
        $user = Auth::user();

        // Pastikan user terhubung dengan data employee
        if (!$user->employee_id) {
            return redirect()->back()->with('error', 'Akun Anda tidak terhubung dengan data karyawan.');
        }

        $employeeId = $user->employee_id;
        $today = Carbon::now()->toDateString();
        $currentTime = Carbon::now()->toTimeString();

        // Cek apakah sudah ada data absensi hari ini untuk karyawan ini
        $attendance = Attendance::where('karyawan_id', $employeeId)
            ->where('tanggal', $today)
            ->first();

        if (!$attendance) {
            Attendance::create([
                'karyawan_id' => $employeeId,
                'tanggal' => $today,
                'waktu_masuk' => $currentTime,
                'status_absensi' => 'hadir',
            ]);

            $message = 'Berhasil Check-in (Datang).';
        } else {
            $attendance->update([
                'waktu_keluar' => $currentTime,
            ]);

            $message = 'Berhasil Check-out (Pulang) diperbarui.';
        }

        return redirect()->back()->with('success', $message);
    }
}