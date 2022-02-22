<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

/*
|--------------------------------------------------------------------------
| WebHook Routes
|--------------------------------------------------------------------------
|
| This route for github webhook to deploy repository in server
|
*/

Route::post('/deploy', function (\Illuminate\Http\Request $request) {
    dump($request->all());
/*    $process = new Process(['sh', env('APP_PATH')]);
    $process->run();

    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }

    Log::debug('deploy '. $process->getOutput());*/
});
