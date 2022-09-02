<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class WebHookGitHub
{
    public const HEADER = 'X-Hub-Signature-256';
    public const ALGO = 'sha256';
    public const KEY = 'APP_DEPLOY_KEY';
    public const ERRORS_MESSAGES = [
        'header' => 'header not found',
        'hash' => 'hash not valid',
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
        $this->saveInLog($request);

        $this->verifyHeader($request);
        $this->verifyHash($request);

        if ($this->hasCreatedHook($request)) {
            return response()->json("ok");
        }

        return $next($request);
    }

    /**
     * @param Request $request
     * @return void
     */
    protected function verifyHash(Request $request): void
    {
        abort_unless($this->verified($request), 401, self::ERRORS_MESSAGES['hash']);
    }

    /**
     * @param Request $request
     * @return void
     */
    protected function verifyHeader(Request $request): void
    {
        abort_unless($this->signature($request), 404, self::ERRORS_MESSAGES['header']);
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
        return env(self::KEY);
    }

    /**
     * @param Request $request
     * @return bool
     */
    protected function hasCreatedHook(Request $request): bool
    {
        return Validator::make($request->all(), [
            'zen'     => ['required', 'string'],
            'hook_id' => ['required', 'integer'],

            'hook'          => ['required', 'array'],
            'hook.id'       => ['required', 'integer'],
            'hook.active'   => ['required', 'bool'],
            'hook.events'   => ['required', 'array'],
            'hook.events.*' => ['required', 'string'],
        ])->passes();
    }

    /**
     * @param Request $request
     * @return void
     */
    protected function saveInLog(Request $request)
    {
        Log::channel('deploy')->info($this->verified($request));
    }
}
