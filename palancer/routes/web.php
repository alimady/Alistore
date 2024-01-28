<?php

use App\Http\Controllers\Auth\LoginAdmin;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\OrderController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Auth::logout();
Route::get('/',function (
)  {

    return view("restaurent") ;

})->name("home");

Route::get('/admin/dashboard', [DashboardController::class,"index"])->name("dashboard");
Route::get('/admin/dashboard/products', [ProductsController::class,"index"])->name("products");
Route::post('/admin/order/table/{id}',[OrdersController::class])->name('order.create');
Route::get('/admin/orders',[OrdersController::class])->name('orders');
Route::get('/admin/login',[LoginAdmin::class,'index'])->name("admin.login.show")->middleware('guest:admin');
Route::post('/admin/login',[LoginAdmin::class,'create'])->name('admin.login')->middleware('guest:admin');
Route::get('admin/tables',[TableController::class,'index'])->name("tables.show");
Route::get('admin/orders',[OrdersController::class,'index'])->name("orders.show");
Route::post('/admin/logout', [LoginAdmin::class, 'destroy'])->name("admin.logout");
 //->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/products',[ProductController::class,'index']);
Route::get('/order',[OrderController::class,'index']);



require __DIR__.'/auth.php';
