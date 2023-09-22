<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Pizza;
use \App\Models\Ingredient;

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

Route::name('user.')->group(function() {
    $namespace = 'App\Http\Controllers\User\\';
    Route::get('/login', function () {
        if (Auth::check()) {
            return redirect(route('index'));
        }
        return view('login');
    })->name('login');

    Route::get('/registration', function () {
        if (Auth::check()) {
            return redirect(route('index'));
        }
        return view('registration');
    })->name('registration');

    Route::post('/registration', $namespace . 'RegistrationController');
    Route::post('/login', $namespace . 'LoginController');

    Route::get('/logout', function () {
        Auth::logout();
        return redirect(route('index'));
    })->name('logout');
});


Route::group(['namespace' => $namespace . 'Pizza'], function() {
    Route::get('/pizzas',  'IndexController')->name('pizza.index')->can('viewAny', Pizza::class);
    Route::get('/pizzas/create', 'CreateController')->name('pizza.create')->can('create', Pizza::class);
    Route::get('/pizzas/{pizza}',  'ShowController')->name('pizza.show')->can('view', 'pizza');
    Route::get('/pizzas/edit/{pizza}',  'EditController')->name('pizza.edit')->can('update', 'pizza');
    Route::patch('/pizzas/{pizza}',  'UpdateController')->name('pizza.update')->can('update', 'pizza');
    Route::post('/pizzas/', 'StoreController')->name('pizza.store')->can('create', Pizza::class);
    Route::delete('/pizzas/{pizza}', 'DestroyController')->name('pizza.destroy')->can('delete', 'pizza');
});

Route::group(['namespace' => $namespace . 'Ingredient'], function() {
    Route::get('/ingredients',  'IndexController')->name('ingredient.index')->can('viewAny', Ingredient::class);
    Route::get('/ingredients/create', 'CreateController')->name('ingredient.create')->can('create', Ingredient::class);
    Route::get('/ingredients/{ingredient}',  'ShowController')->name('ingredient.show')->can('view', 'ingredient');
    Route::get('/ingredients/edit/{ingredient}',  'EditController')->name('ingredient.edit')->can('update', 'ingredient');
    Route::patch('/ingredients/{ingredient}',  'UpdateController')->name('ingredient.update')->can('update', 'ingredient');
    Route::post('/ingredients/', 'StoreController')->name('ingredient.store')->can('create', Ingredient::class);
    Route::delete('/ingredients/{ingredient}', 'DestroyController')->name('ingredient.destroy')->can('delete', 'ingredient');
});




