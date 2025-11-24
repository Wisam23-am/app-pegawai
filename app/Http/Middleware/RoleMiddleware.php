<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role)
    {
        if (!auth()->check()) {
            return redirect('/login');
        }

        $userRole = strtolower(trim((string) auth()->user()->role));
        $required = strtolower(trim($role));

        if ($userRole !== $required) {
            abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}
