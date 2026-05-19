<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Only track GET requests to public pages
        if ($request->isMethod('GET')) {
            $sessionId = Session::getId();
            $today = today()->toDateString();

            // Check if this visitor has already been tracked today
            $existing = Visitor::where('session_id', $sessionId)
                ->where('visit_date', $today)
                ->first();

            if (!$existing) {
                Visitor::create([
                    'session_id' => $sessionId,
                    'visit_date' => $today,
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                ]);
            }
        }

        return $next($request);
    }
}
