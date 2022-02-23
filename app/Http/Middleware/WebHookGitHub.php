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
        $post_data = file_get_contents('php://input');
        $appHash = 'sha256='. hash_hmac('sha256', $post_data, env('APP_DEPLOY_KEY'));
        $hunHash = $request->header('X-Hub-Signature-256');

        if ($appHash !== $hunHash) {
            abort(401);
        }

        return $next($request);
    }
}
