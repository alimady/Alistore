<?php

use App\Http\Controllers\Admin\CategoriesController;
use Illuminate\Support\Facades\Route;

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

Route::delete('/categories/delete/{id}', [CategoriesController::class, 'delete'])->name('categories.delete');
Route::put('/categories/update/{id}', [CategoriesController::class, 'update'])->name('categories.update');
Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
Route::Post('/categories', [CategoriesController::class, 'create'])->name('categories.create');
Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
