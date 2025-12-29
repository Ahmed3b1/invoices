<?php

use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SectionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->middleware('auth')->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/invoices', [InvoicesController::class, 'index'])->middleware('auth')->name('invoices');
Route::resource('/invoices', InvoicesController::class)->middleware('auth')->name('get' ,'invoices');
Route::resource('/invoices', InvoicesController::class)->middleware('auth')->name('post' ,'invoices');
Route::resource('/sections', SectionsController::class)->middleware('auth')->name('get' ,'sections');
Route::resource('/sections', SectionsController::class)->middleware('auth')->name('post' ,'sections');

Route::get('/section/{id}', [InvoicesController::class, 'getproducts'])->middleware('auth');

Route::get('/InvoiceDetails/{id}', [InvoicesDetailsController::class, 'edit'])->middleware('auth')->name('InvoiceDetails');

Route::get('/download/{invoice_number}/{file_name}', [InvoicesDetailsController::class, 'get_file'])->middleware('auth')->name('download');

Route::get('/view_file/{invoice_number}/{file_name}', [InvoicesDetailsController::class, 'open_file'])->middleware('auth')->name('view_file');

Route::post('/delete_file', [InvoicesDetailsController::class, 'destroy'])->middleware('auth')->name('delete_file');

Route::resource('/products', ProductsController::class)->middleware('auth')->name('get' ,'products');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
