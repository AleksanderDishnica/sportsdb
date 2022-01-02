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

Route::get('/', 'Sports@index')->name('home');

Route::resources([
    'api' => 'Api',
    'sports' => 'Sports',
    'leagues' => 'Leagues',
    'teams' => 'Teams',
]);

Route::get('/team/{id}', 'Teams@show_single')->name('singleTeam');

Route::view('/data', 'data');
