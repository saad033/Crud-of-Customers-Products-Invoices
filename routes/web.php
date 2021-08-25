<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesInvoiceController;
use App\Http\Controllers\DashboardController;


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
    return view('welcome');
});



            /***Routes for Customers ***/
Route::get('/',[CustomerController::class,'index'])->name('customer');
Route::post('customer',[CustomerController::class,'store'])->name('customer_post');
Route::get('customer',[CustomerController::class,'create'])->name('customer');
Route::get('customer/edit/{id}',[CustomerController::class,'edit'])->name('customer_edit');
Route::put('customer/edit/{id}',[CustomerController::class,'update'])->name('customer_update');
Route::get('customer/delete/{id}',[CustomerController::class,'destroy'])->name('customer_destroy');


                    /***Routes for Customers ***/
Route::get('product',[ProductController::class,'index'])->name('product');
Route::get('list',[ProductController::class,'create'])->name('product_list');
Route::post('product',[ProductController::class,'store'])->name('product_post');
Route::get('product/edit/{id}',[ProductController::class,'edit'])->name('product_edit');
Route::put('product/edit/{id}',[ProductController::class,'update'])->name('product_update');
Route::get('product/delete/{id}',[ProductController::class,'destroy'])->name('product_destroy');

             /***Routes for Sales Invoice ***/
Route::get('invoice',[SalesInvoiceController::class,'index'])->name('invoice');
Route::get('invoice',[SalesInvoiceController::class,'create'])->name('invoice_create');
Route::post('invoice',[SalesInvoiceController::class,'store'])->name('invoice_post');
Route::get('invoice/view/{id}',[SalesInvoiceController::class,'show'])->name('invoice_show');
Route::get('invoice/edit/{id}',[SalesInvoiceController::class,'edit'])->name('invoice_edit');
Route::put('invoice/edit/{id}',[SalesInvoiceController::class,'update'])->name('invoice_update');
Route::put('invoice/delete/{id}',[SalesInvoiceController::class,'destroy'])->name('invoice_delete');
      /** Route for Dashboard */
 Route::get('dashboard/{id}',[DashboardController::class,'index'])->name('dashboard');
