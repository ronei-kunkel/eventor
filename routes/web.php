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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-conn', function () {
    // Listando os usuários
    $users = \App\Models\User::get();
 
    echo '<hr>';
    foreach ($users as $user) {
        echo "{$user->id} - {$user->name} <br>";
        echo '<hr>';
    }
});
