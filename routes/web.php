<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/authcheck', function () {
    if(Auth::check()){
        return "The user is logged in";
    }
});

Route::get('/authtest', function () {

    $email = 'test@test.com';
    $password = 'tester123';

    if(Auth::attempt(['email'=>$email, 'password'=>$password])){
        return redirect()->intended('/admin');
    }
});

Route::get('/kick', function () {
    Auth::logout();
});