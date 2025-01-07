<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class RequestLoggerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Config::get('logging.request_logger_enabled', false)) {
            return $next($request);
        }

        $startTime = microtime(true);

        $response = $next($request);

        $endTime = microtime(true);
        $duration = $endTime - $startTime;

        DB::table('request_logs')->insert([
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'ip_address' => $request->ip(),
            'status_code' => $response->getStatusCode(),
            'response_time' => $duration,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return $response;
    }
}
