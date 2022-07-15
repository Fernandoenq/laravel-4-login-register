<?php

use App\Http\Controllers\AuthController;
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

Route::get('/login', [AuthController::class, 'login'])->name('login');//essa rota recebeu um nome porque quando der erro 
//no login o laravel vai jogar para uma rota responsável por login, ai temos que dar o nome
Route::get('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/signin', [AuthController::class, 'signin']);
Route::post('/signup', [AuthController::class, 'signup']);

Route::get('/dashboard', function(){
    $user = auth()->user();//retorna o usuário logado

    return 'olá' . $user->name;
})->middleware('auth');//só acessa o dashboard quem tiver logado, se não ele volta pro logins


