<?php

use App\Http\Controllers\Cite\CitesController;
use App\Http\Controllers\Contact\ContactController;
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
    return view('index')->with('alert', false);
})->name('index');
Route::post('/contact/cite', [CitesController::class, 'create'])->name('cite-create');


Route::get('/services', function () {
    return view('services');
})->name('services');


Route::get('/contact', function () {
    return view('contact')->with('alert', false);
})->name('contact');
Route::post('/contact/create', [ContactController::class, 'create'])->name('contact-create');

Route::get('/us', function () {
    return view('us');
})->name('us');