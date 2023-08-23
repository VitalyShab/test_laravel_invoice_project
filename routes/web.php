<?php

use App\Modules\Invoices\Http\Controllers\InvoiceController;
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

Route::get('/', [InvoiceController::class, 'index'])->name('home');
Route::get('/invoice/{id}', [InvoiceController::class, 'show'])->name('invoice.show');
Route::post('/invoice/updateStatus/{id}', [InvoiceController::class, 'updateStatus'])->name('invoice.updateStatus');
