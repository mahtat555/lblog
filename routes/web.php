<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;

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

Route::get(
    '/',
    [PagesController::class, 'index']
)->name("home");


// About page

Route::get(
    '/about',
    [PagesController::class, 'about']
)->name("about");


// Services page

Route::get(
    '/services',
    [PagesController::class, 'services']
)->name("services");


// Posts resource

Route::resource('posts', PostsController::class);
