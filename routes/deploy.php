<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

/*
|--------------------------------------------------------------------------
| WebHook Routes
|--------------------------------------------------------------------------
|
| This route for gitHub webhook to deploy repository in server
|
*/

Route::post('/deploy', function () {
    $process = Process::fromShellCommandline('../deploy.sh');
    $process->run();

    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }

    Log::info('deploy ' . $process->getOutput());
    return response($process->getOutput());
});
