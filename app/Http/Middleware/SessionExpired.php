<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SessionExpired
{

    // Expired session handling

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
            // last request was more than 30 minutes ago
            session_unset();     
            session_destroy();  
        }
        $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
        return $next($request);   
    }
}
