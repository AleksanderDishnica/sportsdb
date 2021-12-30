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

Route::get('/', 'Api@index')->name('home');

// Show all sports from the API call

Route::get('/all-sports', 'Api@index')->name('all-sports');

Route::resources([
    'api' => 'Api',
    'sports' => 'Sports',
]);

Route::view('/data', 'data');
Route::get('/addSports', 'Api@storeSports')->name('addSports');
Route::get('/addLeagues', 'Api@storeLeagues')->name('addLeagues');
Route::get('/addTeams', 'Api@storeTeams')->name('addTeams');
