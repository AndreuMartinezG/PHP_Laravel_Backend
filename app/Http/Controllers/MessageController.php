<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Party;
use App\Models\User;

class MessageController extends Controller
{
    ////////// TRAER TODOS LOS MESSAGES //////////
    public function allMessages()
    {
        Log::info('allMessages()');

        try {

            $messages = Message::all();

            Log::info('Tasks done');

            return response()->json($messages, 200);

        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    ////////// CREAR UN MESSAGE //////////
    public function newMessage(Request $request)
    {
        Log::info('newMessage()');

        try {

            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'content' => 'required|string|max:255',
                'user_id' => 'required|integer',
                'party_id' => 'required|integer',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation failed'], 400);
            }

            $message = Message::create([
                'title' => $request->title,
                'content' => $request->content,
                'user_id' => $request->user_id,
                'party_id' => $request->party_id,
            ]);

            Log::info('Tasks done');

            return response()->json($message, 200);

        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    ////////// TRAER MENSAJES POR ID //////////
    public function messageByID($id)
    {
        Log::info('messageByID()');

        try {

            $message = Message::find($id);

            Log::info('Tasks done');

            return response()->json($message, 200);

        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    ////////// MODIFICAR UN MESSAGE POR ID//////////
    public function updateMessage(Request $request, $id)
    {
        Log::info('updateMessage()');

        try {

            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'content' => 'required|string|max:255',
                'user_id' => 'required|integer',
                'party_id' => 'required|integer',
            ]);

            if ($validator->fails()) {
                return response()->json(['message' => 'Validation failed'], 400);
            }

            $message = Message::find($id);

            $message->title = $request->title;
            $message->content = $request->content;
            $message->user_id = $request->user_id;
            $message->party_id = $request->party_id;

            $message->save();

            Log::info('Tasks done');

            return response()->json($message, 200);

        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    ////////// ELIMINAR UN MESSAGE POR ID //////////
    public function deleteMessage($id)
    {
        Log::info('deleteMessage()');

        try {

            $message = Message::find($id);

            $message->delete();

            Log::info('Tasks done');

            return response()->json($message, 200);

        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }

    ////////// TRAER TODOS LOS MESSAGES POR PARTY_ID //////////
    public function messagesByPartyID($id)
    {
        Log::info('messagesByPartyID()');

        try {

            $messages = Message::where('party_id', $id)->get();

            Log::info('Tasks done');

            return response()->json($messages, 200);

        } catch (\Exception $e) {

            Log::error($e->getMessage());

            return response()->json(['message' => 'Something went wrong'], 500);
        }
    }
}
