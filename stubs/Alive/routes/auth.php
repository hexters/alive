<?php

use Illuminate\Support\Facades\Route;
use Modules\Alive\Livewire\Auth\Login;

/*
|--------------------------------------------------------------------------
| Alive Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', Login::class)->name('login');
