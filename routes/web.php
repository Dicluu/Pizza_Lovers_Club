<?php

use App\Models\Item;
use App\Models\PurchaseOrderTask;
use App\Models\User;
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


Route::group(['namespace' => $namespace . 'Item'], function() {
    Route::get('/items',  'IndexController')->name('item.index')->can('viewAny', Item::class);
    Route::get('/items/create', 'CreateController')->name('item.create')->can('create', Item::class);
    Route::get('/items/{item}',  'ShowController')->name('item.show')->can('view', 'item');
    Route::get('/items/edit/{item}',  'EditController')->name('item.edit')->can('update', 'item');
    Route::patch('/items/{item}',  'UpdateController')->name('item.update')->can('update', 'item');
    Route::post('/items/', 'StoreController')->name('item.store')->can('create', Item::class);
    Route::delete('/items/{item}', 'DestroyController')->name('item.destroy')->can('delete', 'item');
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

Route::group(['namespace' => $namespace . 'User'], function() {
    Route::get('/users',  'IndexController')->name('user.index')->can('viewAny', User::class);
    Route::get('/users/{user}',  'ShowController')->name('user.show')->can('view', 'user');
    Route::get('/users/edit/{user}',  'EditController')->name('user.edit')->can('update', 'user');
    Route::patch('/users/{user}',  'UpdateController')->name('user.update')->can('update', 'user');
    Route::delete('/users/{user}', 'DestroyController')->name('user.destroy')->can('delete', 'user');
});

Route::group(['namespace' => $namespace . 'PurchaseOrderTask'], function() {
    Route::get('/tasks',  'IndexController')->name('task.index')->can('view', PurchaseOrderTask::class);
    Route::get('/task_list',  'ShowController')->name('task.list')->can('viewAny', PurchaseOrderTask::class);
    Route::get('/tasks/details/{task}',  'DetailsController')->name('task.details')->can('viewAny', PurchaseOrderTask::class);
    Route::patch('/tasks/{task}',  'UpdateController')->name('task.update')->can('update', 'task');
});

Route::get('/cart', $namespace . 'Cart\\' .'IndexController')->name('cart.index');
Route::post('/purchase', $namespace . 'PurchaseItem\\' . 'StoreController')->name('purchase.store');
Route::patch('/purchase', $namespace . 'PurchaseItem\\' . 'UpdateController')->name('purchase.update');
Route::delete('/purchase/{item}', $namespace . 'PurchaseItem\\' . 'DestroyController')->name('purchase.destroy');
Route::get('/payment', $namespace . 'PurchaseOrder\\' . 'ShowController')->name('purchase.details');
Route::post('/payment', $namespace . 'PurchaseOrder\\' . 'StoreController')->name('purchase.payment');



