<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [TodoController::class, 'index']);
Route::get('/add', function () {
    return view('add');
});
Route::post('/create', [TodoController::class, 'store'])->name('todo.create');
Route::post('/update', [TodoController::class, 'update'])->name('todo.update');
Route::get('/delete/${id}', [TodoController::class, 'delete'])->name('todo.delete');
Route::get('/edit/${id}', [TodoController::class, 'edit'])->name('todo.edit');
Route::get('/check/${id}', [TodoController::class, 'check'])->name('todo.check');




