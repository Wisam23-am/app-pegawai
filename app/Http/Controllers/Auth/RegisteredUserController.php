<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $employee = Employee::where('email', $request->email)->first();

        if (!$employee) {
            return back()->withErrors([
                'email' => 'Maaf, email ini tidak terdaftar sebagai pegawai. Silakan hubungi admin.',
            ]);
        }

        $role = 'employee';

        if ($employee->jabatan_id) {
            $position = Position::find($employee->jabatan_id);
            if ($position && stripos($position->nama_jabatan, 'admin') !== false) {
                $role = 'admin';
            }
        }

        $user = User::create([
            'name' => $employee->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'employee_id' => $employee->id,
            'role' => $role,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}