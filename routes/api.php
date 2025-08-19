<?php

use App\Http\Controllers\Contact\ContactActionController;
use App\Http\Controllers\Whastapp\WhatsappWebhookController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\MailBoxComplaint\MailBoxComplaintActionController;
use App\Http\Controllers\MailBoxComplaint\MailBoxComplaintController;
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



//Route::post('whatsapp/webhooks', [WhatsappWebhookController::class, 'handleWebhook']);
Route::get('whatsapp/webhooks', [WhatsappWebhookController::class, 'handleWebhook']);
Route::post('whatsapp/webhooks', [WhatsappWebhookController::class, 'handleWebhook']);
Route::put('whatsapp/webhooks', [WhatsappWebhookController::class, 'handleWebhook']);
Route::group(['middleware' => ['client']], function () {
    //SCRIPTS
    //Contact
    Route::get('contactList', [ContactController:: class, 'index']);
    Route::get('contactList/{contact}', [ContactController:: class, 'show']);
    Route::get('contact/{contact}', [ContactActionController::class, 'changeContactProcess']);
    Route::get('contact/spam/{contact}', [ContactActionController:: class, 'markAsSpam']);
    //MailboxComplaints
    Route::get('complaintList', [MailBoxComplaintController::class, 'index']);
    Route::get('complaintList/{complaint}', [MailBoxComplaintController::class, 'show']);
    Route::get('complaint/{complaint}', [MailBoxComplaintActionController::class, 'changeComplaintProcess']);
    Route::get('complaint/spam/{complaint}', [MailBoxComplaintActionController:: class, 'markAsSpam']);
});
