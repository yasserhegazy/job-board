<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Employer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Skip middleware for the 'employer.create' and 'employer.store' routes
        if ($request->routeIs('employer.create', 'employer.store')) {
            return $next($request);
        }

        // If user not logged in or not an employer, redirect to create page
        if (null === $request->user() || null === $request->user()->employer) {
            return redirect()->route('employer.create')
                ->with('error', 'You need to register as an employer first.');
        }

        return $next($request);
    }

}
