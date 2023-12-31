<?php

use Illuminate\Support\Facades\Route;
use Modules\Alive\Livewire\Role\Role;
use Modules\Alive\Livewire\Role\RoleShow;
use Modules\Alive\Livewire\Welcome;

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

alive()->route(function () {
    Route::get('/', Welcome::class)->name('welcome');
    Route::get('/role', Role::class)->name('role.index');
    Route::get('/role/{ulid}', RoleShow::class)->name('role.show');
});
