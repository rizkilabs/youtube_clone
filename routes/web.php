<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'guest'], function(){

    Route::livewire('/login', 'auth.login')
    ->layout('layouts.auth')->name('auth.login');

});

Route::prefix('console')->group(function () {

    Route::group(['middleware' => 'auth'], function(){

        Route::livewire('/dashboard', 'console.dashboard.index')
        ->layout('layouts.console')->name('console.dashboard.index');

        Route::livewire('/playlists', 'console.playlists.index')
        ->layout('layouts.console')->name('console.playlists.index');

        Route::livewire('/playlists/create', 'console.playlists.create')
        ->layout('layouts.console')->name('console.playlists.create');

        Route::livewire('/playlists/{id}/edit', 'console.playlists.edit')
        ->layout('layouts.console')->name('console.playlists.edit');

        Route::livewire('/videos', 'console.videos.index')
        ->layout('layouts.console')->name('console.videos.index');

        Route::livewire('/videos/create', 'console.videos.create')
        ->layout('layouts.console')->name('console.videos.create');

        Route::livewire('/videos/{id}/edit', 'console.videos.edit')
        ->layout('layouts.console')->name('console.videos.edit');
    });

    
});
