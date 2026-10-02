<?php

use App\Http\Controllers\Cite\CitesController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\MailBoxComplaint\MailBoxComplaintController;
use App\Http\Controllers\Services\ServicesController;
use App\Http\Controllers\Expediente\ExpedienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index')->with('services', ServicesController::getServices());
})->name('index');
// throttle en los tres formularios publicos: escriben en base de datos sin
// autenticacion de ningun tipo y su unica defensa previa era un honeypot.
Route::post('/contact/cite', [CitesController::class, 'create'])
    ->middleware('throttle:5,1')->name('cite-create');

Route::get('/services_catalog', [ServicesController::class, 'getOperations'], function () {
    return view('services_catalog');
})->name('services_catalog');

Route::get('/services/quote/{token}/{quoteId}', [ServicesController::class, 'validProjectQuote'])->name('/services/quote/{token}/{quoteId}');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact/create', [ContactController::class, 'create'])
    ->middleware('throttle:5,1')->name('contact-create');

Route::get('/us', function () {
    return view('us');
})->name('us');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/mailbox_complaints', function () {
    return view('mailbox_complaints');
})->name('mailbox_complaints');
Route::post('/mailbox_complaints/create', [MailBoxComplaintController::class, 'create'])
    ->middleware('throttle:5,1')->name('mailbox-create');

// Rutas de Vinculación y Proxy de Expedientes (Conexión a ERP)
Route::get('/expediente/vincular/{token}', [ExpedienteController::class, 'showWizard'])->name('expediente.link');
Route::post('/ajax/expediente/verify-rfc', [ExpedienteController::class, 'verifyRfc']);
Route::post('/ajax/expediente/link', [ExpedienteController::class, 'linkGrantor']);
Route::get('/ajax/expediente/{token}/documents', [ExpedienteController::class, 'getDocuments']);
Route::post('/ajax/expediente/upload', [ExpedienteController::class, 'uploadDocument']);

// Auth Routes
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\PortalController;

// Portal Route
Route::middleware('auth')->group(function () {
    Route::get('/portal', [PortalController::class, 'index'])->name('portal');
    Route::get('/portal/tramite/{id}', [PortalController::class, 'show'])->name('portal.show');
});
