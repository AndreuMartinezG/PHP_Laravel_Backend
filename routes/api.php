<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GamesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// CRUD AUTH
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group([
    'middleware' => 'jwt.auth'
], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
});



//CRUD GAMES
Route::group([
    'middleware' => 'jwt.auth'
], function () {
    Route::get('/games', [GamesController::class, 'allGames']);
    Route::post('/games', [GamesController::class, 'newGame']);
    Route::get('/games/{id}', [GamesController::class, 'gameByID']);
    Route::put('/games/{id}', [GamesController::class, 'updateGame']);
    Route::delete('/games/{id}', [GamesController::class, 'destroyGame']);
});


//CRUD PARTIES
Route::group([
    'middleware' => 'jwt.auth'
], function () {
    Route::get('/parties', [GamesController::class, 'allParties']);
    Route::post('/parties', [GamesController::class, 'newParty']);
    Route::get('/parties/{id}', [GamesController::class, 'partyByID']);
    Route::put('/parties/{id}', [GamesController::class, 'updateParty']);
    Route::delete('/parties/{id}', [GamesController::class, 'destroyParty']);
    Route::post('/partie/game/{id}', [PartyController::class, "partiesByGameID"]);
});
