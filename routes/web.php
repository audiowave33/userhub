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
Route::get('/info', function() {
	$host = system("hostnamectl && echo '--------------------------------'");
	$memory = system("free -h && echo '--------------------------------'");
	$space = system("df -h && echo '--------------------------------'");
	$ip = system("ip a && echo  '--------------------------------'");
	return response()->json();
});
