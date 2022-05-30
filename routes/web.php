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
use Illuminate\Routing\RouteGroup;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')
    ->group(function () {



        //Route Datails Plan

        Route::get('plans/{id}/details', 'App\Http\Controllers\Admin\DetailPlanController@index')->name('details.plan.index');





        //Index Home Dashboard
        Route::get('/', 'App\Http\Controllers\Admin\PlanController@index')->name('admin.index');



        //Routes Plan
        route::get('plans', 'App\Http\Controllers\Admin\PlanController@index')->name('plans.index');
        route::get('plans/create', 'App\Http\Controllers\Admin\PlanController@create')->name('plans.create');
        route::get('plans/{id}', 'App\Http\Controllers\Admin\PlanController@show')->name('plans.show');

        route::get('plans/edit/{id}', 'App\Http\Controllers\Admin\PlanController@edit')->name('plans.edit');
        route::put('plans/{id}', 'App\Http\Controllers\Admin\PlanController@update')->name('plans.update');

        route::post('plans', 'App\Http\Controllers\Admin\PlanController@store')->name('plans.store');

        route::delete('plans/{id}', 'App\Http\Controllers\Admin\PlanController@delete')->name('plans.delete');

        route::any('plans/search', 'App\Http\Controllers\Admin\PlanController@search')->name('plans.search');

    });
