<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function() {

    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function (){
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(ContactController::class)->prefix('contacts')->group(function () {
        Route::get('', 'index')->name('contacts');
        Route::get('create', 'create')->name('contacts.create');
        Route::post('store', 'store')->name('contacts.store');
        Route::get('show/{id}', 'show')->name('contacts.show');
        Route::get('edit/{id}', 'edit')->name('contacts.edit');
        Route::put('edit/{id}', 'update')->name('contacts.update');
        Route::delete('destroy/{id}', 'destroy')->name('contacts.destroy');
    });

    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});

