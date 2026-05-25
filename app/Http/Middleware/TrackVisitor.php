<?php

namespace App\Http\Middleware;

use App\Models\Visitor;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->isMethod('GET')) {
            try {
                $sessionId = Session::getId();
                $today = today()->toDateString();

                Visitor::firstOrCreate(
                    [
                        'session_id' => $sessionId,
                        'visit_date' => $today,
                    ],
                    [
                        'ip_address' => $request->ip(),
                        'user_agent' => $request->userAgent(),
                    ]
                );
            } catch (\Exception $e) {
                // Visitor tracking should never break the website
            }
        }

        return $next($request);
    }
}