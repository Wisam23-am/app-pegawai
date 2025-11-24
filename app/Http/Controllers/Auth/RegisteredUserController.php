<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request): View
    {
        $employee = null;
        if ($request->has('email')) {
            $employee = \App\Models\Employee::where('email', $request->query('email'))->first();
        }
        return view('auth.register', compact('employee'));
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $employee = \App\Models\Employee::where('email', $request->email)->first();

        if (!$employee) {
            return back()
                ->withErrors(['email' => 'Email tidak terdaftar sebagai pegawai. Hubungi admin.'])
                ->withInput();
        }

        if (\App\Models\User::where('email', $request->email)->exists()) {
            return back()
                ->withErrors(['email' => 'Email sudah terdaftar. Silakan login.'])
                ->withInput();
        }

        $role = 'employee';

        try {
            if (!empty($employee->jabatan_id)) {
                if (class_exists(\App\Models\Jabatan::class)) {
                    $jab = \App\Models\Jabatan::find($employee->jabatan_id);
                    if ($jab && isset($jab->nama)) {
                        $jabName = strtolower(trim($jab->nama));
                        if ($jabName === 'admin' || $jabName === 'administrator') {
                            $role = 'admin';
                        }
                    }
                } else {
                    if (isset($employee->jabatan) && is_string($employee->jabatan)) {
                        $jabName = strtolower(trim($employee->jabatan));
                        if ($jabName === 'admin' || $jabName === 'administrator') {
                            $role = 'admin';
                        }
                    }
                }
            }
        } catch (\Throwable $e) {
            $role = 'employee';
        }

        $user = \App\Models\User::create([
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
