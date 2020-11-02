<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployesController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect('login');
});

Route::get('register', function () {
    return redirect('login');
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});

Route::resources([
    'Employes' => EmployesController::class,
    'Companies' => CompaniesController::class
]);
