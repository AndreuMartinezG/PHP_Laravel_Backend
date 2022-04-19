<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MemberController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



// CRUD AUTH y USERS
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::group([
    'middleware' => 'jwt.auth'
], function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::get('/users', [UserController::class, 'allUsers']);
    Route::get('/users/{id}', [UserController::class, 'userByID']);
    Route::put('/users/{id}', [UserController::class, 'updateUser']);
    Route::delete('/users/{id}', [UserController::class, 'deleteUser']);

});



//CRUD GAMES
Route::group([
    'middleware' => 'jwt.auth'
], function () {
    Route::get('/games', [GamesController::class, 'allGames']);
    Route::post('/games', [GamesController::class, 'newGame']);
    Route::get('/games/{id}', [GamesController::class, 'gameByID']);
    Route::put('/games/{id}', [GamesController::class, 'updateGame']);
    Route::delete('/games/{id}', [GamesController::class, 'deleteGame']);
});


//CRUD PARTIES
Route::group([
    'middleware' => 'jwt.auth'
], function () {
    Route::get('/parties', [PartyController::class, 'allParties']);
    Route::post('/parties', [PartyController::class, 'newParty']);
    Route::get('/parties/{id}', [PartyController::class, 'partyByID']);
    Route::put('/parties/{id}', [PartyController::class, 'updateParty']);
    Route::delete('/parties/{id}', [PartyController::class, 'deleteParty']);
    Route::get('/partie/game/{id}', [PartyController::class, "partiesByGameID"]);
});


//CRUD MESSAGES
Route::group([
    'middleware' => 'jwt.auth'
], function () {
    Route::get('/messages', [MessageController::class, 'allMessages']);
    Route::post('/messages', [MessageController::class, 'newMessage']);
    Route::get('/messages/{id}', [MessageController::class, 'messageByID']);
    Route::put('/messages/{id}', [MessageController::class, 'updateMessage']);
    Route::delete('/messages/{id}', [MessageController::class, 'deleteMessage']);
    Route::get('/message/party/{id}', [MessageController::class, "messagesByPartyID"]);
});


//CRUD MEMBERS
Route::group([
    'middleware' => 'jwt.auth'
], function () {
    Route::get('/members', [MemberController::class, 'allMembers']);
    Route::post('/members', [MemberController::class, 'newMember']);
    Route::get('/members/{id}', [MemberController::class, 'memberByID']);
    Route::put('/members/{id}', [MemberController::class, 'updateMember']);
    Route::delete('/members/{id}', [MemberController::class, 'deleteMember']);
    Route::get('/member/party/{id}', [MemberController::class, "membersByPartyID"]);
});
