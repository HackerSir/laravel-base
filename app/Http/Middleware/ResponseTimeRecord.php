<?php

namespace App\Http\Middleware;

use Log;
use Closure;
use Exception;
use App\Console\Commands\LogApacheStatus;

//http://stackoverflow.com/questions/31619350/correct-way-to-get-server-response-time-in-laravel
class ResponseTimeRecord
{
    public function handle($request, Closure $next)
    {
        return $next($request);
    }

    public function terminate($request, $response)
    {
        try {
            $responseTime = microtime(true) - LARAVEL_START;
            LogApacheStatus::$logger->info($responseTime . ',' . $request->getMethod() . ',' . $request->getPathInfo());
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
