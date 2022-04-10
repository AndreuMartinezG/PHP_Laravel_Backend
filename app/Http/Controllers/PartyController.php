<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Game;
use App\Models\User;
use App\Models\Party;

class PartyController extends Controller
{
    
        ////////// TRAER TODOS LOS PARTIES //////////
    
        public function allParties()
        {
            Log::info('allParties()');
    
            try {
    
                $parties = Party::all();
    
                Log::info('Tasks done');
    
                return response()->json($parties, 200);
    
            } catch (\Exception $e) {
    
                Log::error($e->getMessage());
    
                return response()->json(['message' => 'Something went wrong'], 500);
            }
        }
        
        ////////// CREAR UN PARTY //////////
        public function newParty(Request $request)
        {
            Log::info('newParty()');
    
            try {
    
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:255',
                    'OwnerID' => 'required|string|max:255',
                    'GameID' => 'required|string|max:255',
                ]);
    
                if ($validator->fails()) {
                    return response()->json(['message' => 'Validation failed'], 400);
                }
    
                $party = Party::create([
                    'name' => $request->name,
                    'OwnerID' => $request->OwnerID,
                    'GameID' => $request->GameID,
                ]);
    
                Log::info('Tasks done');
    
                return response()->json($party, 200);
    
            } catch (\Exception $e) {
    
                Log::error($e->getMessage());
    
                return response()->json(['message' => 'Something went wrong'], 500);
            }
        }


        ////////// TRAER UNA PARTY POR ID //////////
        public function getParty($id)
        {
            Log::info('getParty()');

            try {

                $party = Party::find($id);

                Log::info('Tasks done');

                return response()->json($party, 200);

            } catch (\Exception $e) {

                Log::error($e->getMessage());

                return response()->json(['message' => 'Something went wrong'], 500);
            }
        }

        ////////// MODIFICAR UNA PARTY POR ID //////////
        public function updateParty(Request $request, $id)
        {
            Log::info('updateParty()');

            try {

                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:255',
                    'OwnerID' => 'required|string|max:255',
                    'GameID' => 'required|string|max:255',
                ]);

                if ($validator->fails()) {
                    return response()->json(['message' => 'Validation failed'], 400);
                }

                $party = Party::find($id);

                $party->name = $request->name;
                $party->OwnerID = $request->OwnerID;
                $party->GameID = $request->GameID;

                $party->save();

                Log::info('Tasks done');

                return response()->json($party, 200);

            } catch (\Exception $e) {

                Log::error($e->getMessage());

                return response()->json(['message' => 'Something went wrong'], 500);
            }
        }

        ////////// ELIMINAR UNA PARTY POR ID //////////
        public function deleteParty($id)
        {
            Log::info('deleteParty()');

            try {

                $party = Party::find($id);

                $party->delete();

                Log::info('Tasks done');

                return response()->json(['message' => 'Party deleted'], 200);

            } catch (\Exception $e) {

                Log::error($e->getMessage());

                return response()->json(['message' => 'Something went wrong'], 500);
            }
        }

        ////////// TRAER TODAS LAS PARTIES POR GAME ID //////////
        public function partiesByGameID($id)
        {
            Log::info('partiesByGameID()');

            try {

                $parties = Party::where('GameID', $id)->get();

                Log::info('Tasks done');

                return response()->json($parties, 200);

            } catch (\Exception $e) {

                Log::error($e->getMessage());

                return response()->json(['message' => 'Something went wrong'], 500);
            }
        }

}
