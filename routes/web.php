<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [PageController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])
  ->name('admin.')
  ->prefix('admin')
  ->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::resource('projects', ProjectController::class);
    Route::get('orderby/{direction}', [ProjectController::class, 'orderBy'])->name('orderby');
    Route::resource('types', TypeController::class);
    Route::resource('technologies', TechnologyController::class);
  });

require __DIR__.'/auth.php';
