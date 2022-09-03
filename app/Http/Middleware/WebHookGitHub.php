<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class WebHookGitHub
{
    public const HEADER = 'X-Hub-Signature-256';
    public const ALGO = 'sha256';
    public const KEY = 'app.deploy_key';
    public const REF = 'refs/heads/master';
    public const ERROR_MESSAGES = [
        'header' => 'header not found',
        'hash' => 'hash not valid',
        'ref' => 'not master branch',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure(Request): (Response|RedirectResponse)  $next
     * @return JsonResponse
     */
    public function handle(Request $request, Closure $next): JsonResponse
    {
        $this->verifyHeader($request);
        $this->verifyHash($request);

        if ($this->getRefHook($request) !== self::REF) {
            return response()->json(self::ERROR_MESSAGES['ref']);
        }

        return $next($request);
    }

    /**
     * @param Request $request
     * @return void
     */
    protected function verifyHash(Request $request): void
    {
        abort_unless($this->verified($request), 401, self::ERROR_MESSAGES['hash']);
    }

    /**
     * @param Request $request
     * @return void
     */
    protected function verifyHeader(Request $request): void
    {
        abort_unless($this->signature($request), 404, self::ERROR_MESSAGES['header']);
    }

    /**
     * @param Request $request
     * @return bool
     */
    protected function verified(Request $request): bool
    {
        return hash_equals($this->signature($request), $this->calculate($request));
    }

    /**
     * @param Request $request
     * @return string
     */
    protected function calculate(Request $request): string
    {
        return hash_hmac(self::ALGO, $request->getContent(), $this->secret());
    }

    /**
     * @param Request $request
     * @return string|null
     */
    protected function signature(Request $request): ?string
    {
        $signature = $request->header(self::HEADER);

        return Str::after($signature, '=');
    }

    /**
     * @return string
     */
    protected function secret(): string
    {
        return config(self::KEY);
    }

    /**
     * @param Request $request
     * @return string
     */
    protected function getRefHook(Request $request): string
    {
        return $request->get("ref");
    }

    /**
     * @param string $str
     * @return void
     */
    protected function saveInLog(string $str): void
    {
        Log::channel('deploy')->info($str);
    }
}
