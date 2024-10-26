<?php

use App\Http\Controllers\Whastapp\WhatsappWebhookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::post('whatsapp/webhooks', [WhatsappWebhookController::class, 'handleWebhook']);
Route::get('whatsapp/webhooks', [WhatsappWebhookController::class, 'handleWebhook']);
Route::post('whatsapp/webhooks', [WhatsappWebhookController::class, 'handleWebhook']);
Route::put('whatsapp/webhooks', [WhatsappWebhookController::class, 'handleWebhook']);
