<?php
namespace App\Middleware;

use Closure;
use DateTime;
use Log;
use PSharp\Http\Request;
use PSharp\Core\Middleware\MiddlewareInterface;

/**
 * Audit middleware.
 */
class AuditMiddleware implements MiddlewareInterface
{
    /**
     * Handles requests.
     * 
     * @param PSharp\Http\Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        list($start_time, $start_date) = array(hrtime(true), new DateTime());

        Log::debug(sprintf(
            'Middleware auditory at %s started at %s.',
            $start_date->format('Y-m-d H:i:s.u'),
            $start_time
        ));

        $result = $next($request);

        list($end_time, $end_date) = array(hrtime(true), new DateTime());

        list($elapsed_time, $elapsed_date) = array($end_time - $start_time, $start_date->diff($end_date));

        Log::debug(sprintf(
            'Middleware auditory at %s ended at %s (elapsed %s ms, %s s)',
            $end_date->format('Y-m-d H:i:s.u'),
            $end_time,
            ($elapsed_time/1e+6),
            $elapsed_date->format('%s.%F')
        ));

        return $result;
    }
}