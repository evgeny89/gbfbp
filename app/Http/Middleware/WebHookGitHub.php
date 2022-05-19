<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        /*$post_data = $request->getContent();
        $appHash = 'sha256='. hash_hmac('sha256', $post_data, env('APP_DEPLOY_KEY'));
        $hunHash = $request->header('X-Hub-Signature-256');

        Log::channel('deploy')->info(<<<DEPLOY
Deploy info:
github hash => $hunHash;
app hash => $appHash;
DEPLOY);

        if ($appHash !== $hunHash) {
            abort(401);
        }*/

        return $next($request);
    }
}
