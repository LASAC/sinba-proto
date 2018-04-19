<?php

use Illuminate\Support\Facades\Log;

$token = csrf_token();
Log::debug('INDEX.HTML --> token: ' . $token);
echo  str_replace('__CSRF-TOKEN__', $token, File::get('index.template.html'));