<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ChatController extends Controller

{
   
    public function index()
    {
        return view('chat.index'); // Points to resources/views/chat/index.blade.php
    }

    public function getMessage(Request $request)
    {
        $userMessage = $request->input('message');

       // Send the message to the Rasa server
       $response = Http::post('http://localhost:5005/webhooks/rest/webhook', [
        'sender' => 'user_id', // Unique user ID
        'message' => $userMessage,
    ]);

        // Parse the Rasa response
        $botMessages = $response->json();

        if (!empty($botMessages)) {
            $botResponse = $botMessages[0]['text'];
        } else {
            $botResponse = 'Sorry, I could not process your request.';
        }

        return response()->json(['reply' => $botResponse]);

    }
}
