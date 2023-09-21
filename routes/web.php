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
$namespace = 'App\Http\Controllers\\';

Route::get('/',  $namespace . 'IndexController@index')->name('index');

Route::group(['namespace' => $namespace . 'Pizza'], function() {
    Route::get('/pizzas',  'IndexController')->name('pizza.index');
    Route::get('/pizzas/create', 'CreateController')->name('pizza.create');
    Route::get('/pizzas/{pizza}',  'ShowController')->name('pizza.show');
    Route::get('/pizzas/edit/{pizza}',  'EditController')->name('pizza.edit');
    Route::patch('/pizzas/{pizza}',  'UpdateController')->name('pizza.update');
    Route::post('/pizzas/', 'StoreController')->name('pizza.store');
    Route::delete('/pizzas/{pizza}', 'DestroyController')->name('pizza.destroy');
});

Route::group(['namespace' => $namespace . 'Ingredient'], function() {
    Route::get('/ingredients',  'IndexController')->name('ingredient.index');
    Route::get('/ingredients/create', 'CreateController')->name('ingredient.create');
    Route::get('/ingredients/{ingredient}',  'ShowController')->name('ingredient.show');
    Route::get('/ingredients/edit/{ingredient}',  'EditController')->name('ingredient.edit');
    Route::patch('/ingredients/{ingredient}',  'UpdateController')->name('ingredient.update');
    Route::post('/ingredients/', 'StoreController')->name('ingredient.store');
    Route::delete('/ingredients/{ingredient}', 'DestroyController')->name('ingredient.destroy');
});


