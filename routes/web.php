<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Userlevel;
use App\Http\Controllers\UserFilter;

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

Route::get('/', [Login::class, 'index'])->name('login');
Route::post('login/process', [Login::class, 'process'])->name('process.login');
Route::get('logout', [Login::class, 'logout'])->name('logout')->middleware('authcheck');

Route::get('dashboard', [Dashboard::class, 'index'])->name('dashboard.index')->middleware('authcheck');
Route::get('userlevel', [Userlevel::class, 'index'])->name('userlevel.index')->middleware('authcheck');
Route::get('userlevel/json', [Userlevel::class, 'json'])->name('userlevel.json')->middleware('authcheck');
Route::get('userlevel/edit/{id}', [UserLevel::class, 'edit'])->name('userlevel.edit')->middleware('authcheck');
Route::post('userlevel/update', [UserLevel::class, 'update'])->name('userlevel.update')->middleware('authcheck');

Route::get('userfilter', [UserFilter::class, 'index'])->name('userfilter.index')->middleware('authcheck');
Route::get('userfilter/json', [UserFilter::class, 'json'])->name('userfilter.json')->middleware('authcheck');
Route::post('userfilter/search', [UserFilter::class, 'search'])->name('userfilter.search')->middleware('authcheck');
