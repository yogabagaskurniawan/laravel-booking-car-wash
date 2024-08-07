<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login','\App\Livewire\Auth\Login')->name('login');

Route::post('/logout', function(){
    Auth::logout();
    return redirect('/');
})->name('logout')->middleware('auth');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard','\App\Livewire\Admin\Dashboard\Dashboard');

    Route::get('/cities/list-cities', '\App\Livewire\Admin\City\CityList');
    Route::get('/cities/add-cities', '\App\Livewire\Admin\City\CityAdd');
    Route::get('/cities/edit-cities/{uuid}', '\App\Livewire\Admin\City\CityEdit')->name('cityEdit');

    Route::get('/services/list-services', '\App\Livewire\Admin\Service\ServiceList');
    Route::get('/services/add-services', '\App\Livewire\Admin\Service\ServiceAdd');
    Route::get('/services/edit-services/{uuid}', '\App\Livewire\Admin\Service\ServiceEdit')->name('serviceEdit');
});