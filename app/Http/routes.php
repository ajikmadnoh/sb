<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
use App\Http\Requests;
use Illuminate\Http\Request;


Route::get('/', function()
{
	return View::make('home');
});

Route::resource('ItemCRUD', 'ItemCRUDController');

Route::get('/charts', function()
{
	return View::make('mcharts');
});

Route::get('/tables', function()
{
	return View::make('table');
});

Route::get('/forms', function()
{
	return View::make('form');
});

Route::get('/grid', function()
{
	return View::make('grid');
});

Route::get('/buttons', function()
{
	return View::make('buttons');
});


Route::get('/icons', function()
{
	return View::make('icons');
});

Route::get('/panels', function()
{
	return View::make('panel');
});

Route::get('/typography', function()
{
	return View::make('typography');
});

Route::get('/notifications', function()
{
	return View::make('notifications');
});

Route::get('/blank', function()
{
	return View::make('blank');
});


Route::get('/documentation', function()
{
	return View::make('documentation');
});
Route::Auth();
Route::get('/projects', 'ProjectsController@index');
Route::resource('ProfilPengguna','ProfilPenggunaController');
Route::resource('BookKeep','BookKeepController');
Route::resource('StoreKeep','StoreKeepController');
Route::get('/listClaim', 'ListController@claim');
Route::resource('Claim','ClaimController');