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

Route::livewire('/', 'frontend.home.index')
->layout('layouts.frontend')->name('root');

Route::group(['middleware' => 'guest'], function(){

    Route::livewire('/login', 'auth.login')
    ->layout('layouts.auth')->name('auth.login');

});


Route::prefix('console')->group(function () {

    Route::group(['middleware' => 'auth'], function(){

        Route::livewire('/dashboard', 'console.dashboard.index')
        ->layout('layouts.console')->name('console.dashboard.index');

        //playlists
        Route::livewire('/playlists', 'console.playlists.index')
        ->layout('layouts.console')->name('console.playlists.index');

        Route::livewire('/playlists/create', 'console.playlists.create')
        ->layout('layouts.console')->name('console.playlists.create');

        Route::livewire('/playlists/{id}/edit', 'console.playlists.edit')
        ->layout('layouts.console')->name('console.playlists.edit');

        //videos
        Route::livewire('/videos', 'console.videos.index')
        ->layout('layouts.console')->name('console.videos.index');

        Route::livewire('/videos/create', 'console.videos.create')
        ->layout('layouts.console')->name('console.videos.create');

        Route::livewire('/videos/{id}/edit', 'console.videos.edit')
        ->layout('layouts.console')->name('console.videos.edit');

        //users
        Route::livewire('/users', 'console.users.index')
        ->layout('layouts.console')->name('console.users.index');

        Route::livewire('/users/create', 'console.users.create')
        ->layout('layouts.console')->name('console.users.create');

        Route::livewire('/users/{id}/edit', 'console.users.edit')
        ->layout('layouts.console')->name('console.users.edit');

    });

});

Route::livewire('/search', 'frontend.search.index')
->layout('layouts.frontend')->name('frontend.search.index');

Route::livewire('/playlist/{slug}', 'frontend.playlists.show')
->layout('layouts.frontend')->name('frontend.playlists.show');

Route::livewire('/{slug}', 'frontend.videos.show')
->layout('layouts.frontend')->name('frontend.videos.show');