<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLevel
{
    public function handle(Request $request, Closure $next, string ...$levels): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        foreach ($levels as $level) {
            if (auth()->user()->level === $level) {
                return $next($request);
            }
        }

        abort(403, 'Unauthorized access.');
    }
}
