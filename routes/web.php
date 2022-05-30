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

use App\Http\Controllers\Controller;


Route::get('/', function () {
    return view('welcome');
});



route::get('admin/plans/create', 'App\Http\Controllers\Admin\PlanController@create')->name('plans.create');
route::get('admin/plans/{id}', 'App\Http\Controllers\Admin\PlanController@show')->name('plans.show');
route::get('admin/plans', 'App\Http\Controllers\Admin\PlanController@index')->name('plans.index');

route::post('admin/plans', 'App\Http\Controllers\Admin\PlanController@store')->name('plans.store');

route::delete('admin/plans/{id}', 'App\Http\Controllers\Admin\PlanController@delete')->name('plans.delete');

route::any('admin/plans/search', 'App\Http\Controllers\Admin\PlanController@search')->name('plans.search');
