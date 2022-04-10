<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Game;
use App\Models\User;

class GamesController extends Controller
{

    ////////// TRAER TODOS LOS GAMES //////////

    public function allGames()
    {
        Log::info('allGames()');
        
        try {

            $games = Game::all();
            
            Log::info('Tasks done');

            return response()->json($games, 200);

        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }


    ////////// CREAR UN GAME //////////

    public function newGame(Request $request)
    {
        Log::info('newGame()');

        try {

            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'thumbnail_url' => 'required|string|max:255',
                'url' => 'required|string|max:255',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation failed'], 400);
            }

            $game = Game::create([
                'title' => $request->title,
                'thumbnail_url' => $request->thumbnail_url,
                'url' => $request->url,
            ]);

            Log::info('Tasks done');

            return response()->json($game, 201);

        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    ////////// TRAER UN GAME POR ID //////////
}
