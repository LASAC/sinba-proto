<?php
/**
 * Created by PhpStorm.
 * User: mariliack
 * Date: 20/02/17
 * Time: 02:07
 */

namespace App\Transformers;


class ExceptionTransformer
{
    public function transform($exception) {
        $json = json_encode($exception);
        $code = $exception->getCode();
        $msg = $exception->getMessage();
        Log::debug("EXCEPTION MESSAGE:$msg");
        Log::debug("EXCEPTION CODE:$code");
        Log::debug("EXCEPTION:$json");

        return [
            'message' => $exception->getMessage(),
            'code' => $exception->getCode(),
            'trace' => config('app.debug') ? $exception->getTrace() : null
        ];
    }

}