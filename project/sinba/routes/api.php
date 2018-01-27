<?php
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Route::get('/user', function (Request $request) {
//     Log::debug('GET /user');
//     return $request->user();
// })->middleware('auth:api');

Route::get('ping', function (Request $request) {
    Log::debug('GET /ping');
    return 'pong';
});

Route::get('version', function (Request $request) {
    $version = config('app.version');
    Log::debug('GET /version -->' . $version);
    return response()->json(['version' => $version]);
});