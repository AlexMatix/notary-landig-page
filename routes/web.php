<?php

use App\Http\Controllers\Cite\CitesController;
use App\Http\Controllers\Contact\ContactController;
use App\Http\Controllers\MailBoxComplaint\MailBoxComplaintController;
use App\Http\Controllers\Services\ServicesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index')->with('alert', false)->with('services', ServicesController::getServices());
})->name('index');
Route::post('/contact/cite', [CitesController::class, 'create'])->name('cite-create');


Route::get('/services', function () {
    return view('services')->with('services', ServicesController::getServices());
})->name('services');


Route::get('/services/quote/{token}', [ServicesController::class, 'validProjectQuote'])->name('/services/quote/{token}');

Route::get('/contact', function () {
    return view('contact')->with('alert', false);
})->name('contact');
Route::post('/contact/create', [ContactController::class, 'create'])->name('contact-create');

Route::get('/us', function () {
    return view('us');
})->name('us');


Route::get('/mailbox_complaints', function () {
    return view('mailbox_complaints')->with('alert', false);
})->name('mailbox_complaints');
Route::post('/mailbox_complaints/create', [MailBoxComplaintController::class, 'create'])->name('mailbox-create');

