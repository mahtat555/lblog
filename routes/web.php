<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;

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

// Home page

Route::get('/', [PagesController::class, 'index']);

// About page

Route::get('/about', [PagesController::class, 'about']);


// Services page

Route::get('/services', [PagesController::class, 'services']);
