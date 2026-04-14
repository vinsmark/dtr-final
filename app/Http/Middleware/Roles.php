<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Roles
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    // public function handle(Request $request, Closure $next, ...$roles): Response
    // {
    //     if (! Auth::check()) {
    //         return redirect()->route('login');
    //     }

    //     $user = Auth::user();

    //     if (empty($roles)) {
    //         return abort(403, 'Access denied: No role assigned.');
    //     }

    //     if (in_array($user->role, $roles)) {
    //         return $next($request);
    //     }

    //     switch ($user->role) {
    //         case 'admin':
    //             return redirect()->route('dashboard');
    //         case 'teacher':
    //             return redirect()->route('teacher.dashboard');
    //         case 'student':
    //             return redirect()->route('student.dashboard');
    //         case 'head':
    //             return redirect()->route('head.dashboard');
    //         case 'ict':
    //             return redirect()->route('ict.dashboard');
    //         case 'principal':
    //         case 'assistant_principal':
    //             return redirect()->route('principal.dashboard');
    //         default:
    //             abort(403, 'Unauthorized role');
    //     }
    // }

    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        if (in_array($user->role->value, $roles)) {
            return $next($request);
        }

        return redirect()->route('dashboard')
            ->with('error', 'Unauthorized access.');
    }
}
