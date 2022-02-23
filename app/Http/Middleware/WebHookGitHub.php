<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class WebHookGitHub
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $deployKey = md5(env('APP_DEPLOY_KEY'));

        if ($deployKey !== $request->header('X-Hub-Signature-256')) {
            abort(401);
        }

        return $next($request);
    }
}
