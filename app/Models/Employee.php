<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'nama_lengkap',
        'email',
        'nomor_telepon',
        'tanggal_lahir',
        'alamat',
        'tanggal_masuk',
        'status',
        'departemen_id',
        'jabatan_id',
    ];

    /**
     * The "booted" method of the model.
     * Logika sinkronisasi otomatis ada di sini.
     */
    protected static function booted(): void
    {
        static::updated(function (Employee $employee) {
            if ($employee->user) {
                $employee->user->update([
                    'name' => $employee->nama_lengkap, 
                    'email' => $employee->email,
                ]);
            }
        });

        // Event saat data Employee dihapus (opsional, agar data user bersih)
        static::deleted(function (Employee $employee) {
            if ($employee->user) {
                $employee->user->delete();
            }
        });
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'departemen_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'jabatan_id');
    }

    public function user()
    {
        return $this->hasOne(\App\Models\User::class);
    }
}